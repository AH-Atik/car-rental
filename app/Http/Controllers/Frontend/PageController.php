<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;

class PageController extends Controller
{
    function carList()
    {
        $cars = Car::all();
        return view('car.dashboard', ['cars' => $cars]);
    }
}
