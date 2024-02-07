<?php

namespace App\Filament\Resources;

use App\Filament\Fields\Money;
use App\Filament\Resources\CargoResource\Pages;
use App\Models\Cargo;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\RawJs;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;


class CargoResource extends Resource
{
    protected static ?string $navigationLabel ="Cargos";
    protected static ?string $model = Cargo::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome_do_cargo')
                    ->label("Nome do Cargo")
                    ->minLength(2)
                    ->maxLength(25)
                    ->required()
                    ->disabled(fn (string $operation): bool => $operation=='edit'),
                Money::make('valor_do_salario')
                    ->minValue(1)
                    ->required()
                    ->label("Salario"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome_do_cargo')->label("Cargo")->searchable()->sortable(),
                TextColumn::make('valor_do_salario')->label("Salario")->money('BRL')->searchable()->sortable(),
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
            'index' => Pages\ListCargos::route('/'),
            'create' => Pages\CreateCargo::route('/create'),
            'editar' => Pages\EditCargo::route('/{record}/edit'),
        ];
    }
}
