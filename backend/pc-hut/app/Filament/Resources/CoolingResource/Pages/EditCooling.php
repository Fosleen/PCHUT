<?php

namespace App\Filament\Resources\CoolingResource\Pages;

use App\Filament\Resources\CoolingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCooling extends EditRecord
{
    protected static string $resource = CoolingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
