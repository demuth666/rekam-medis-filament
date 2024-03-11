<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MedicalRecordResource\Pages;
use App\Filament\Resources\MedicalRecordResource\RelationManagers;
use App\Models\MedicalRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MedicalRecordResource extends Resource
{
    protected static ?string $model = MedicalRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('patient_id')
                    ->label('Pasien')
                    ->relationship('patient', 'name')
                    ->searchable('name')
                    ->preload()
                    ->required()
                    ->placeholder('Pilih Pasien'),
                Select::make('doctor_id')
                    ->label('Doctor')
                    ->relationship('doctor', 'name')
                    ->searchable('name')
                    ->preload()
                    ->required()
                    ->placeholder('Pilih Dokter'),
                Select::make('room_id')
                    ->label('Ruangan')
                    ->relationship('room', 'name')
                    ->searchable('name')
                    ->preload()
                    ->required()
                    ->placeholder('Pilih Ruangan'),
                Select::make('farmacy_id')
                    ->label('Farmasi')
                    ->relationship('farmacy', 'name')
                    ->searchable('name')
                    ->preload()
                    ->required()
                    ->placeholder('Pilih Obat'),
                Textarea::make('complaint')
                    ->label('Keluhan')
                    ->required()
                    ->placeholder('Masukan Keluhan'),
                Textarea::make('diagnose')
                    ->label('Diagnosa')
                    ->required()
                    ->placeholder('Masukan Diagnosa'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('patient.name')
                    ->label('Pasien')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('doctor.name')
                    ->label('Dokter')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('room.name')
                    ->label('Ruangan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('farmacy.name')
                    ->label('Farmasi')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('complaint')
                    ->label('Keluhan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('diagnose')
                    ->label('Diagnosa')
                    ->searchable()
                    ->sortable()
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
            'index' => Pages\ListMedicalRecords::route('/'),
            'create' => Pages\CreateMedicalRecord::route('/create'),
            'edit' => Pages\EditMedicalRecord::route('/{record}/edit'),
        ];
    }
}
