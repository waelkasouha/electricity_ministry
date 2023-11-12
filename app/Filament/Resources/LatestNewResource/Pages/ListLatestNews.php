<?php

namespace App\Filament\Resources\LatestNewResource\Pages;

use App\Filament\Resources\LatestNewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLatestNews extends ListRecords
{
    protected static string $resource = LatestNewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
