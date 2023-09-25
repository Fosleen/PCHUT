<?php

namespace App\Filament\Resources\MouseResource\Pages;

use App\Filament\Resources\MouseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMouse extends EditRecord
{
    protected static string $resource = MouseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
