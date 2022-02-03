<?php

namespace App\Filament\Resources\SiteResource\Pages;

use App\Filament\Resources\SiteResource;
use App\Filament\Traits\Resources\Pages\Create\CreatePageGetActionsTrait;
use App\Filament\Traits\Resources\Pages\Create\CreatePageGetBreadcrumbTrait;
use App\Filament\Traits\Resources\Pages\Create\CreatePageGetFormActionsTrait;
use App\Filament\Traits\Resources\Pages\Create\CreatePageGetRedirectUrlTrait;
use App\Rules\Site\DomainMustBeValidRule;
use App\Rules\Site\DomainMustNotStartWithProtocolRule;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Pages\CreateRecord;

class CreateSite extends CreateRecord
{
    use CreatePageGetActionsTrait;
    use CreatePageGetBreadcrumbTrait;
    use CreatePageGetFormActionsTrait;
    use CreatePageGetRedirectUrlTrait;

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
                                new DomainMustNotStartWithProtocolRule,
                                'active_url'
                            ])
                            ->validationAttribute('Domain Name'),

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
