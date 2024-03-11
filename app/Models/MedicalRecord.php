<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $table = 'medical_records';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'room_id',
        'farmacy_id',
        'diagnose',
        'complaint',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function farmacy()
    {
        return $this->belongsTo(Farmacy::class);
    }
}
