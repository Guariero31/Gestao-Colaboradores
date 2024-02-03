<?php

namespace App\Filament\Resources\HistoricoPagamentoResource\Pages;

use App\Filament\Resources\HistoricoPagamentoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistoricoPagamento extends EditRecord
{
    protected static string $resource = HistoricoPagamentoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
