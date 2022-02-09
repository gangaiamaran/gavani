<?php

namespace App\Filament\Base\Classes\Resources\Pages;

use App\Filament\Traits\Resources\Pages\List\ListPageGetActionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableActionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableBulkActionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableEmptyStateActionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableEmptyStateDescriptionTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableEmptyStateHeadingTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableEmptyStateIconTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableHeaderActionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableQueryStringIdentifierTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableRecordsPerPageSelectOptionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableRecordUrlUsingTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTitleTrait;
use Closure;
use Filament\Resources\Pages\ListRecords;

class BaseListRecords extends ListRecords
{
    use ListPageGetActionsTrait;
    use ListPageGetTableActionsTrait;
    use ListPageGetTableBulkActionsTrait;
    use ListPageGetTableEmptyStateActionsTrait;
    use ListPageGetTableEmptyStateDescriptionTrait;
    use ListPageGetTableEmptyStateHeadingTrait;
    use ListPageGetTableEmptyStateIconTrait;
    use ListPageGetTableHeaderActionsTrait;
    use ListPageGetTableQueryStringIdentifierTrait;
    use ListPageGetTableRecordsPerPageSelectOptionsTrait;
    use ListPageGetTableRecordUrlUsingTrait;
    use ListPageGetTitleTrait;

    protected function getTableHeading(): string | Closure | null
    {
        return static::getResource()::getPluralLabel();
    }
}
