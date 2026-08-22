<?php

namespace App\Support;

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
}
