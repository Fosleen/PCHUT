<?php

namespace App\Filament\Resources\PSUResource\Pages;

use App\Filament\Resources\PSUResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPSU extends EditRecord
{
    protected static string $resource = PSUResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
