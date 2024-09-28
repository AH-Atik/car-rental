<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\RentalController as AdminRentalController;
use App\Http\Controllers\Frontend\RentalController;
use App\Http\Controllers\Frontend\CarController as FrontendCarController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [CarController::class, 'dashboardOverview'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




Route::get('/add-new-car', [CarController::class, 'addNewCar'])->middleware(['auth', 'verified']);


Route::get('/display-cars', [CarController::class, 'searchData'])->middleware(['auth', 'verified']);
Route::get('/display-cars', [CarController::class, 'index'])->middleware(['auth', 'verified']);


Route::get('/car-list', [CarController::class, 'carList'])->middleware(['auth', 'verified']);
Route::get('/car-edit/{car}', [CarController::class, 'carEdit'])->middleware(['auth', 'verified']);
Route::put('/car-edit/{car}', [CarController::class, 'carUpdate'])->middleware(['auth', 'verified']);
Route::delete('/car-edit/{car}', [CarController::class, 'carDelete'])->name('car.destroy')->middleware(['auth', 'verified']);
Route::get('/customer-dashboard', [RentalController::class, 'customerDashboard'])->middleware(['auth', 'verified']);
Route::get('/customer-dashboard', [RentalController::class, 'showBookings'])->middleware(['auth', 'verified']);


Route::get('/complete-booking/{id}', [AdminRentalController::class, 'statusCompleted'])->middleware(['auth', 'verified']);
Route::get('/cancel-booking/{id}', [FrontendCarController::class, 'cancelStatus'])->name('item.cancel')->middleware(['auth', 'verified']);
Route::get('/manage-rental', [AdminRentalController::class, 'manageRental'])->middleware(['auth', 'verified']);


Route::get('/book-car/{car}', [RentalController::class, 'bookCar'])->middleware(['auth', 'verified']);

//Post Controller
Route::post('/addCar', [CarController::class, 'addCar'])->name('cars.store')->middleware(['auth', 'verified']);

Route::post('/book-car', [RentalController::class, 'storeCar'])->name('rentals.store')->middleware(['auth', 'verified']);
Route::post('/confirm-rental', [RentalController::class, 'confirmRental'])->name('confirm-rental')->middleware(['auth', 'verified']);




require __DIR__ . '/auth.php';
