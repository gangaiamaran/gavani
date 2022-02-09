<?php

namespace App\Filament\Traits\Resources\Pages\View;

use Filament\Pages\Actions\ButtonAction as PagesButtonAction;

/**
 * Get the Page actions for view page on Resource
 */
trait ViewPageGetActionsTrait
{
    public function getActions(): array
    {
        return [

            PagesButtonAction::make('view_page_edit_action')
                ->label('Edit')
                ->url(function () {
                    return static::getResource()::getUrl('edit', ['record' => $this->record, 'fromPage' => 'editRecord']);
                })
                ->hidden(! static::getResource()::canEdit($this->record))
                ->icon('heroicon-o-pencil'),

            PagesButtonAction::make('view_page_back_action')
                ->label('Back')
                ->url(static::getResource()::getUrl())
                ->color('danger')
                ->icon('heroicon-o-arrow-circle-left'),
        ];
    }
}
