<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'specialist',
        'address',
        'phone'
    ];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }
}
