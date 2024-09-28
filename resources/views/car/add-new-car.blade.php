@include('layouts.admin-header')

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card mt-5">
          <div class="card-body">
            <h3 class="text-center text-primary">Add a New Car</h3>
            <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="carName">Car Name</label>
                <input type="text" name="name" value='{{ old('name') }}' class="form-control mb-3" id="carName"
                  placeholder="Enter Car Name">
                  @if($errors->has('name'))
                    @foreach($errors->get('name') as $error)
                    <p class="text-danger">{{ $error}}</p>
                     @endforeach
                 @endif
              </div>
              <div class="form-group">
                <label for="carBrand">Brand</label>
                <input type="text" name="brand" value="{{ old('brand') }}" class="form-control mb-3" id="carBrand"
                  placeholder="Enter Brand Name">
                  @if($errors->has('brand'))
                    @foreach($errors->get('brand') as $error)
                    <p class="text-danger">{{ $error}}</p>
                     @endforeach
                 @endif
              </div>
              <div class="form-group">
                <label for="carModel">Car Model</label>
                <input type="text" name="model" value="{{ old('model') }}" class="form-control mb-3" id="carModel"
                  placeholder="Enter Car Model">
                  @if($errors->has('model'))
                    @foreach($errors->get('model') as $error)
                    <p class="text-danger">{{ $error}}</p>
                     @endforeach
                 @endif
              </div>
              <div class="form-group">
                <label for="manufactureYear">Year of Manufacture</label>
                <input type="text" name="year" value="{{ old('year') }}" class="form-control mb-3"
                  id="manufactureYear" placeholder="Enter Manufacture Year">
                  @if($errors->has('year'))
                    @foreach($errors->get('year') as $error)
                    <p class="text-danger">{{ $error}}</p>
                     @endforeach
                 @endif
              </div>
              <div class="form-group">
                <label for="name">Car Type</label>
                <input type="text" name="car_type" value="{{ old('car_type') }}" class="form-control mb-3" id="carType"
                  placeholder="Enter Car Type">
                  @if($errors->has('car_type'))
                    @foreach($errors->get('car_type') as $error)
                    <p class="text-danger">{{ $error}}</p>
                     @endforeach
                 @endif
              </div>
              <div class="form-group">
                <label for="name">Daily Rent Price</label>
                <input type="text" name="daily_rent_price" value="{{ old('daily_rent_price') }}" class="form-control mb-3" id="rentPrice"
                  placeholder="Enter Daily Rent Price">
                  @if($errors->has('daily_rent_price'))
                    @foreach($errors->get('daily_rent_price') as $error)
                    <p class="text-danger">{{ $error}}</p>
                     @endforeach
                 @endif
              </div>
              <div class="form-group">
                <label for="name">Choose Image</label>
                <input type="file" name="image" class="form-control mb-3" id="image" placeholder="Choose Image">
                @if($errors->has('image'))
                    @foreach($errors->get('image') as $error)
                    <p class="text-danger">{{ $error}}</p>
                     @endforeach
                 @endif
              </div>
              <button type="submit" class="btn btn-primary w-100">Store Data</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
