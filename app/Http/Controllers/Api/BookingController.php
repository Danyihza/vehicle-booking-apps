<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function getActivity()
    {
        $bookings = Booking::select('id_vehicle', DB::raw('count(*) as total'))->groupBy('id_vehicle')->with('hasVehicle')->get();
        // return $bookings;
        $vehicle = $bookings->map(function ($value) {
            return $value->hasVehicle->name;
        });
        $count = $bookings->map(function ($value) {
            return $value->total;
        });

        
        return response()->json([
            'success' => true,
            'data' => [
                'vehicle' => $vehicle,
                'count' => $count
            ]
        ]);
    }
}
