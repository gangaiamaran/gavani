<?php

namespace App\Filament\Traits\Resources\RelationManagers;

/**
 * Get the options for table records per page options for relations
 */
trait RelationManagersGetTableRecordsPerPageSelectOptionsTrait
{
    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return config('gavani.adminpanel.tables.per_page_select_options');
    }
}
