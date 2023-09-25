<?php

namespace App\Filament\Resources\ComponentImageResource\Pages;

use App\Filament\Resources\ComponentImageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComponentImage extends EditRecord
{
    protected static string $resource = ComponentImageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
