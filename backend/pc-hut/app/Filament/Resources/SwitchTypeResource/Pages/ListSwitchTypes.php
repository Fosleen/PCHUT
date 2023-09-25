<?php

namespace App\Filament\Resources\SwitchTypeResource\Pages;

use App\Filament\Resources\SwitchTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSwitchTypes extends ListRecords
{
    protected static string $resource = SwitchTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
