@include('layouts.customer-header')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
                    <h3 class="text-center text-primary">Check Booking Details & Choose the Date</h3>
                    <form action="{{ route('confirm-rental') }}" method="POST">
                        @csrf
                        <div class="card">
                            <img src="{{ $car->image }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <input type="text" name="user_id" value='{{ Auth::user()->id }}' class="form-control mb-4" hidden>
                                <input type="text" name="id" value='{{ $car->id }}' class="form-control mb-4" hidden>
                                <p class="fw-bold">Car Name: {{ $car->name }}</p>
                                <input type="text" name="name" value='{{ $car->name }}' class="form-control mb-1" hidden>
                                <p class="fw-bold">Car Brand: {{ $car->brand }}</p>
                                <input type="text" name="brand" value='{{ $car->brand }}' class="form-control mb-1" hidden>
                                <p class="fw-bold">Car Model: {{ $car->model }} </p>
                                <input type="text" name="model" value='{{ $car->model }}' class="form-control mb-1" hidden>
                                <p class="fw-bold">Car Type: {{ $car->car_type }}</p>
                                <input type="text" name="car_type" value='{{ $car->car_type }}' class="form-control mb-1" hidden>
                                <p class="fw-bold">Daily Rent Price: {{ $car->daily_rent_price }}</p>
                                <input type="text" name="daily_rent_price" value='{{ $car->daily_rent_price }} ' class="form-control mb-1" hidden>
                                <p class="fw-bold">Year of Menufacture: {{ $car->year }}</p>
                                <input type="text" name="year" value='{{ $car->year }}' class="form-control mb-1" hidden>
                                <hr>
                                <label for="BoookingStart" class="text-primary">Choose Booking Start Date</label>
                                <input type="date" name="start_date" class="form-control mb-4">
                                @if($errors->has('start_date'))
                                @foreach($errors->get('start_date') as $error)
                                <p class="text-danger">{{ $error}}</p>
                                @endforeach
                                @endif
                                <label for="BoookingEnd" class="text-primary">Choose Booking End Date</label>
                                <input type="date" name="end_date" class="form-control mb-4">
                                @if($errors->has('end_date'))
                                @foreach($errors->get('end_date') as $error)
                                <p class="text-danger">{{ $error}}</p>
                                @endforeach
                                @endif

                                @if(session()->has('error'))
                                <p class="text-danger text-center mb-3">{{ session('error') }}</p>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Book Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
