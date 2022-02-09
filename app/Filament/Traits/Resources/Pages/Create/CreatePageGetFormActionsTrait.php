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
        //@todo Add loading state to button
        return [
            PagesButtonAction::make('create_page_form_save_button')
                ->iconPosition('before')
                ->icon('heroicon-o-check')
                ->label('Save')
                ->submit('create'),
        ];
    }
}
