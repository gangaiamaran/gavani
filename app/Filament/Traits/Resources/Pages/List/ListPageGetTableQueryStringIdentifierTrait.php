<?php

namespace App\Filament\Traits\Resources\Pages\List;

use Illuminate\Support\Str;

/**
 * Get the query string for table pagination on List page for the Resource
 */
trait ListPageGetTableQueryStringIdentifierTrait
{
    protected function getTableQueryStringIdentifier(): string
    {
        return Str::of(static::getResource()::getModel())
            ->basename()
            ->pluralStudly()
            ->snake()
            ->pipe('md5')
            ->__toString();
    }
}
