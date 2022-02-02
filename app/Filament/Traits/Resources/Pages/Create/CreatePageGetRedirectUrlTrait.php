<?php

namespace App\Filament\Traits\Resources\Pages\Create;

use Illuminate\Support\Str;

/**
 * Get the Page actions for create page on Resource
 */
trait CreatePageGetRedirectUrlTrait
{
    protected function getRedirectUrl(): ?string
    {
        $this->notify('success', Str::of(static::getResource()::getLabel())->append(' ')->append('Added')->__toString());

        return static::getResource()::getUrl('index');
    }
}
