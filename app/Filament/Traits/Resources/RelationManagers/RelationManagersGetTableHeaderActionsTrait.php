<?php

namespace App\Filament\Traits\Resources\RelationManagers;

use Filament\Pages\Actions\Modal\Actions\ButtonAction as ModalButtonAction;
use Filament\Tables\Actions\ButtonAction as TableButtonAction;

/**
 * Get the table header actions for relations
 */
trait RelationManagersGetTableHeaderActionsTrait
{
    protected function getTableHeaderActions(): array
    {
        return [
            TableButtonAction::make('Add')
                ->label('Add')
                ->icon('heroicon-o-plus-circle')
                ->iconPosition('before')
                ->form($this->getCreateFormSchema())
                ->hidden(! static::getResource()::canCreate())
                ->mountUsing(fn () => $this->fillCreateForm())
                ->modalActions([
                    ModalButtonAction::make('submit')
                        ->icon('heroicon-o-check')
                        ->label(' Save')
                        ->submit(),
                    ModalButtonAction::make('cancel')
                        ->icon('heroicon-o-x')
                        ->label('Cancel')
                        ->cancel()
                        ->color('danger'),
                ])
                ->modalHeading('Create ' . static::getRecordLabel())
                ->action(fn () => $this->create()),
        ];
    }
}
