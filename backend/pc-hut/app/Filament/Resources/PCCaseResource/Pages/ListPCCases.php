<?php

namespace App\Filament\Resources\PCCaseResource\Pages;

use App\Filament\Resources\PCCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPCCases extends ListRecords
{
    protected static string $resource = PCCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
