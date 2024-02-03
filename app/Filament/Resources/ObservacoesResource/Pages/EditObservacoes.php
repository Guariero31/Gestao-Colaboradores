<?php

namespace App\Filament\Resources\ObservacoesResource\Pages;

use App\Filament\Resources\ObservacoesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditObservacoes extends EditRecord
{
    protected static string $resource = ObservacoesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
