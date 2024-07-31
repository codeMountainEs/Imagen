<?php

namespace App\Filament\Resources\ObraTipoResource\Pages;

use App\Filament\Resources\ObraTipoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListObraTipos extends ListRecords
{
    protected static string $resource = ObraTipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
