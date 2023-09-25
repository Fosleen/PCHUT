<?php

namespace App\Filament\Resources\KeyboardResource\Pages;

use App\Filament\Resources\KeyboardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKeyboards extends ListRecords
{
    protected static string $resource = KeyboardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
