<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Approval;
use App\Models\Booking;
use App\Models\Pool;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $start = date('Y-m-d', strtotime($request->start));
        $end = date('Y-m-d', strtotime($request->end));
        $data['pools'] = Pool::all();
        $data['vehicles'] = Vehicle::all();
        if(isset($request->start) || isset($request->end)) {
            $data['bookings'] = Booking::whereBetween('created_at', [$start, $end])->get();
        } else {
            $data['bookings'] = Booking::all();
        }
        return view('user.bookings', $data);
    }

    public function approval(Request $request)
    {
        $newApproval = new Approval;
        $newApproval->id_booking = $request->id_booking;
        $newApproval->signed_by = session('id');
        $newApproval->status = $request->status;
        $newApproval->signed_at = now();
        $newApproval->save();

        return back()->with('success', 'Approval done!');
    }
}
