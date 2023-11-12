<?php

namespace App\Filament\Resources\MartyrResource\Pages;

use App\Filament\Resources\MartyrResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMartyrs extends ListRecords
{
    protected static string $resource = MartyrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
