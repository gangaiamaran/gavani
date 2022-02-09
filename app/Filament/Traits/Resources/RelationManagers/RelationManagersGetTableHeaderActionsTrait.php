<?php

namespace App\Filament\Traits\Resources\RelationManagers;

use App\Filament\Traits\Resources\Pages\List\ListPageGetTableHeaderActionsTrait;
use Filament\Pages\Actions\Modal\Actions\ButtonAction as ModalButtonAction;
use Filament\Tables\Actions\ButtonAction as TableButtonAction;
use Illuminate\Support\Str;

/**
 * Get the table header actions for relations
 */
trait RelationManagersGetTableHeaderActionsTrait
{
    use ListPageGetTableHeaderActionsTrait;

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

    protected function getTableHeaderActions(): array
    {
        return [

            TableButtonAction::make('list_page_table_header_export_button')
            ->label('Export')
                ->iconPosition('before')
                ->icon('heroicon-o-arrow-circle-right')
                ->color('secondary')
                ->action('exportToExcel')
                ->visible(static::getResource()::canExport()),

            TableButtonAction::make('Add')
                ->label('Add')
                ->icon('heroicon-o-plus-circle')
                ->iconPosition('before')
                ->form($this->getCreateFormSchema())
                ->visible(static::getResource()::canCreate())
                ->mountUsing(fn () => $this->fillCreateForm())
                ->modalActions([
                    ModalButtonAction::make('relation_create_page_form_save_button')
                        ->icon('heroicon-o-check')
                        ->iconPosition('before')
                        ->label('Save')
                        ->submit('create'),
                    ModalButtonAction::make('relation_create_page_form_cancel_button')
                        ->icon('heroicon-o-x')
                        ->iconPosition('before')
                        ->label('Cancel')
                        ->cancel()
                        ->color('danger'),
                ])
                ->modalHeading('Create ' . static::getRecordLabel())
                ->action(fn () => $this->create()),
        ];
    }
}
