<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function AddBookingPost(BookingRequest $request)
    {
        $requests = $request->validated();
        $data = [
            'booking_name' => $requests['booking_name'],
            'booking_number' => $requests['booking_number'],
            'count_people' => $requests['count_people'],
            'booking_time' => $requests['booking_time'],
            'booking_date' => $requests['booking_date'],
        ];
        Booking::create($data);
        return redirect()->route('main');
    }
    public function DeleteBookingPost(Booking $booking)
    {
        $name = $booking->booking_name;
        $booking->delete();
        return back()->with(['delete_booking'=>$name]);
    }
    public function BookingView()
    {
        $bookings = booking::all();
        return view('managers.managerbooking', compact('bookings'));
    }
}
