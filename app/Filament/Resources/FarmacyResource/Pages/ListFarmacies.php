<?php

namespace App\Filament\Resources\FarmacyResource\Pages;

use App\Filament\Resources\FarmacyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFarmacies extends ListRecords
{
    protected static string $resource = FarmacyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
