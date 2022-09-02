<?php

namespace App\Exports;

use App\Models\Booking;
use Illuminate\Contracts\View\View;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class BookingsExport implements FromView, ShouldAutoSize
{

    protected $from;
    protected $to;

    public function __construct($from = 0, $to = 0)
    {
        $this->from = $from;
        $this->to = $to;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        if($this->from == 0 && $this->to == 0) {
            $data['bookings'] = Booking::all();
        } else {
            $data['bookings'] = Booking::whereBetween('created_at', [$this->from, $this->to])->get();
        }
        return view('admin.exports.bookings', $data);
    }
}
