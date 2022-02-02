<?php

namespace App\Filament\Traits\Resources\Pages\List;

use Filament\Tables\Actions\IconButtonAction as TablesIconButtonAction;
use Illuminate\Support\Str;

/**
 * Get the table header actions for List page on Resource
 */
trait ListPageGetTableHeaderActionsTrait
{
    public static function excelExportClass()
    {
        $modelName = Str::of(static::getResource())->basename()->beforeLast('Resource');

        $resourceNamespaceForModel = Str::of(static::getResource())->explode('\\')->reverse()->skip(1)->reverse()->merge($modelName)->implode('\\');

        return Str::of($resourceNamespaceForModel)->remove(['App\Filament\Resources\\'])->prepend('App\Exports\ExcelExport\\')->finish('Export')->__toString();
    }

    public function exportToExcel()
    {
        return app(self::excelExportClass())->setQueryBuilder($this->getFilteredTableQuery());
    }

    protected function getTableHeaderActions(): array
    {
        return [
            TablesIconButtonAction::make('Export')
                ->icon('heroicon-o-arrow-circle-right')
                ->action('exportToExcel')
                ->hidden(! static::getResource()::canExport()),
        ];
    }
}
