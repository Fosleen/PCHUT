<?php

namespace App\Filament\Resources\SocketResource\Pages;

use App\Filament\Resources\SocketResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSocket extends EditRecord
{
    protected static string $resource = SocketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
