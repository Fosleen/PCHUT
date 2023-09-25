<?php

namespace App\Filament\Resources\CPUResource\Pages;

use App\Filament\Resources\CPUResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCPUS extends ListRecords
{
    protected static string $resource = CPUResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
