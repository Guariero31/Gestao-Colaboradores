<?php

namespace App\Filament\Resources\PessoaResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ObservacoesRelationManager extends RelationManager
{
    protected static string $relationship = 'Observacoes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                MarkdownEditor::make('anotacao')
                    ->label("Observação")
                    ->placeholder("Digite aqui as observações desejadas")
                    ->required()
                    ->columnSpan(4)
                    ->minLength(1),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('anotacao')
                    ->label("Observações")
                    ->words(10),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
