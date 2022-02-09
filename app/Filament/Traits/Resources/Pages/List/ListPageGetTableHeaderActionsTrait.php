<?php

namespace App\Filament\Traits\Resources\Pages\List;

use Filament\Tables\Actions\ButtonAction as TableButtonAction;
use Illuminate\Support\Str;

/**
 * Get the table header actions for List page on Resource
 */
trait ListPageGetTableHeaderActionsTrait
{
    public static function excelExportClass()
    {
        return Str::of(static::getResource()::getModel())
            ->replace(['App\Models\\'], ['App\Exports\ExcelExport\FromFilteredQuery\\'])
            ->append('Export')
            ->__toString();
    }

    public function exportToExcel()
    {
        return app(self::excelExportClass())->setQueryBuilder($this->getFilteredTableQuery());
    }

    public function getTableHeaderActions(): array
    {
        return [


            TableButtonAction::make('list_page_table_header_export_button')
                ->label('Export')
                ->iconPosition('before')
                ->icon('heroicon-o-arrow-circle-right')
                ->color('secondary')
                ->action('exportToExcel')
                ->visible(static::getResource()::canExport())
                ,

            TableButtonAction::make('list_page_table_header_add_button')
            ->label('Add')
                ->iconPosition('before')
                ->icon('heroicon-o-plus-circle')
                ->color('primary')
                ->url(static::getResource()::getUrl('create'))
                ->visible(static::getResource()::canCreate()),
        ];
    }
}
