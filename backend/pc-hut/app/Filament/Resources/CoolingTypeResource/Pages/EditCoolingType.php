<?php

namespace App\Filament\Resources\CoolingTypeResource\Pages;

use App\Filament\Resources\CoolingTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCoolingType extends EditRecord
{
    protected static string $resource = CoolingTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
