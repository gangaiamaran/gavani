<?php

namespace App\Filament\Base\Classes\Resources\RelationManagers;

use App\Filament\Traits\Resources\Pages\List\ListPageGetTableEmptyStateActionsTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableEmptyStateDescriptionTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableEmptyStateHeadingTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableEmptyStateIconTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableQueryStringIdentifierTrait;
use App\Filament\Traits\Resources\Pages\List\ListPageGetTableRecordsPerPageSelectOptionsTrait;
use App\Filament\Traits\Resources\RelationManagers\RelationManagersGetTableActionsTrait;
use App\Filament\Traits\Resources\RelationManagers\RelationManagersGetTableHeaderActionsTrait;
use Filament\Resources\RelationManagers\HasManyRelationManager;
use Filament\Resources\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class BaseHasManyRelationManager extends HasManyRelationManager
{
    use ListPageGetTableEmptyStateActionsTrait;
    use ListPageGetTableEmptyStateDescriptionTrait;
    use ListPageGetTableEmptyStateHeadingTrait;
    use ListPageGetTableEmptyStateIconTrait;
    use ListPageGetTableQueryStringIdentifierTrait;
    use ListPageGetTableRecordsPerPageSelectOptionsTrait;
    use RelationManagersGetTableActionsTrait;
    use RelationManagersGetTableHeaderActionsTrait;

    public function getTableQuery(): Builder
    {
        return static::getResource()::getModel()::query()
            ->setQuery(static::getResource()::getListPageInstance()->getTableQuery()->getQuery())
            ->whereBelongsTo($this->ownerRecord);
    }

    public static function getTitle(): string
    {
        return static::getResource()::getLabel();
    }

    protected static function getPluralRecordLabel(): string
    {
        return static::getResource()::getPluralLabel();
    }

    protected static function getRecordLabel(): string
    {
        return static::getResource()::getNavigationLabel();
    }

    protected function getResourceTable(): Table
    {
        return static::getResource()::getListPageInstance()->table(new Table());
    }

    protected function getTableHeading(): ?string
    {
        return Str::of($this?->ownerRecord?->{static::getRecordTitleAttribute()})
            ->append(' ')
            ->append(' - ')
            ->append(static::getPluralRecordLabel())
            ->__toString();
    }
}
