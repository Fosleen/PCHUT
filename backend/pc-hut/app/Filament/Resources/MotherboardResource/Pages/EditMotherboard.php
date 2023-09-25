<?php

namespace App\Filament\Resources\MotherboardResource\Pages;

use App\Filament\Resources\MotherboardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMotherboard extends EditRecord
{
    protected static string $resource = MotherboardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
