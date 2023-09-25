<?php

namespace App\Filament\Resources\MotherboardResource\Pages;

use App\Filament\Resources\MotherboardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMotherboards extends ListRecords
{
    protected static string $resource = MotherboardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
