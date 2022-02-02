<?php

namespace App\Filament\Traits\Resources\Pages\Edit;

use Filament\Pages\Actions\ButtonAction as PagesButtonAction;

/**
 * Get the Page actions for edit page on Resource
 */
trait EditPageGetActionsTrait
{
    public function getActions(): array
    {
        return [
            PagesButtonAction::make('back')
                ->label('Back')
                ->url(static::getResource()::getUrl())
                ->color('danger')
                ->icon('heroicon-o-arrow-circle-left'),

        ];
    }
}
