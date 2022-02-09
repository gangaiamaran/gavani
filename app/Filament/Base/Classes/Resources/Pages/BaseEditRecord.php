<?php

namespace App\Filament\Base\Classes\Resources\Pages;

use App\Filament\Traits\Resources\Pages\Edit\EditPageGetActionsTrait;
use App\Filament\Traits\Resources\Pages\Edit\EditPageGetBreadcrumbTrait;
use App\Filament\Traits\Resources\Pages\Edit\EditPageGetFormActionsTrait;
use App\Filament\Traits\Resources\Pages\Edit\EditPageGetRedirectUrlTrait;
use App\Filament\Traits\Resources\Pages\Edit\EditPageGetTitleTrait;
use Filament\Resources\Pages\EditRecord;

class BaseEditRecord extends EditRecord
{
    use EditPageGetActionsTrait;
    use EditPageGetBreadcrumbTrait;
    use EditPageGetFormActionsTrait;
    use EditPageGetRedirectUrlTrait;
    use EditPageGetTitleTrait;
}
