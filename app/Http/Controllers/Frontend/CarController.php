<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;

class CarController extends Controller {

    public function index() {
        $rentals = Rental::all();
        return view( 'car.custom-dashboard', [ 'rentals' => $rentals ] );
    }

    function cancelStatus( $id ) {
        $rental = Rental::find( $id );
        $rental->status = 'Canceled';
        $rental->save();
        return redirect()->back()->with( 'success', 'Status updated to Canceled.' );
    }


}
