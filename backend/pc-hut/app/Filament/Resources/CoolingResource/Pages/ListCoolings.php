<?php

namespace App\Filament\Resources\CoolingResource\Pages;

use App\Filament\Resources\CoolingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCoolings extends ListRecords
{
    protected static string $resource = CoolingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
