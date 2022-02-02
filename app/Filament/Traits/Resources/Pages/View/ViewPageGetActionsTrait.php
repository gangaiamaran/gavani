<?php

namespace App\Filament\Traits\Resources\Pages\View;

use Filament\Pages\Actions\ButtonAction as PagesButtonAction;

/**
 * Get the actions for View page on Resource
 */
trait ViewPageGetActionsTrait
{
    public function getActions(): array
    {
        $actionArray = [];

        $actionArray[] = PagesButtonAction::make('view_back_button')
            ->iconPosition('before')
            ->label('Back')
            ->url(static::getResource()::getUrl())
            ->color('danger')
            ->icon('heroicon-o-arrow-circle-left')
            ->hidden(! static::getResource()::canViewAny());

        return $actionArray;
    }
}
