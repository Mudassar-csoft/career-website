<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseMode;
use App\Support\DashboardImageUpload;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CourseController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.courses.index', [
            'screens' => $this->screens(),
            'active' => 'courses',
        ]);
    }

    public function data(Request $request): JsonResponse
    {
        $courses = Course::query()
            ->leftJoin('course_categories', 'course_categories.id', '=', 'courses.course_category_id')
            ->leftJoin('course_modes', 'course_modes.id', '=', 'courses.course_mode_id')
            ->select([
                'courses.id',
                'courses.title',
                'courses.subtitle',
                'courses.slug',
                'courses.image',
                'courses.duration_weeks',
                'courses.has_certificate',
                'courses.is_featured',
                'course_categories.name as category_name',
                'course_modes.name as mode_name',
            ]);

        return DataTables::eloquent($courses)
            ->filter(function ($query) use ($request) {
                $search = trim((string) data_get($request->input('search'), 'value', ''));

                if ($search === '') {
                    return;
                }

                $like = '%'.$search.'%';

                $query->where(function ($subQuery) use ($like) {
                    $subQuery
                        ->where('courses.title', 'like', $like)
                        ->orWhere('courses.subtitle', 'like', $like)
                        ->orWhere('courses.slug', 'like', $like)
                        ->orWhere('course_categories.name', 'like', $like)
                        ->orWhere('course_modes.name', 'like', $like)
                        ->orWhereRaw('CAST(courses.duration_weeks AS CHAR) like ?', [$like]);
                });
            })
            ->orderColumn('category_name', 'course_categories.name $1')
            ->orderColumn('mode_name', 'course_modes.name $1')
            ->addColumn('image_html', function ($course) {
                $imageUrl = $course->image_url ?: asset('assets/images/img03.png');
                $fallback = asset('assets/images/img03.png');

                return '<img class="dash-thumb" src="'.$imageUrl.'" alt="'.e($course->title).'" loading="lazy" onerror="this.src=\''.$fallback.'\'; this.onerror=null;">';
            })
            ->addColumn('title_html', function ($course) {
                $subtitle = filled($course->subtitle)
                    ? '<div style="color:#7c8a94;font-size:12px;">'.e($course->subtitle).'</div>'
                    : '';

                return '<strong>'.e($course->title).'</strong>'.$subtitle;
            })
            ->editColumn('category_name', function ($course) {
                return '<span class="dash-badge dash-badge-green">'.e($course->category_name ?: 'Unassigned').'</span>';
            })
            ->editColumn('mode_name', function ($course) {
                return e($course->mode_name ?: 'Unassigned');
            })
            ->addColumn('duration_label', function ($course) {
                if (! $course->duration_weeks) {
                    return '&mdash;';
                }

                return e($course->duration_weeks.' wk'.($course->duration_weeks > 1 ? 's' : ''));
            })
            ->addColumn('certificate_badge', function ($course) {
                return $course->has_certificate
                    ? '<span class="dash-badge dash-badge-green">Included</span>'
                    : '<span class="dash-badge dash-badge-red">Excluded</span>';
            })
            ->addColumn('featured_badge', function ($course) {
                return $course->is_featured
                    ? '<span class="dash-badge dash-badge-amber">Featured</span>'
                    : '<span class="dash-badge dash-badge-red">Not Featured</span>';
            })
            ->addColumn('actions_html', function ($course) use ($request) {
                $actions = [];
                $user = $request->user();

                if ($user?->can('courses.edit')) {
                    $actions[] = '<a href="'.route('dashboard.courses.edit', $course->id).'" class="dash-btn dash-btn-secondary" style="padding:6px 12px;font-size:12px;">Edit</a>';
                }

                if ($user?->can('courses.delete')) {
                    $actions[] = '<form action="'.route('dashboard.courses.destroy', $course->id).'" method="POST" onsubmit="return confirm(\'Delete this course?\');">'.
                        csrf_field().
                        method_field('DELETE').
                        '<button type="submit" class="dash-btn dash-btn-danger" style="padding:6px 12px;font-size:12px;">Delete</button>'.
                    '</form>';
                }

                return '<div style="display:flex;gap:8px;flex-wrap:wrap;">'.implode('', $actions).'</div>';
            })
            ->rawColumns([
                'image_html',
                'title_html',
                'category_name',
                'duration_label',
                'certificate_badge',
                'featured_badge',
                'actions_html',
            ])
            ->toJson();
    }

    public function create()
    {
        return view('dashboard.courses.create', [
            'screens' => $this->screens(),
            'active' => 'courses',
            'course' => new Course,
            'categories' => CourseCategory::sortFixed(
                CourseCategory::query()
                    ->whereIn('slug', CourseCategory::fixedSlugs())
                    ->get()
            ),
            'modes' => CourseMode::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateCourse($request);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');
        }

        Course::create($validated);

        return redirect()->route('dashboard.courses.index')->with('status', 'Course created.');
    }

    public function edit(Course $course)
    {
        return view('dashboard.courses.edit', [
            'screens' => $this->screens(),
            'active' => 'courses',
            'course' => $course,
            'categories' => CourseCategory::sortFixed(
                CourseCategory::query()
                    ->whereIn('slug', CourseCategory::fixedSlugs())
                    ->get()
            ),
            'modes' => CourseMode::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Course $course)
    {
        $validated = $this->validateCourse($request, $course);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('courses', 'public');

            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
        }

        $course->update($validated);

        return redirect()->route('dashboard.courses.index')->with('status', 'Course updated.');
    }

    public function destroy(Course $course)
    {
        if ($course->image) {
            Storage::disk('public')->delete($course->image);
        }

        $course->delete();

        return redirect()->route('dashboard.courses.index')->with('status', 'Course deleted.');
    }

    public function storeCategory(Request $request)
    {
        return response()->json([
            'message' => 'Course categories are fixed and cannot be added from the dashboard.',
        ], 422);
    }

    public function storeMode(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:course_modes,name'],
        ]);

        $mode = CourseMode::create([
            'name' => $validated['name'],
            'slug' => Str::slug($validated['name']),
        ]);

        return response()->json($mode);
    }

    protected function validateCourse(Request $request, ?Course $course = null): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'min:35', 'max:40'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:courses,slug,'.($course->id ?? 'NULL').',id'],
            'image' => DashboardImageUpload::rulesWithDimensions(1080, 600),
            'course_category_id' => ['required', 'exists:course_categories,id'],
            'course_mode_id' => ['required', 'exists:course_modes,id'],
            'duration_weeks' => ['nullable', 'integer', 'min:1'],
            'about' => ['nullable', 'string'],
            'what_you_will_learn' => ['nullable', 'array'],
            'what_you_will_learn.*' => ['nullable', 'string', 'max:255'],
            'tools_technology' => ['nullable', 'array'],
            'tools_technology.*' => ['nullable', 'string', 'max:255'],
            'course_includes' => ['nullable', 'array'],
            'course_includes.*' => ['nullable', 'string', 'max:255'],
            'curriculum' => ['nullable', 'array'],
            'curriculum.*.title' => ['nullable', 'string', 'max:255'],
            'curriculum.*.content' => ['nullable', 'string'],
            'has_certificate' => ['required', 'in:0,1'],
            'is_featured' => ['required', 'in:0,1'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:500'],
            'meta_keywords' => ['nullable', 'string', 'max:255'],
        ]);

        $validated['what_you_will_learn'] = $this->cleanList($validated['what_you_will_learn'] ?? []);
        $validated['tools_technology'] = $this->cleanList($validated['tools_technology'] ?? []);
        $validated['course_includes'] = $this->cleanList($validated['course_includes'] ?? []);

        $validated['curriculum'] = collect($validated['curriculum'] ?? [])
            ->filter(fn ($lecture) => filled($lecture['title'] ?? null))
            ->map(fn ($lecture) => [
                'title' => $lecture['title'],
                'content' => $lecture['content'] ?? '',
            ])
            ->values()
            ->all();

        $validated['has_certificate'] = (bool) $validated['has_certificate'];
        $validated['is_featured'] = (bool) $validated['is_featured'];

        return $validated;
    }

    protected function cleanList(array $items): array
    {
        return collect($items)
            ->map(fn ($item) => is_string($item) ? trim($item) : $item)
            ->filter(fn ($item) => filled($item))
            ->values()
            ->all();
    }
}
