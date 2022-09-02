<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;
    protected $table = 'approval_bookings';
    protected $fillable = [
        'id_booking',
        'signed_by',
        'status',
        'signed_at'
    ];

    public function hasBooking()
    {
        return $this->belongsTo(Booking::class, 'id_booking');
    }
}
