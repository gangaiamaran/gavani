<?php

namespace App\Filament\Resources\SiteResource\Pages;

use App\Filament\Resources\SiteResource;
use App\Filament\Traits\Resources\Pages\View\ViewPageGetActionsTrait;
use App\Models\Site;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Resources\Form;
use Filament\Resources\Pages\ViewRecord;

class ViewSite extends ViewRecord
{
    use ViewPageGetActionsTrait;

    public function form(Form $form): Form
    {
        return $form
            ->schema([

                Card::make()
                    ->schema([
                        Placeholder::make('url')
                            ->label('URL')
                            ->content(function (Site $record) {
                                return $record?->url ?? '-';
                            }),

                Placeholder::make('friendly_name')
                    ->label('Friendly Name')
                    ->content(function (Site $record) {
                        return $record?->friendly_name ?? '-';
                    }),

                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan(2),



            ]);
    }

    public static function getResource(): string
    {
        return SiteResource::class;
    }
}
