<?php

namespace Database\Seeders;

use App\Models\SuccessStory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SuccessStorySeeder extends Seeder
{
    private const MAX_STORIES = 10;

    public function run(): void
    {
        foreach ($this->stories() as $index => $story) {
            if (SuccessStory::query()->count() >= self::MAX_STORIES) {
                break;
            }

            $image = $this->seedImage($index + 50);

            SuccessStory::query()->firstOrCreate(
                ['name' => $story['name']],
                array_merge($story, ['image' => $image])
            );
        }
    }

    private function seedImage(int $imageNumber): ?string
    {
        $filename = "img{$imageNumber}.png";
        $source = public_path("assets/images/{$filename}");

        if (! File::exists($source)) {
            return null;
        }

        $path = "success-stories/seed-{$filename}";

        if (! Storage::disk('public')->exists($path)) {
            Storage::disk('public')->put($path, File::get($source));
        }

        return $path;
    }

    private function stories(): array
    {
        return [
            [
                'name' => 'Rana Bilal',
                'program' => 'Freelancing',
                'location' => 'Lahore',
                'role' => 'AI Data Analyst',
                'company' => 'Upwork',
                'before_story' => 'Rana was looking for a practical way to move into technology while building a dependable freelance profile.',
                'after_story' => 'He now works with international clients as an AI data analyst and continues to grow his Upwork portfolio.',
                'journey_steps' => ['Learned data tools', 'Built portfolio projects', 'Started freelancing'],
            ],
            [
                'name' => 'Umar Farooq',
                'program' => 'Data Analytics',
                'location' => 'Lahore',
                'role' => 'Data Analyst',
                'company' => 'Software House',
                'before_story' => 'Umar wanted to turn his analytical skills into a role with real business impact.',
                'after_story' => 'He joined a software house as a data analyst after completing hands-on dashboard and reporting projects.',
                'journey_steps' => ['Mastered Excel and SQL', 'Created dashboards', 'Prepared for interviews'],
            ],
            [
                'name' => 'Abdullah Awan',
                'program' => 'Web Development',
                'location' => 'Faisalabad',
                'role' => 'Web Developer',
                'company' => 'Software House',
                'before_story' => 'Abdullah had an interest in websites but needed a structured path to build professional skills.',
                'after_story' => 'He now develops responsive websites for a software house and freelance clients.',
                'journey_steps' => ['Learned HTML and CSS', 'Built live projects', 'Secured a developer role'],
            ],
            [
                'name' => 'Usman Akram',
                'program' => 'Full Stack Development',
                'location' => 'Faisalabad',
                'role' => 'Full Stack Developer',
                'company' => 'Software House',
                'before_story' => 'Usman wanted to gain both frontend and backend skills to work on complete applications.',
                'after_story' => 'He is now contributing to production web applications as a full stack developer.',
                'journey_steps' => ['Learned frontend basics', 'Built backend APIs', 'Joined a software team'],
            ],
            [
                'name' => 'Maryam',
                'program' => 'Graphic Design',
                'location' => 'Faisalabad',
                'role' => 'Graphic Designer',
                'company' => 'Upwork',
                'before_story' => 'Maryam wanted to transform her creative interest into a flexible online career.',
                'after_story' => 'She now designs branding and social media assets for clients through Upwork.',
                'journey_steps' => ['Learned design software', 'Created a portfolio', 'Won freelance projects'],
            ],
            [
                'name' => 'Hassan Raza',
                'program' => 'Digital Marketing',
                'location' => 'Islamabad',
                'role' => 'Digital Marketing Executive',
                'company' => 'Growth Agency',
                'before_story' => 'Hassan needed practical marketing experience beyond theory.',
                'after_story' => 'He now manages paid campaigns and social media strategy for growing businesses.',
                'journey_steps' => ['Studied campaign strategy', 'Ran practice campaigns', 'Joined an agency'],
            ],
            [
                'name' => 'Ayesha Khan',
                'program' => 'UI/UX Design',
                'location' => 'Karachi',
                'role' => 'UI/UX Designer',
                'company' => 'Design Studio',
                'before_story' => 'Ayesha was seeking a career that blended research, problem solving, and visual design.',
                'after_story' => 'She now designs user-friendly web and mobile experiences for a design studio.',
                'journey_steps' => ['Learned user research', 'Designed case studies', 'Started a design role'],
            ],
            [
                'name' => 'Muhammad Huzaifa',
                'program' => 'Python Programming',
                'location' => 'Multan',
                'role' => 'Junior Python Developer',
                'company' => 'Tech Startup',
                'before_story' => 'Huzaifa wanted a clear foundation in programming to enter the software industry.',
                'after_story' => 'He now supports automation and backend development work at a technology startup.',
                'journey_steps' => ['Learned Python basics', 'Completed automation projects', 'Joined a startup'],
            ],
            [
                'name' => 'Sana Iqbal',
                'program' => 'E-Commerce',
                'location' => 'Rawalpindi',
                'role' => 'E-Commerce Specialist',
                'company' => 'Online Brand',
                'before_story' => 'Sana wanted to understand how online stores attract and serve customers.',
                'after_story' => 'She now manages product listings, orders, and marketplace growth for an online brand.',
                'journey_steps' => ['Learned marketplace setup', 'Optimized product listings', 'Managed live stores'],
            ],
            [
                'name' => 'Ali Hamza',
                'program' => 'Cyber Security',
                'location' => 'Peshawar',
                'role' => 'Security Operations Analyst',
                'company' => 'IT Services Firm',
                'before_story' => 'Ali wanted to build the technical confidence needed for a security-focused career.',
                'after_story' => 'He now monitors systems and helps respond to security events at an IT services firm.',
                'journey_steps' => ['Learned networking', 'Practiced security labs', 'Entered security operations'],
            ],
        ];
    }
}
