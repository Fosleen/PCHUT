<?php

namespace App\Filament\Resources\CoolingTypeResource\Pages;

use App\Filament\Resources\CoolingTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoolingTypes extends ListRecords
{
    protected static string $resource = CoolingTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
