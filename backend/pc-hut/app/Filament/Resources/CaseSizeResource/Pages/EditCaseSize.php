<?php

namespace App\Filament\Resources\CaseSizeResource\Pages;

use App\Filament\Resources\CaseSizeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCaseSize extends EditRecord
{
    protected static string $resource = CaseSizeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
