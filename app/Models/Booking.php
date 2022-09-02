<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    protected $fillable = [
        'id_vehicle',
        'id_pool',
        'driver',
        'start_time',
        'end_time'
    ];

    public function hasApproval()
    {
        return $this->hasMany(Approval::class, 'id_booking');
    }

    public function hasVehicle()
    {
        return $this->belongsTo(Vehicle::class, 'id_vehicle');
    }
}
