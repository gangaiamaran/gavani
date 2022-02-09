<?php

namespace App\Filament\Traits\Resources\Pages\Create;

use Illuminate\Support\Str;

/**
 * Get the title for Create page on Resource
 */
trait CreatePageGetTitleTrait
{
    protected function getTitle(): string
    {
        return Str::of('Create ')
        ->append(Str::singular(static::getResource()::getPluralLabel()));
    }
}
