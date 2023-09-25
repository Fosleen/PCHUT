<?php

namespace App\Filament\Resources\ComponentImageResource\Pages;

use App\Filament\Resources\ComponentImageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComponentImages extends ListRecords
{
    protected static string $resource = ComponentImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
