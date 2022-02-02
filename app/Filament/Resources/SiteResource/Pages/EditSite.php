<?php

namespace App\Filament\Resources\SiteResource\Pages;

use App\Filament\Resources\SiteResource;
use App\Filament\Traits\Resources\Pages\Edit\EditPageGetActionsTrait;
use App\Filament\Traits\Resources\Pages\Edit\EditPageGetBreadcrumbTrait;
use App\Filament\Traits\Resources\Pages\Edit\EditPageGetFormActionsTrait;
use App\Filament\Traits\Resources\Pages\Edit\EditPageGetRedirectUrlTrait;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Pages\EditRecord;

class EditSite extends EditRecord
{
    use EditPageGetActionsTrait;
    use EditPageGetBreadcrumbTrait;
    use EditPageGetFormActionsTrait;
    use EditPageGetRedirectUrlTrait;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([

                        TextInput::make('url')
                            ->required()
                            ->label('Domain')
                            ->maxLength(400)
                            ->unique(static::getModel(), 'url', function ($record) {
                                return $record;
                            })
                            ->rules([
                                //@TODO Add validation for domain
                            ])
                            ->validationAttribute('Domain'),

                        TextInput::make('friendly_name')
                        ->maxLength(300)
                            ->unique(static::getModel(), 'url', function ($record) {
                                return $record;
                            }),


                    ])
                    ->columns([
                        'sm' => 2,
                    ]),

                Card::make()

                    ->schema([
                        Placeholder::make('Monitoring')
                        ->columnSpan(2),
                        Toggle::make('check_ssl')
                        ->label('SSL')
                            ->required(),
                        Toggle::make('check_domain')
                        ->label('Domain')
                        ->required(),

                    ])
                    ->columns([
                        'sm' => 2,
                    ])
                    ->columnSpan([
                        'sm' => 2,
                    ]),
            ]);
    }

    public static function getResource(): string
    {
        return SiteResource::class;
    }
}
