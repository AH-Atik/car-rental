@include('layouts.admin-header')
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-body">
                        <h3 class="text-center text-primary">Update Car Details</h3>
                        @if(session()->has('success'))
                        <h4 class="text-success text-center mb-3">{{ session('success') }}</h4>
                        @endif
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="carName">Car Name</label>
                                <input type="text" name="name" value='{{ $car->name }}' class="form-control mb-3" id="carName">
                                @if($errors->has('name'))
                                @foreach($errors->get('name') as $error)
                                <p class="text-danger">{{ $error}}</p>
                                @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="carName">Car Brand</label>
                                <input type="text" name="brand" value='{{ $car->brand }}' class="form-control mb-3" id="carName">
                                @if($errors->has('brand'))
                                @foreach($errors->get('brand') as $error)
                                <p class="text-danger">{{ $error}}</p>
                                @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="carName">Car Model</label>
                                <input type="text" name="model" value='{{ $car->model }}' class="form-control mb-3" id="carName">
                                @if($errors->has('model'))
                                @foreach($errors->get('model') as $error)
                                <p class="text-danger">{{ $error}}</p>
                                @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="carName">Menufacture Year</label>
                                <input type="text" name="year" value='{{ $car->year }}' class="form-control mb-3" id="carName">
                                @if($errors->has('year'))
                                @foreach($errors->get('year') as $error)
                                <p class="text-danger">{{ $error}}</p>
                                @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="carName">Car Type</label>
                                <input type="text" name="car_type" value='{{ $car->car_type }}' class="form-control mb-3" id="carName">
                                @if($errors->has('car_type'))
                                @foreach($errors->get('car_type') as $error)
                                <p class="text-danger">{{ $error}}</p>
                                @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="carName">Car Rent Price</label>
                                <input type="text" name="daily_rent_price" value='{{ $car->daily_rent_price }}' class="form-control mb-3" id="carName">
                                @if($errors->has('daily_rent_price'))
                                @foreach($errors->get('daily_rent_price') as $error)
                                <p class="text-danger">{{ $error}}</p>
                                @endforeach
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="carName">Car Availability</label>
                                <input type="text" name="availability" value='{{ $car->availability }}' class="form-control mb-3" id="carName">
                                @if($errors->has('availability'))
                                @foreach($errors->get('availability') as $error)
                                <p class="text-danger">{{ $error}}</p>
                                @endforeach
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary mt-3 w-100">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
