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
        //@todo Add loading state to button
        return [
            PagesButtonAction::make('edit_page_form_save_button')
                ->iconPosition('before')
                ->icon('heroicon-o-check')
                ->label('Update')
                ->submit('save'),
        ];
    }
}
