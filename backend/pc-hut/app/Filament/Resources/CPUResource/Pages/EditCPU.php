<?php

namespace App\Filament\Resources\CPUResource\Pages;

use App\Filament\Resources\CPUResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCPU extends EditRecord
{
    protected static string $resource = CPUResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
