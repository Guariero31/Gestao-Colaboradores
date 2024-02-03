<?php

namespace App\Filament\Resources\HistoricoPagamentoResource\Pages;

use App\Filament\Resources\HistoricoPagamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistoricoPagamentos extends ListRecords
{
    protected static string $resource = HistoricoPagamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
