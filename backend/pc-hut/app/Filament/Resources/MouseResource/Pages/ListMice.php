<?php

namespace App\Filament\Resources\MouseResource\Pages;

use App\Filament\Resources\MouseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMice extends ListRecords
{
    protected static string $resource = MouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
