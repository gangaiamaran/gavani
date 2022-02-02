<?php

namespace App\Filament\Traits\Resources\Pages\Create;

use Filament\Pages\Actions\ButtonAction as PagesButtonAction;

/**
 * Get the Form actions for create page on Resource
 */
trait CreatePageGetFormActionsTrait
{
    protected function getFormActions(): array
    {
        return [
            PagesButtonAction::make('create')
                ->icon('heroicon-o-check')
                ->label('Save')
                ->submit(),
        ];
    }
}
