<?php

namespace App\Filament\Resources\MartyrResource\Pages;

use App\Filament\Resources\MartyrResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMartyr extends EditRecord
{
    protected static string $resource = MartyrResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
