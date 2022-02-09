<?php

namespace App\Filament\Base\Classes\Resources\Pages;

use App\Filament\Traits\Resources\Pages\Create\CreatePageGetActionsTrait;
use App\Filament\Traits\Resources\Pages\Create\CreatePageGetBreadcrumbTrait;
use App\Filament\Traits\Resources\Pages\Create\CreatePageGetFormActionsTrait;
use App\Filament\Traits\Resources\Pages\Create\CreatePageGetRedirectUrlTrait;
use App\Filament\Traits\Resources\Pages\Create\CreatePageGetTitleTrait;
use Filament\Resources\Pages\CreateRecord;

class BaseCreateRecord extends CreateRecord
{
    use CreatePageGetActionsTrait;
    use CreatePageGetBreadcrumbTrait;
    use CreatePageGetFormActionsTrait;
    use CreatePageGetRedirectUrlTrait;
    use CreatePageGetTitleTrait;
}
