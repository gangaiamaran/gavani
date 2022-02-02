<?php

namespace App\Filament\Traits\Resources\RelationManagers;

use Filament\Tables\Actions\IconButtonAction as TablesIconButtonAction;
use Filament\Tables\Actions\Modal\Actions\ButtonAction as TablesButtonAction;
use Illuminate\Database\Eloquent\Model;

/**
 * Get the table actions for relations
 */
trait RelationManagersGetTableActionsTrait
{
    public function getTableActions(): array
    {
        return [
            TablesIconButtonAction::make('edit')
                ->form($this->getEditFormSchema())
                ->mountUsing(fn () => $this->fillEditForm())
                ->modalHeading('Edit ' . static::getRecordLabel())
                ->modalActions([
                    TablesButtonAction::make('submit')
                        ->icon('heroicon-o-check')
                        ->label(' Update')
                        ->submit(),
                    TablesButtonAction::make('cancel')
                        ->icon('heroicon-o-x')
                        ->label('Cancel')
                        ->cancel()
                        ->color('danger'),
                ])
                ->action(fn () => $this->save())
                ->icon('heroicon-o-pencil')
                ->hidden(fn (Model $record): bool => ! static::getResource()::canEdit($record)),

            TablesIconButtonAction::make('show')
                ->hidden(true)
                ->form($this->getEditFormSchema())
                ->mountUsing(fn () => $this->fillEditForm())
                ->modalButton('Save')
                ->modalHeading('Show ' . static::getRecordLabel())
                ->modalActions([
                    TablesButtonAction::make('submit')
                        ->icon('heroicon-o-check')
                        ->label(' Update')
                        ->submit(),
                    TablesButtonAction::make('cancel')
                        ->icon('heroicon-o-x')
                        ->label('Cancel')
                        ->cancel()
                        ->color('danger'),
                ])
                ->action(fn () => $this->save())
                ->icon('heroicon-o-eye')
                // ->hidden(fn (Model $record): bool => !static::getResource()::canEdit($record))
                ,
        ];
    }
}
