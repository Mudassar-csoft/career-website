<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use RuntimeException;

class ImsCatalog
{
    public function get(string $resource): array
    {
        $url = config('services.ims.'.$resource.'_url');

        return Cache::remember('chatbot.catalog.'.sha1($url), config('chatbot.cache_seconds'), function () use ($url, $resource) {
            $response = Http::acceptJson()->connectTimeout(5)->timeout(12)->get($url);
            $payload = $response->json();

            if (! $response->successful() || data_get($payload, 'status') !== 'success' || ! is_array(data_get($payload, 'data'))) {
                throw new RuntimeException('IMS '.$resource.' catalog is unavailable.');
            }

            return collect($payload['data'])
                ->filter(fn ($item) => is_array($item) && ($item['status'] ?? null) === 'active' && ! empty($item['id']) && ! empty($item['name']))
                ->map(function ($item) use ($resource) {
                    // Only public catalog fields are sent to the browser or AI provider.
                    $fields = $resource === 'programs'
                        ? ['id', 'name', 'code', 'description', 'program_type', 'fee', 'duration_weeks', 'installments', 'prerequisite']
                        : ['id', 'name', 'code', 'city', 'address', 'campus_email', 'landline', 'mobile'];
                    $record = array_intersect_key($item, array_flip($fields));

                    foreach ($record as $key => $value) {
                        if (is_string($value)) {
                            $record[$key] = Str::limit(trim(html_entity_decode(strip_tags($value), ENT_QUOTES | ENT_HTML5, 'UTF-8')), 1500);
                        }
                    }

                    return $record;
                })
                ->values()->all();
        });
    }
}
