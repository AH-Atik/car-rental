@include('layouts.customer-header')

<div class="container">
    <div class="row justify-content-center">

        <h3 class="text-center text-primary m-3">Search Cars</h3>

        <div class="container mb-3">
            <div class="row ">
                <form class="d-flex col-4 w-100" role="search">
                    <input class="form-control me-3" name="search" type="search" placeholder="Search by Car Name, Brand, Model, Car Type, Menufacture Year, Daily Rent Price"
                        aria-label="Search">
                    <button class="btn btn-success col-3" type="submit">Search</button>
                </form>
            </div>
        </div>



<h3 class="text-center text-primary m-3">Book a Car</h3>
        <div class="container text-center">
            <div class="row">
                @foreach ($cars as $car)
                    <div class="col py-3">
                        <div class="card" style="width: 18rem;">
                            <img style="height: 180px;" src="{{ $car->image }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <p class="card-title">Car Name : {{ $car->name }}</p>
                                <p class="card-title">Car Brand : {{ $car->brand }}</p>
                                <p class="card-title">Car Model : {{ $car->model }}</p>
                                <p class="card-text">Car Type : {{ $car->car_type }}</p>
                                <p class="card-text">Daily Rent Price : {{ $car->daily_rent_price }}</p>
                                <p class="card-text">Year of Manufacture : {{ $car->year }}</p>

                                @if($car->availability == 1)
                                    <p class="card-text">Car Status : Available</p>
                                @else
                                    <p class="card-text text-danger">Car Status : Not Available</p>

                                @endif
                                @if($car->availability == 1)
                                    <a href="{{ url('book-car/' . $car->id) }}"><button type="submit"
                                            class="btn btn-primary">Book
                                            Now</button></a>
                                @else
                                    <a href="#" class="btn btn-danger disabled">Not Available</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </body>

        </html>