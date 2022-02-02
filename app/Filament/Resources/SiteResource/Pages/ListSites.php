<?php

namespace App\Filament\Resources\SiteResource\Pages;

use App\Filament\Resources\SiteResource;
use App\Filament\Traits\Resources\Pages\List\ListPageGetActionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableActionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableHeaderActionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableQueryStringIdentifierTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableRecordsPerPageSelectOptionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableRecordUrlUsingTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTitleTrait;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class ListSites extends ListRecords
{
    use ListPageGetActionsTrait;
    use ListPageGetTableActionsTrait;
    use ListPageGetTableHeaderActionsTrait;
    use ListPageGetTableQueryStringIdentifierTrait;
    use ListPageGetTableRecordsPerPageSelectOptionsTrait;
    use ListPageGetTableRecordUrlUsingTrait;
    use ListPageGetTitleTrait;

    public static function getResource(): string
    {
        return SiteResource::class;
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('url')
                    ->label('Url')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('friendly_name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                BooleanColumn::make('is_domain_valid')
                    ->label('Domain valid ?')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->getStateUsing(function ($record) {
                        return $record->is_domain_valid ? true : false;
                    }),
                BooleanColumn::make('check_ssl')
                ->label('SSl Check ?')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->getStateUsing(function ($record) {
                        return $record->check_ssl ? true : false;
                    }),
                BooleanColumn::make('check_domain')
                ->label('Domain Check ?')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->getStateUsing(function ($record) {
                        return $record->check_domain ? true : false;
                    }),

            ]);
    }

    protected function getTableBulkActions(): array
    {
        return [];
    }

    protected function getTableFilters(): array
    {
        return [];
    }

    protected function getTableQuery(): Builder
    {
        return static::getModel()::query();
    }
}
