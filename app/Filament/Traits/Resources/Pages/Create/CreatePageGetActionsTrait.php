<?php

namespace App\Filament\Traits\Resources\Pages\Create;

use Filament\Pages\Actions\ButtonAction as PagesButtonAction;

/**
 * Get the Page actions for create page on Resource
 */
trait CreatePageGetActionsTrait
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
