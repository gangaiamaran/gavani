<?php

namespace App\Filament\Traits\Resources\Pages\Edit;

use Filament\Pages\Actions\ButtonAction as PagesButtonAction;

/**
 * Get the Form actions for edit page on Resource
 */
trait EditPageGetFormActionsTrait
{
    protected function getFormActions(): array
    {
        return [
            PagesButtonAction::make('create')
                ->icon('heroicon-o-check')
                ->label('Update')
                ->submit(),
        ];
    }
}
