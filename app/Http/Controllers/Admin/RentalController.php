<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;

class RentalController extends Controller {
    function manageRental() {
        if ( auth()->user()->role == 'admin' ) {
            $rentals = Rental::all();
            return view( 'car.manage-rental', [ 'rentals' => $rentals ] );
        }
        else{
            return redirect()->back()->with('error', 'You Have No Permission To Access This Page');
        }

    }

    function statusCompleted($id){
        $rental = Rental::find($id);
        $rental->status = 'Completed';
        $rental->save();
        return redirect()->back()->with('success', 'Status updated to Completed.');
    }
}
