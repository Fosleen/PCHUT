<?php

namespace App\Filament\Resources\RAMResource\Pages;

use App\Filament\Resources\RAMResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRAM extends EditRecord
{
    protected static string $resource = RAMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
