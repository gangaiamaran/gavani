<?php

namespace App\Filament\Traits\Resources\Pages\List;

use Illuminate\Support\Str;

/**
 * Get the actions for List page empty state heading on Resource
 */
trait ListPageGetTableEmptyStateHeadingTrait
{
    protected function getTableEmptyStateHeading(): ?string
    {
        return Str::of('No ')
            ->append(static::getResource()::getPluralLabel())
            ->append(' yet');
    }
}
