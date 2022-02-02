<?php

namespace App\Filament\Traits\Resources\Pages\List;

use Filament\Pages\Actions\ButtonAction as PagesButtonAction;

/**
 * Get the actions for List page on Resource
 */
trait ListPageGetActionsTrait
{
    public function getActions(): array
    {
        $actionArray = [];

        $actionArray[] = PagesButtonAction::make('table_add_button')
            ->label('Add')
            ->iconPosition('before')
            ->url(static::getResource()::getUrl('create'))
            ->icon('heroicon-o-plus-circle')
            ->hidden(! static::getResource()::canCreate());

        return $actionArray;
    }
}
