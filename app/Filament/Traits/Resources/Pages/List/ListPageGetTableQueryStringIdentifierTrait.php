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
        return Str::of(static::getResource())
            ->basename()
            ->beforeLast('Resource')
            ->plural()
            ->pipe('lcfirst')
            ->__toString();
    }
}
