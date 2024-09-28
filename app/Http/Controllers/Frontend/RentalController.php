<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Rental;
use Carbon\Carbon;

class RentalController extends Controller
{
    function bookCar(Request $request, $id)
    {
        $car = Car::find($id);
        return view('car.book-car', ['car' => $car]);
    }

    function customerDashboard()
    {
        return view('car.customer-dashboard');
    }

    function storeCar(Request $request)
    {
        $validation = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $start_date = Carbon::parse($request->input('start_date'));
        $end_date = Carbon::parse($request->input('end_date'));
        $difInDays = $start_date->diffInDays($end_date);
        // if ($difInDays > 0) {

        //     Rental::create([
        //         'user_id' => auth()->user()->id,
        //         'car_id' => $id,
        //         'start_date' => $request->input('start_date'),
        //         'end_date' => $request->input('end_date'),
        //         'total_cost' => $difInDays * $id->daily_rent_price,
        //     ]);
        //     return redirect('/car.customer-dashboard')->with('success', 'Order Placed Successfully');
        // } else {
        //     return redirect()->back()->with('error', 'End date should be greater than start date');
        // }
    }

    function confirmRental(Request $request)
    {
        $validation = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        $daily_rent_price = $request->input('daily_rent_price');
        $start_date = Carbon::parse($request->input('start_date'));
        $end_date = Carbon::parse($request->input('end_date'));
        $difInDays = $start_date->diffInDays($end_date);

        



        $total_cost = $difInDays * $request->input('daily_rent_price');

        if ($difInDays > 0) {
            Rental::create([
                'user_id' => auth()->user()->id,
                'car_id' => $request->input('id'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'total_cost' => $difInDays * $request->input('daily_rent_price'),
            ]);

            return redirect('/customer-dashboard')->with('success', 'Order Placed Successfully');

        } else {
            return redirect()->back()->with('error', 'End date should be greater than start date');
        }
    }

    function showBookings()
    {   
        $rentals = Rental::all()-> where('user_id', auth()->user()->id);
        return view('car.customer-dashboard', ['rentals' => $rentals]);
        // $rentals = Rental::where('id', auth()->user()->id)->get();
        // return view('car.customer-dashboard', ['rentals' => $rentals]);
    }
}
