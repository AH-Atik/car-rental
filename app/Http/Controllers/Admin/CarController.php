<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Carbon\Carbon;
use Storage;
use Auth;

class CarController extends Controller {
    function addNewCar() {
        if ( Auth::user()->role == 'admin' ) {
            return view( 'car.add-new-car' );
        }
        else{
            return redirect()->back()->with('error', 'You Have No Permission To Access This Page');
        }

    }

    function addCar( Request $request ) {
        $validation = $request->validate( [
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'model' => 'required|max:255',
            'year' => 'required|numeric',
            'car_type' => 'required|max:255',
            'daily_rent_price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ] );

        if ( $request->has( 'image' ) ) {
            $file = $request->file( 'image' );
            $filename = $file->getClientOriginalName();
            $uploadPath = $file->storeAs( 'uploads/car', $filename, 'public' );
            $path = 'storage/' . $uploadPath;

            Car::create( [
                'name' => $request->input( 'name' ),
                'brand' => $request->input( 'brand' ),
                'model' => $request->input( 'model' ),
                'year' => $request->input( 'year' ),
                'car_type' => $request->input( 'car_type' ),
                'daily_rent_price' => $request->input( 'daily_rent_price' ),
                'image' => $path
            ] );
            return redirect( '/add-new-car' )->with( 'success', 'Car Added Successfully' );
        }
    }

    function index(Request $request) {
        $search = $request->input('search');
        if(!$search){
            $cars = Car::all();
            $carTypes = Car::distinct()->get(['car_type']);
            $carTypes = Car::distinct()->get(['car_type']);
            $brands = Car::distinct()->get(['brand']);
            return view( 'car.display-cars', [ 'cars' => $cars , 'carTypes' => $carTypes, 'brands' => $brands ] );
        }
        elseif($search){
            $cars = Car::where('daily_rent_price', '<=',  $search )->orWhere('brand', 'LIKE', '%' . $search .'%')->orWhere('car_type', 'LIKE', '%' . $search .'%')->orWhere('name', 'LIKE', '%' . $search .'%')->orWhere('model', 'LIKE', '%' . $search .'%')->orWhere('year', '=',  $search )->get();
            $carTypes = Car::distinct()->get(['car_type']);
            $brands = Car::distinct()->get(['brand']);
            return view( 'car.display-cars', [ 'cars' => $cars , 'carTypes' => $carTypes, 'brands' => $brands ] );
        }

        
    }

   

        
        // if ($request->search) {
        //     $search = $request->input('search');
        //     $cars = Car::where('brand', '=',  $search )->get();
        //     return view('car.display-cars', ['cars' => $cars]);
            
        // } 
        // else {
        //     $contacts = Rental::all();
        //     if ($request->sort_by == 'name_asc') {
        //         $rental = Rental::orderBy('name', 'asc')->get();
        //     } elseif ($request->sort_by == 'name_desc') {
        //         $rental = Rental::orderBy('name', 'desc')->get();
        //     } elseif ($request->sort_by == 'date_asc') {
        //         $rental = Rental::orderBy('created_at', 'asc')->get();
        //     } elseif ($request->sort_by == 'date_desc') {
        //         $rental = Rental::orderBy('created_at', 'desc')->get();
        //     }
        //     return view('car.display-cars', ['rentals' => $rental]);
        // }
    

    function dashboardOverview() {
        $usrs  = User::all();
        $cars = Car::all();
        $rentals = Rental::all();

        return view( 'dashboard', [ 'cars' => $cars ], [ 'rentals' => $rentals ],  [ 'users' => $usrs ] );
    }

    function carList() {
        if( Auth::user()->role == 'admin' ) {
            $cars = Car::all();
            return view( 'car.dashboard', [ 'cars' => $cars ] );
        }
        else{
            return redirect()->back()->with('error', 'You Have No Permission To Access This Page');
        }
        
    }

    function carEdit( Request $request, $id ) {
        $car = Car::find( $id );
        return view( 'car.edit-car', [ 'car' => $car ] );
    }

    function carUpdate( Request $request, $id ) {

        $validation = $request->validate( [
            'name' => 'required|max:255',
            'brand' => 'required|max:255',
            'model' => 'required|max:255',
            'year' => 'required|numeric',
            'car_type' => 'required|max:255',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|in: 0, 1',
        ] );
            $car = Car::find( $id );
            $car->name = $request->input( 'name' );
            $car->brand = $request->input( 'brand' );
            $car->model = $request->input( 'model' );
            $car->year = $request->input( 'year' );
            $car->car_type = $request->input( 'car_type' );
            $car->daily_rent_price = $request->input( 'daily_rent_price' );
            $car->availability = $request->input( 'availability' );
            $car->save();
            return redirect( '/car-list' )->with( 'success', 'Information Updated Successfully' );
    }

    function carDelete( $id ) {
        $car = Car::find( $id );
        $car->delete();
        return redirect( '/car-list' )->with( 'error', 'Deleted Successfully' );
    }

    function userLogout() {
        auth()->logout();
        return redirect( '/login' );
    }

}
