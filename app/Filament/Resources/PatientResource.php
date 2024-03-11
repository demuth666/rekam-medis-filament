<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('id_num')
                    ->label('ID Number')
                    ->required()
                    ->unique(table: patient::class, ignoreRecord: true)
                    ->placeholder('Masukan ID Number'),
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->placeholder('Masukan Nama'),
                TextInput::make('phone')
                    ->label('Phone')
                    ->required()
                    ->placeholder('Masukan Nomor Telepon'),
                TextInput::make('address')
                    ->label('Address')
                    ->required()
                    ->placeholder('Masukan Alamat'),
                Select::make('Jenis Kelamin')
                    ->options([
                        'Laki-laki',
                        'Perempuan',
                    ])
                    ->placeholder('Pilih Jenis Kelamin')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id_num')
                    ->label('ID Number')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')
                    ->label('Phone')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('address')
                    ->label('Address')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('gender')
                    ->label('Jenis Kelamin')
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
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
