<?php

namespace App\Filament\Traits\Resources;

use Illuminate\Support\Str;

/**
 * Get the url slug for resource
 */
trait ResourcesGetSlugTrait
{
    public static function getSlug(): string
    {
        return collect()
            ->merge(static::getNavigationGroup())
            ->merge(parent::getSlug())
            ->map(function ($each) {
                return Str::slug($each);
            })
            ->map([Str::class, 'lower'])
            ->implode('/');
    }
}
