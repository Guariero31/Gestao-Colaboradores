<?php

namespace App\Filament\Resources\MudancasFuncaoProgramadaResource\Pages;

use App\Filament\Resources\MudancasFuncaoProgramadaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMudancasFuncaoProgramadas extends ListRecords
{
    protected static string $resource = MudancasFuncaoProgramadaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
