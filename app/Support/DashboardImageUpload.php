<?php

namespace App\Support;

use Closure;

class DashboardImageUpload
{
    public const MAX_FILE_SIZE_KB = 500;

    public const ALLOWED_EXTENSIONS = ['webp', 'svg'];

    public const ACCEPT_ATTRIBUTE = '.webp,.svg';

    public const HINT = 'Only WEBP or SVG files up to 500 KB are allowed.';

    public static function rules(bool $required = false): array
    {
        return array_merge(
            [$required ? 'required' : 'nullable'],
            self::baseRules()
        );
    }

    public static function baseRules(): array
    {
        return [
            'file',
            'mimes:'.implode(',', self::ALLOWED_EXTENSIONS),
            'extensions:'.implode(',', self::ALLOWED_EXTENSIONS),
            'max:'.self::MAX_FILE_SIZE_KB,
        ];
    }

    public static function rulesWithDimensions(int $width, int $height, bool $required = false): array
    {
        return array_merge(
            [$required ? 'required' : 'nullable'],
            self::baseRules(),
            [self::exactDimensionsRule($width, $height)]
        );
    }

    private static function exactDimensionsRule(int $width, int $height): Closure
    {
        return static function (string $attribute, mixed $value, Closure $fail) use ($width, $height): void {
            $extension = strtolower($value->getClientOriginalExtension());
            $dimensions = $extension === 'svg'
                ? self::svgDimensions($value->getRealPath())
                : @getimagesize($value->getRealPath());

            if (! $dimensions || (float) $dimensions[0] !== (float) $width || (float) $dimensions[1] !== (float) $height) {
                $detectedDimensions = $dimensions ? " Detected: {$dimensions[0]}x{$dimensions[1]} pixels." : '';
                $fail("The {$attribute} must be exactly {$width}x{$height} pixels.{$detectedDimensions}");
            }
        };
    }

    private static function svgDimensions(string $path): ?array
    {
        $contents = @file_get_contents($path);

        if ($contents === false || ! preg_match('/<svg\\b[^>]*>/i', $contents, $matches)) {
            return null;
        }

        $svgTag = $matches[0];

        if (preg_match('/\\bviewBox\\s*=\\s*["\']([^"\']+)["\']/i', $svgTag, $viewBoxMatch)) {
            $viewBox = preg_split('/[\\s,]+/', trim($viewBoxMatch[1]));

            if (count($viewBox) === 4 && is_numeric($viewBox[2]) && is_numeric($viewBox[3])) {
                return [(float) $viewBox[2], (float) $viewBox[3]];
            }
        }

        preg_match('/\\bwidth\\s*=\\s*["\']([0-9]+(?:\\.[0-9]+)?)(?:px)?["\']/i', $svgTag, $widthMatch);
        preg_match('/\\bheight\\s*=\\s*["\']([0-9]+(?:\\.[0-9]+)?)(?:px)?["\']/i', $svgTag, $heightMatch);

        if (isset($widthMatch[1], $heightMatch[1])) {
            return [(float) $widthMatch[1], (float) $heightMatch[1]];
        }

        return null;
    }
}
