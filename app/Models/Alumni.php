<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Alumni extends Model
{
    protected $table = 'alumni';

    protected $fillable = ['name', 'designation', 'review', 'photo'];

    public function resolvePhotoPath(): ?string
    {
        $path = str_replace('\\', '/', trim((string) $this->photo));

        if ($path === '') {
            return null;
        }

        $path = ltrim($path, '/');
        $prefixes = [
            str_replace('\\', '/', storage_path('app/public')).'/',
            str_replace('\\', '/', public_path('storage')).'/',
            'storage/app/public/',
            'app/public/',
            'public/storage/',
            'public/',
            'storage/',
        ];

        do {
            $originalPath = $path;

            foreach ($prefixes as $prefix) {
                if (Str::startsWith(Str::lower($path), Str::lower($prefix))) {
                    $path = ltrim(substr($path, strlen($prefix)), '/');
                    break;
                }
            }

            if ($path === $originalPath) {
                break;
            }
        } while (true);

        $isStoredPhoto = Storage::disk('public')->exists($path);
        $isPublicAlumniPhoto = Str::startsWith($path, 'uploads/alumni/') && is_file(public_path($path));

        if ($path === '' || str_contains($path, '..') || (! $isStoredPhoto && ! $isPublicAlumniPhoto)) {
            return null;
        }

        return $path;
    }

    public function getPhotoUrlAttribute(): string
    {
        $path = $this->resolvePhotoPath();

        if ($path === null) {
            return asset('assets/images/img05.png');
        }

        return Str::startsWith($path, 'uploads/alumni/')
            ? asset($path)
            : asset('storage/'.$path);
    }
}
