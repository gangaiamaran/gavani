<?php

namespace App\Filament\Traits\Resources\Pages\List;

/**
 * Get the actions for List page empty state icon on Resource
 */
trait ListPageGetTableEmptyStateIconTrait
{
    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-bookmark';
    }
}
