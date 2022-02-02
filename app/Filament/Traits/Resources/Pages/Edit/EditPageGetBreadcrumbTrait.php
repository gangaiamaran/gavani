<?php

namespace App\Filament\Traits\Resources\Pages\Edit;

/**
 * Get the Breadcrumb for edit page on Resource
 */
trait EditPageGetBreadcrumbTrait
{
    public function getBreadcrumb(): string
    {
        return 'Edit';
    }
}
