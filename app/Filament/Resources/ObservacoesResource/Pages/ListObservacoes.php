<?php

namespace App\Filament\Resources\ObservacoesResource\Pages;

use App\Filament\Resources\ObservacoesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListObservacoes extends ListRecords
{
    protected static string $resource = ObservacoesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
