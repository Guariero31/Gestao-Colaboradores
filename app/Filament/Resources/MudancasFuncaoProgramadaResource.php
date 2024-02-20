<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MudancasFuncaoProgramadaResource\Pages;
use App\Models\Cargo;
use App\Models\MudancasFuncaoProgramada;
use App\Models\Pessoa;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Filters\Filter;

class MudancasFuncaoProgramadaResource extends Resource
{

    protected static ?string $model = MudancasFuncaoProgramada::class;

    protected static ?int $navigationSort = 4;
    protected static ?string $navigationIcon = 'heroicon-o-arrows-right-left';
    protected static ?string $navigationLabel ="Alterações de Cargo Agendadas";
    protected static ?string $label = "Alterações de Cargo Agendadas";
    protected static ?string $slug = 'alterações-cargo-agendadas';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('data_troca')
                    ->label("Data da Troca de cargo")
                    ->required(),

                Select::make('pessoa_id')
                    ->label('Colaborador')
                    ->placeholder("Selecione um colaborador")
                    ->relationship('pessoa', 'nome')
                    ->required(),

                Select::make('novo_cargo_id')
                    ->label('Novo Cargo')
                    ->placeholder("Selecione um cargo")
                    ->relationship('cargo', 'nome_do_cargo')
                    ->required(),

                TextInput::make('status')
                    ->label("Status")
                    ->hidden(fn (string $operation): bool => $operation=='create')
                    ->disabled(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('pessoa.nome')->label("Nome Colaborador"),
                TextColumn::make('data_troca')->label("Data da Troca")->date('d/m/Y')->searchable()->sortable(),
                TextColumn::make('status')->searchable()->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Pendente' => 'warning',
                        'Concluido' => 'success',
                    })
            ])
            ->filters([

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
