<?php

namespace App\Filament\Traits\Resources\Pages\Edit;

use Illuminate\Support\Str;

/**
 * Get the title for Edit page on Resource
 */
trait EditPageGetTitleTrait
{
    protected function getTitle(): string
    {
        return Str::of('Edit ')
        ->append(Str::singular(static::getResource()::getPluralLabel()));
    }
}
