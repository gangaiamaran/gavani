<?php

namespace App\Filament\Traits\Resources\Pages\List;

/**
 * Get the options for table records per page options for List page on Resource
 */
trait ListPageGetTableRecordsPerPageSelectOptionsTrait
{
    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return config('gavani.adminpanel.tables.per_page_select_options');
    }
}
