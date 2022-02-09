<?php

namespace App\Filament\Traits\Resources\Pages\List;

use Filament\Tables\Actions\IconButtonAction as TablesIconButtonAction;
use Illuminate\Support\Str;

/**
 * Get the actions for List page on Resource
 */
trait ListPageGetTableActionsTrait
{
    public function getTableActions(): array
    {
        return [

            TablesIconButtonAction::make('list_page_table_record_edit')
                ->icon('heroicon-o-pencil-alt')
                ->url(fn ($record): string => static::getResource()::getUrl('edit', ['record' => $record]))
                ->visible(fn ($record): bool => static::getResource()::canEdit($record)),

            TablesIconButtonAction::make('list_page_table_record_view')
                ->icon('heroicon-o-eye')
                ->url(fn ($record): string => static::getResource()::getUrl('view', ['record' => $record]))
                ->visible(fn ($record): bool => static::getResource()::canView($record)),

            TablesIconButtonAction::make('list_page_table_record_delete')
                ->icon('heroicon-o-trash')
                ->color('danger')
                ->requiresConfirmation(true)
                ->modalHeading(Str::of('Delete ')->append(Str::singular(static::getResource()::getPluralLabel())))
                ->centerModal(true)
                ->modalSubheading('Are you sure you\'d like to delete ? This cannot be undone.')
                ->modalButton('Delete')
                ->action(function ($record) {
                    $record->delete();
                    $this->notify('success', Str::of(static::getResource()::getLabel())->append(' ')->append('Deleted')->__toString());
                })
                ->visible(fn ($record): bool => static::getResource()::canDelete($record)),
        ];
    }
}
