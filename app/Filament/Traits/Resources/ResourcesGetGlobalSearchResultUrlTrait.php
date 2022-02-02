<?php

namespace App\Filament\Traits\Resources;

use Illuminate\Database\Eloquent\Model;

/**
 * Get the url for global search results
 */
trait ResourcesGetGlobalSearchResultUrlTrait
{
    public static function getGlobalSearchResultUrl(Model $record): string
    {
        return static::getUrl('view', ['record' => $record]);
    }
}
