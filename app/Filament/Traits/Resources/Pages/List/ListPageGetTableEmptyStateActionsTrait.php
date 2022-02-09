<?php

namespace App\Filament\Traits\Resources\Pages\List;

use Filament\Tables\Actions\ButtonAction as TablesButtonAction;
use Illuminate\Support\Str;

/**
 * Get the actions for List page empty state actions on Resource
 */
trait ListPageGetTableEmptyStateActionsTrait
{
    protected function getTableEmptyStateActions(): array
    {
        return [
            TablesButtonAction::make('create')
                ->label(Str::of('Add')->append(' ')->append(Str::singular(static::getResource()::getPluralLabel())))
                ->iconPosition('before')
                ->url(static::getResource()::getUrl('create'))
                ->icon('heroicon-o-plus-circle')
                ->visible(static::getResource()::canCreate()),
        ];
    }
}
