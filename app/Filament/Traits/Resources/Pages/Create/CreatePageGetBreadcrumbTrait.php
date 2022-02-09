<?php

namespace App\Filament\Traits\Resources\Pages\Create;

/**
 * Get the Breadcrumb for create page on Resource
 */
trait CreatePageGetBreadcrumbTrait
{
    public function getBreadcrumb(): string
    {
        return 'Add';
    }
}
