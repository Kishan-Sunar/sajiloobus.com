<?php

namespace App\Http\Controllers;

use App\Enums\BookingStatus;
use App\Http\Resources\BookedSeatResource;
use App\Http\Resources\BookingResource;
use App\Models\BookedSeat;
use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // get booking by passenger
    public function getBookingByPassenger(int $id)
    {
        $booking =  Booking::where('booked_by', $id)->with(['bookedSeats', 'passenger', 'passenger.user', 'schedule.bus', 'schedule.bus.busType', 'schedule.bus.busPhoto', 'schedule.origin', 'schedule.destination', 'schedule.routePoint', 'schedule.routePoint.location'])->get()->sortByDesc('created_at');
        return (new BookingResource($booking))->additional(['status' => 200]);
    }

    public function getBookingByOperator(int $id)
    {
        $bookings = Booking::whereHas('schedule.bus', function ($query) use ($id) {
            $query->where('operator_id', $id);
        })
            ->with(['bookedSeats', 'passenger', 'passenger.user', 'schedule.bus', 'schedule.bus.busType', 'schedule.bus.busPhoto', 'schedule.origin', 'schedule.destination', 'schedule.routePoint', 'schedule.routePoint.location'])
            ->orderByDesc('created_at')
            ->get();

        return (new BookingResource($bookings))->additional(['status' => 200]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $requestData['payment_date'] = now();

        $booking = Booking::create($requestData);

        $selectedSeats = $request->input('selected_seats');
        $seatStatus = $request->input('seat_status');
        $scheduleId = $request->input('schedule_id');

        $bookedSeats = [];
        foreach ($selectedSeats as $seatData) {
            $bookedSeat = new BookedSeat([
                'schedule_id' => $scheduleId,
                'seat_no' => $seatData,
                'status' => $seatStatus,
            ]);
            $bookedSeats[] = $bookedSeat;
        }

        $booking->bookedSeats()->saveMany($bookedSeats);
        return response()->json(['data' => 'added successfully'], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // change status
    public function changeStatus(int $id, string $status)
    {
        $booking = Booking::find($id);
        $booking->payment_status = $status;
        $booking->save();
        return response()->json(['data' => 'updated successfully'], 200);
    }

    public function getAllPaymentHistoryByPassenger(int $id)
    {
        $history = Booking::where('booked_by', $id)->with(['passenger', 'passenger.user', 'schedule.bus'])->where('payment_status', 'paid')->get();
        return (new BookingResource($history))->additional(['status' => 200]);
    }

    public function isSeatBooked(int $schedule_id)
    {
        $bookedSeat = BookedSeat::where('schedule_id', $schedule_id)->get();
        return (new BookedSeatResource($bookedSeat))->additional(['status' => 200]);
    }

    public function cancelByPassenger(int $id)
    {
        $booking = Booking::find($id);
        $booking->status = BookingStatus::CANCELLED_BY_CUSTOMER;
        $booking->save();
        return response()->json(['data' => 'deleted successfully'], 200);
    }

    // give discount amount as booking
    public function checkBookingLimit(int $passenger_id)
    {
        $bookings = Booking::where('booked_by', $passenger_id)->get();
        $count = $bookings->count();
        return response()->json(['data' => $count], 200);
    }
}
