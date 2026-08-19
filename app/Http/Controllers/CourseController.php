<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.courses.index', [
            'screens' => $this->screens(),
            'active' => 'courses',
            'courses' => Course::with(['category', 'mode'])->latest()->get(),
        ]);
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
            'title' => ['required', 'string', 'max:255'],
            'subtitle' => ['nullable', 'string', 'max:255'],
            'slug' => ['required', 'string', 'max:255', 'alpha_dash', 'unique:courses,slug,'.($course->id ?? 'NULL').',id'],
            'image' => ['nullable', 'image', 'max:4096'],
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
