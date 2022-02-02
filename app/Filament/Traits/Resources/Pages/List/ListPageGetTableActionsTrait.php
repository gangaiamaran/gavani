<?php

namespace App\Filament\Traits\Resources\Pages\List;

use Filament\Tables\Actions\IconButtonAction as TablesIconButtonAction;

/**
 * Get the actions for List page on Resource
 */
trait ListPageGetTableActionsTrait
{
    public function getTableActions(): array
    {
        $actionArray[] = TablesIconButtonAction::make('table_records_edit')
            ->icon('heroicon-o-pencil-alt')
            ->url(fn ($record): string => static::getResource()::getUrl('edit', ['record' => $record]))
            ->hidden(fn ($record): bool => ! static::getResource()::canEdit($record));

        $actionArray[] = TablesIconButtonAction::make('table_records_view')
            ->icon('heroicon-o-eye')
            ->url(function ($record) {
                return static::getResource()::getUrl('view', ['record' => $record]);
            })
            ->hidden(fn ($record): bool => ! static::getResource()::canView($record));

        return $actionArray;
    }
}
