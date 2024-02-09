<?php

namespace App\Filament\Resources;

use App\Filament\Fields\Money;
use App\Filament\Resources\HistoricoPagamentoResource\Pages;
use App\Filament\Resources\HistoricoPagamentoResource\RelationManagers;
use App\Models\Cargo;
use Filament\Forms\Components\Select;
use App\Models\HistoricoPagamento;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HistoricoPagamentoResource extends Resource
{
    protected static ?string $model = HistoricoPagamento::class;

    protected static ?int $navigationSort = 3;
    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationLabel ="Histórico de Pagamentos";
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DatePicker::make('data_de_pagamento')
                    ->label("Data do Pagamento")
                    ->required(),

                Money::make('valor_do_salario')
                    ->label("Salario")
                    ->required(),

                Select::make('pessoa_id')
                    ->label('Colaborador')
                    ->placeholder("Selecione um Colaborador")
                    ->relationship('pessoa')
                    ->required(),

                TextInput::make('cargo_colaborador_data')
                    ->label("Cargo")
                    ->required()
                    ->disabled(fn (string $operation): bool => $operation=='edit'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pessoa.nome')
                    ->label("Colaborador"),

                TextColumn::make('valor_do_salario')
                    ->label("Salario")
                    ->money('BRL'),

                TextColumn::make('data_de_pagamento')
                    ->label("Data do Pagamento")
                    ->date('d/m/Y')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('cargo_colaborador_data')
                    ->label("Cargo")
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListHistoricoPagamentos::route('/'),
            'create' => Pages\CreateHistoricoPagamento::route('/create'),
            'edit' => Pages\EditHistoricoPagamento::route('/{record}/edit'),
        ];
    }
}
