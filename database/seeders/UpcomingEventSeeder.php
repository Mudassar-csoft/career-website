<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpcomingEventSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->events() as $index => $data) {
            $category = EventCategory::query()->firstOrCreate(
                ['slug' => Str::slug($data['category'])],
                ['name' => $data['category']]
            );

            $event = Event::query()->firstOrCreate(
                ['slug' => Str::slug($data['title'])],
                [
                    'event_category_id' => $category->id,
                    'title' => $data['title'],
                    'event_date' => $data['event_date'],
                    'campus' => $data['campus'],
                    'venue' => $data['venue'],
                    'organizer' => 'Career Institute',
                    'description' => $data['description'],
                    'is_paid' => false,
                    'fee_amount' => null,
                    'has_seat_limit' => true,
                    'seat_limit' => $data['seat_limit'],
                ]
            );

            if (! $event->images()->exists()) {
                $imagePath = $this->seedImage($index + 64);

                if ($imagePath) {
                    $event->images()->create(['image' => $imagePath]);
                }
            }
        }
    }

    private function seedImage(int $imageNumber): ?string
    {
        $filename = "img{$imageNumber}.png";
        $source = public_path("assets/images/{$filename}");

        if (! File::exists($source)) {
            return null;
        }

        $path = "event-gallery/seed-{$filename}";

        if (! Storage::disk('public')->exists($path)) {
            Storage::disk('public')->put($path, File::get($source));
        }

        return $path;
    }

    private function events(): array
    {
        return [
            [
                'title' => 'Career Readiness and Portfolio Building Workshop',
                'category' => 'Workshop',
                'event_date' => now()->addDays(14)->toDateString(),
                'campus' => 'Faisalabad Campus',
                'venue' => 'Main Seminar Hall',
                'seat_limit' => 80,
                'description' => '<p>Build a job-ready portfolio, improve your CV, and practice how to present your skills with confidence to employers and clients.</p>',
            ],
            [
                'title' => 'Technology Career Fair and Employer Networking Day',
                'category' => 'Career Fair',
                'event_date' => now()->addDays(28)->toDateString(),
                'campus' => 'Lahore Campus',
                'venue' => 'Central Exhibition Hall',
                'seat_limit' => 200,
                'description' => '<p>Meet technology employers, explore entry-level opportunities, and connect with professionals from software, design, and digital marketing teams.</p>',
            ],
        ];
    }
}
