<?php

namespace App\Http\Controllers\Admin;

use App\Exports\BookingsExport;
use App\Http\Controllers\Controller;
use App\Models\Approval;
use App\Models\Booking;
use App\Models\Pool;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

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
        return view('admin.bookings', $data);
    }

    public function post(Request $request)
    {
        $newBook = new Booking;
        $newBook->id_vehicle = $request->vehicle;
        $newBook->id_pool = $request->pool;
        $newBook->driver = $request->driver;
        $newBook->save();

        Log::info("New booking data has been succesfully added= id: {$newBook->id}");
        return back()->with('success', 'Data has been successfully submited');
    }

    public function approval(Request $request)
    {
        $newApproval = new Approval;
        $newApproval->id_booking = $request->id_booking;
        $newApproval->signed_by = session('id');
        $newApproval->status = $request->status;
        $newApproval->signed_at = now();
        $newApproval->save();

        Log::info("New approval data has been succesfully added= id: {$newApproval->id}, status: {$newApproval->status}");
        return back()->with('success', 'Approval done!');
    }

    public function exportToExcel(Request $request)
    {
        $from = $request->start ? date('Y-m-d', strtotime($request->start)) : 0;
        $to = $request->end ? date('Y-m-d', strtotime($request->end)) : 0;
        // dd($from);
        Log::info("Excel report has been generated");
        return Excel::download(new BookingsExport($from, $to), 'bookings.xlsx');
    }
}
