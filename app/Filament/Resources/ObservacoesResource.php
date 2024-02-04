<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ObservacoesResource\Pages;
use App\Filament\Resources\ObservacoesResource\RelationManagers;
use App\Models\Observacoes;
use App\Models\Pessoa;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ObservacoesResource extends Resource
{
    protected static ?string $model = Observacoes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('pessoa_id')
                    ->label('Colaborador')
                    ->placeholder("Selecione um Colaborador")
                    ->options(Pessoa::all()->pluck('nome','id'))
                    ->searchable(),
                RichEditor::make('anotacao')->label("Observação")->placeholder("Digite aqui as observações desejadas")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('Pessoa.nome')->label("Nome Colaborador"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListObservacoes::route('/'),
            'create' => Pages\CreateObservacoes::route('/create'),
            'edit' => Pages\EditObservacoes::route('/{record}/edit'),
        ];
    }
}
