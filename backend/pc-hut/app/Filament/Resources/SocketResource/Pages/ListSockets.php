<?php

namespace App\Filament\Resources\SocketResource\Pages;

use App\Filament\Resources\SocketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSockets extends ListRecords
{
    protected static string $resource = SocketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
