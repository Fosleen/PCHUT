<?php

namespace App\Filament\Resources\StorageTypeResource\Pages;

use App\Filament\Resources\StorageTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStorageTypes extends ListRecords
{
    protected static string $resource = StorageTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
