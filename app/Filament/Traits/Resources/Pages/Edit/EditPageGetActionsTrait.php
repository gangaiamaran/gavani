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

            PagesButtonAction::make('edit_page_show_button')
                ->label('View')
                ->url(static::getResource()::getUrl('view', ['record' => $this->record, 'fromPage' => 'editRecord']))
                ->visible(static::getResource()::canEdit($this->record))
                ->icon('heroicon-o-eye'),

            PagesButtonAction::make('edit_page_back_buttom')
                ->label('Back')
                ->url(static::getResource()::getUrl())
                ->color('danger')
                ->icon('heroicon-o-arrow-circle-left'),

        ];
    }
}
