<?php

namespace App\Filament\Resources\RamTypeResource\Pages;

use App\Filament\Resources\RamTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRamType extends EditRecord
{
    protected static string $resource = RamTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
