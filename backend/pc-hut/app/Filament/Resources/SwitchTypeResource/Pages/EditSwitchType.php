<?php

namespace App\Filament\Resources\SwitchTypeResource\Pages;

use App\Filament\Resources\SwitchTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSwitchType extends EditRecord
{
    protected static string $resource = SwitchTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
