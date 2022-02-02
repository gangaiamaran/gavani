<?php

namespace App\Filament\Traits\Resources\Pages\Edit;

use Illuminate\Support\Str;

/**
 * Get the Redierct Url for  edit page on Resource
 */
trait EditPageGetRedirectUrlTrait
{
    protected function getRedirectUrl(): ?string
    {
        $this->notify('success', Str::of(static::getResource()::getLabel())->append(' ')->append('Updated')->__toString());

        return static::getResource()::getUrl('index');
    }
}
