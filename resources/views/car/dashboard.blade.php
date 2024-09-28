@include('layouts.admin-header')

<div class="container">
    <h3 class="text-center p-3 text-primary">Cars List</h3>
    <table class="table table-bordered table-hover container">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Brand</th>
                <th scope="col">Model</th>
                <th scope="col">Manufacturer Year</th>
                <th scope="col">Car Type</th>
                <th scope="col">Daily Rent Price</th>
                <th scope="col">Availability</th>
                <th scope="col">Image</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        @foreach($cars as $car)
        <tbody>
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->name }}</td>
                <td>{{ $car->brand }}</td>
                <td>{{ $car->model }}</td>
                <td>{{ $car->year }}</td>
                <td>{{ $car->car_type }}</td>
                <td>{{ $car->daily_rent_price }}</td>
                <td> @if($car->availability == 1) Available @else Not Available @endif </td>
                <td><img width="100px" src="{{ $car->image }}" alt=""></td>
                <td>{{\Carbon\Carbon::parse($car->created_at)->diffForHumans()}}</td>
                <td>{{\Carbon\Carbon::parse($car->updated_at)->diffForHumans()}}</td>
                <td>
                    <a href="{{ url('car-edit/'.$car->id) }}"><button type="submit" class="btn btn-primary">Edit</button></a>
                </td>
                <td>
                    <form action="{{ route('car.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                </td>
                </form>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
</body>
</html>
