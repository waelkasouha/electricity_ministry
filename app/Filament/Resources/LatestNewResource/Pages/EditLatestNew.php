<?php

namespace App\Filament\Resources\LatestNewResource\Pages;

use App\Filament\Resources\LatestNewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLatestNew extends EditRecord
{
    protected static string $resource = LatestNewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
