<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farmacy extends Model
{
    use HasFactory;

    protected $table = 'farmacies';

    protected $fillable = [
        'name',
        'description',
    ];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
