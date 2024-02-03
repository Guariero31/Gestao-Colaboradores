<?php

namespace App\Filament\Resources;

use App\Filament\Fields\Money;
use App\Filament\Resources\MudancasFuncaoProgramadaResource\Pages;
use App\Filament\Resources\MudancasFuncaoProgramadaResource\RelationManagers;
use App\Models\Cargo;
use App\Models\MudancasFuncaoProgramada;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MudancasFuncaoProgramadaResource extends Resource
{
    protected static ?string $model = MudancasFuncaoProgramada::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('date_of_birth')::make('data_troca')->label("Data da Troca de cargo")->required(),
                TextInput::make('status')->label("Status")->disabled(),
                Select::make('cargo_id')
                    ->label('Cargos')
                    ->placeholder("Selecione um cargo")
                    ->options(Cargo::all()->pluck('nome_do_cargo','id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pessoa.nome')->label("Nome Colaborador"),
                TextColumn::make('data_troca')->label("Data da Troca")->date(),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pendente' => 'warning',
                        'Concluido' => 'success',
                    })
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
            'index' => Pages\ListMudancasFuncaoProgramadas::route('/'),
            'create' => Pages\CreateMudancasFuncaoProgramada::route('/create'),
            'edit' => Pages\EditMudancasFuncaoProgramada::route('/{record}/edit'),
        ];
    }
}
