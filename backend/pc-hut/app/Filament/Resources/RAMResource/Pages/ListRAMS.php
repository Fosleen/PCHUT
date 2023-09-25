<?php

namespace App\Filament\Resources\RAMResource\Pages;

use App\Filament\Resources\RAMResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRAMS extends ListRecords
{
    protected static string $resource = RAMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
