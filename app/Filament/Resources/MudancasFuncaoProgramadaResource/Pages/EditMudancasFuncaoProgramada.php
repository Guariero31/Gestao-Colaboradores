<?php

namespace App\Filament\Resources\MudancasFuncaoProgramadaResource\Pages;

use App\Filament\Resources\MudancasFuncaoProgramadaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMudancasFuncaoProgramada extends EditRecord
{
    protected static string $resource = MudancasFuncaoProgramadaResource::class;

    public function getTitle(): string
    {
        return 'Mudança de Função Programada';
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
