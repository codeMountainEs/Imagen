<?php

namespace App\Filament\Resources\TrabajoTipoResource\Pages;

use App\Filament\Resources\TrabajoTipoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTrabajoTipos extends ListRecords
{
    protected static string $resource = TrabajoTipoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
