<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Patient;
use App\Models\Farmacy;
use App\Models\Doctor;
use App\Models\MedicalRecord;
use App\Models\Room;

class RekamMedisOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Pasien', Patient::count()),
            Stat::make('Total Obat', Farmacy::count()),
            Stat::make('Total Dokter', Doctor::count()),
            Stat::make('Total Rekam Medis', MedicalRecord::count()),
            Stat::make('Total Kamar', Room::count()),
        ];
    }
}
