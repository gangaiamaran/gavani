<?php

namespace App\Filament\Base\Classes\Resources\Pages;

use App\Filament\Traits\Resources\Pages\View\ViewPageGetActionsTrait;
use Filament\Resources\Pages\ViewRecord;

class BaseViewRecord extends ViewRecord
{
    use ViewPageGetActionsTrait;
}
