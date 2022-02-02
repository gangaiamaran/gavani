<?php

namespace App\Filament\Traits\Resources\Pages\List;

use Closure;
use Illuminate\Database\Eloquent\Model;

/**
 * Get the url for table record List page on Resource
 */
trait ListPageGetTableRecordUrlUsingTrait
{
    protected function getTableRecordUrlUsing(): Closure
    {
        return function (Model $record) {
            return null;
        };
    }
}
