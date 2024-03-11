<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FarmacyResource\Pages;
use App\Filament\Resources\FarmacyResource\RelationManagers;
use App\Models\Farmacy;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FarmacyResource extends Resource
{
    protected static ?string $model = Farmacy::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nama Obat')
                    ->required()
                    ->placeholder('Masukan Nama Obat'),
                TextInput::make('description')
                    ->label('Description')
                    ->required()
                    ->placeholder('Masukan Deskripsi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Obat')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Deskripsi')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListFarmacies::route('/'),
            'create' => Pages\CreateFarmacy::route('/create'),
            'edit' => Pages\EditFarmacy::route('/{record}/edit'),
        ];
    }
}
