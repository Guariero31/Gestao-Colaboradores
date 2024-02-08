<?php

namespace App\Filament\Resources;


use App\Filament\Resources\PessoaResource\Pages;
use App\Filament\Resources\PessoaResource\RelationManagers;
use App\Filament\Resources\PessoaResource\RelationManagers\ObservacoesRelationManager;
use App\Models\Cargo;
use App\Models\Pessoa;
use Filament\Forms\Components\Select;
use Leandrocfe\FilamentPtbrFormFields\PhoneNumber;
use Filament\Tables\Filters\SelectFilter;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Leandrocfe\FilamentPtbrFormFields\Document;

class PessoaResource extends Resource
{
    protected static ?string $model = Pessoa::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationLabel ="Colaboradores";
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Split::make([
                    Forms\Components\Section::make([
                        TextInput::make('nome')->label("Colaborador")
                            ->required()
                            ->disabled(fn (string $operation): bool => $operation=='edit'),

                        PhoneNumber::make('telefone')->label("Telefone")
                            ->required(),

                        Document::make('cpf')->label("CPF")
                            ->required()
                            ->dynamic()
                            ->disabled(fn (string $operation): bool => $operation=='edit'),

                        Select::make('cargo_id')
                            ->label('Cargo')
                            ->placeholder("Selecione um cargo")
                            ->options(Cargo::all()->pluck('nome_do_cargo','id'))
                            ->searchable()
                            ->disabled(fn (string $operation): bool => $operation=='edit')
                            ->required(),
                    ])->grow()->columns(2),

                    Forms\Components\Section::make([
                        FileUpload::make('foto_perfil')->label("Foto de Perfil")->alignCenter()->avatar(),
                    ])->grow(false),
                ])->from('lg')
            ])->columns(1);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')->label("Colaborador")->searchable()->sortable(),
                TextColumn::make('telefone')->label("Telefone"),
                TextColumn::make('cpf')->label("CPF"),
                TextColumn::make("cargo.nome_do_cargo")->label("Cargo")->searchable()->sortable()
            ])
            ->filters([
                SelectFilter::make('cargo')
                    ->relationship('cargo',"nome_do_cargo")
                    ->label("Filtrar por Cargo")
                    ->indicator("Cargo"),
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
            RelationManagers\ObservacoesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPessoas::route('/'),
            'create' => Pages\CreatePessoa::route('/create'),
            'edit' => Pages\EditPessoa::route('/{record}/edit'),
        ];
    }
}
