<?php

namespace App\Filament\Traits\Resources\Pages\List;

use Illuminate\Support\Str;

/**
 * Get the actions for List page empty state description on Resource
 */
trait ListPageGetTableEmptyStateDescriptionTrait
{
    protected function getTableEmptyStateDescription(): ?string
    {
        return Str::of('You may create a')
            ->append(' ')
            ->append(Str::singular(static::getResource()::getPluralLabel()))
            ->append(' ')
            ->append('using the button below.');
    }
}
