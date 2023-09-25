<?php

namespace App\Filament\Resources\PCCaseResource\Pages;

use App\Filament\Resources\PCCaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPCCase extends EditRecord
{
    protected static string $resource = PCCaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
