<?php

namespace App\Filament\Resources\PSUResource\Pages;

use App\Filament\Resources\PSUResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPSUS extends ListRecords
{
    protected static string $resource = PSUResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
