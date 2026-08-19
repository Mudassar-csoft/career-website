<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseMode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use RuntimeException;

class LiveCoursesSeeder extends Seeder
{
    public function run(): void
    {
        $courses = $this->courses();
        $categoryIds = $this->seedCategories();
        $modeIds = $this->seedModes($courses);

        foreach ($courses as $courseData) {
            $title = trim((string) ($courseData['title'] ?? ''));
            $subtitle = trim((string) ($courseData['subtitle'] ?? ''));
            $modeName = trim((string) ($courseData['mode'] ?? ''));
            $categoryName = $this->normalizeCategory((string) ($courseData['category'] ?? ''));
            $slug = Str::slug($title);
            $aboutParagraphs = $this->cleanList($courseData['about'] ?? []);
            $whatYouWillLearn = $this->cleanList($courseData['what_you_will_learn'] ?? []);
            $toolsTechnology = $this->cleanList($courseData['tools_technology'] ?? []);
            $courseIncludes = $this->cleanList($courseData['course_includes'] ?? []);

            if (! isset($categoryIds[$categoryName])) {
                throw new RuntimeException("Unknown course category [{$categoryName}] in live course seed.");
            }

            if (! isset($modeIds[$modeName])) {
                throw new RuntimeException("Unknown course mode [{$modeName}] in live course seed.");
            }

            Course::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'course_category_id' => $categoryIds[$categoryName],
                    'course_mode_id' => $modeIds[$modeName],
                    'title' => $title,
                    'subtitle' => $subtitle !== '' ? $subtitle : null,
                    'slug' => $slug,
                    'image' => null,
                    'duration_weeks' => $courseData['duration_weeks'] ?? null,
                    'about' => $this->paragraphsToHtml($aboutParagraphs),
                    'what_you_will_learn' => $whatYouWillLearn,
                    'tools_technology' => $toolsTechnology,
                    'course_includes' => $courseIncludes,
                    'curriculum' => $this->buildCurriculum($whatYouWillLearn),
                    'has_certificate' => (bool) ($courseData['has_certificate'] ?? false),
                    'is_featured' => (bool) ($courseData['is_featured'] ?? false),
                    'meta_title' => Str::limit($title.' Course | Career Institute', 255, ''),
                    'meta_description' => Str::limit(
                        $subtitle !== '' ? $subtitle : implode(' ', $aboutParagraphs),
                        160
                    ),
                    'meta_keywords' => $this->buildMetaKeywords($title, $categoryName, $modeName, $toolsTechnology),
                ]
            );
        }

        $this->command?->info('Seeded '.count($courses).' live courses from the supplied course document.');
    }

    protected function seedCategories(): array
    {
        $categoryIds = [];

        foreach (CourseCategory::FIXED_CATEGORIES as $definition) {
            $categoryIds[$definition['name']] = CourseCategory::query()->updateOrCreate(
                ['slug' => $definition['slug']],
                ['name' => $definition['name']]
            )->id;
        }

        return $categoryIds;
    }

    protected function seedModes(array $courses): array
    {
        $modeIds = [];

        foreach (collect($courses)->pluck('mode')->filter()->unique()->values() as $modeName) {
            $modeIds[$modeName] = CourseMode::query()->updateOrCreate(
                ['slug' => Str::slug($modeName)],
                ['name' => $modeName]
            )->id;
        }

        return $modeIds;
    }

    protected function normalizeCategory(string $category): string
    {
        $normalized = trim(preg_replace('/\s+/', ' ', str_replace('Category:', '', $category)));

        return match ($normalized) {
            'AI, Data Science' => 'AI & Data Science',
            default => $normalized,
        };
    }

    protected function cleanList(array $items): array
    {
        return collect($items)
            ->map(fn ($item) => trim((string) $item))
            ->filter()
            ->values()
            ->all();
    }

    protected function paragraphsToHtml(array $paragraphs): ?string
    {
        if ($paragraphs === []) {
            return null;
        }

        return collect($paragraphs)
            ->map(fn ($paragraph) => '<p>'.e($paragraph).'</p>')
            ->implode('');
    }

    protected function buildCurriculum(array $learningPoints): array
    {
        return collect($learningPoints)
            ->map(function (string $point) {
                $title = trim((string) Str::of($point)->before(' through practical course activities'));

                return [
                    'title' => $title !== '' ? $title : $point,
                    'content' => $point,
                ];
            })
            ->values()
            ->all();
    }

    protected function buildMetaKeywords(string $title, string $category, string $mode, array $tools): string
    {
        $keywords = array_values(array_unique(array_filter([
            $title,
            $category,
            $mode,
            ...array_slice($tools, 0, 4),
            'Career Institute',
        ])));

        return Str::limit(implode(', ', $keywords), 255, '');
    }

    protected function courses(): array
    {
        $encoded = <<<'PAYLOAD'
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
PAYLOAD;

        $decoded = base64_decode(preg_replace('/\s+/', '', $encoded), true);

        if ($decoded === false) {
            throw new RuntimeException('Unable to decode live courses seed payload.');
        }

        $json = gzdecode($decoded);

        if ($json === false) {
            throw new RuntimeException('Unable to unzip live courses seed payload.');
        }

        return json_decode($json, true, 512, JSON_THROW_ON_ERROR);
    }
}
