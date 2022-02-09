<?php

namespace App\Filament\Resources\Monitoring\SiteResource\Pages;

use App\Filament\Base\Classes\Resources\Pages\BaseListRecords;
use App\Filament\Resources\Monitoring\SiteResource;
use Filament\Resources\Table;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class ListSites extends BaseListRecords
{
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

    protected function getTableQuery(): Builder
    {
        return static::getModel()::query();
    }
}
