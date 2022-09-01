<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DVehicle extends Model
{
    use HasFactory;
    protected $table = 'detail_vehicles';
    protected $fillable = [
        'id_booking',
        'signed_by',
        'status',
        'signed_at'
    ];
}
