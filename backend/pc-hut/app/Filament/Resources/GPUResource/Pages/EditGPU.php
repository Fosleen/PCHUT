<?php

namespace App\Filament\Resources\GPUResource\Pages;

use App\Filament\Resources\GPUResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGPU extends EditRecord
{
    protected static string $resource = GPUResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
