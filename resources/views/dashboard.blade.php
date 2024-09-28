@include('layouts.admin-header')

@foreach($cars as $car)
    @foreach($rentals as $rental)

    @endforeach
@endforeach


<div class="container">
    <div class="row justify-content-center">

        <h3 class="text-center py-3 text-primary">Rentals Overview</h3>
        <table class="table table-bordered table-hover container">
            <thead>
                <tr>
                    <th scope="col">Rental ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Car Name</th>
                    <th scope="col">Car Brand</th>
                    <th scope="col">Rental Start Date</th>
                    <th scope="col">Rental End Date</th>
                    <th scope="col">Total Cost</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>


            @foreach($rentals as $rental)


                <tbody>
                    <tr>
                        <td>{{ $rental->id }}</td>
                        <td>{{ App\Models\User::find($rental->user_id)->name }}</td>
                        <td>{{ $car->name }}</td>
                        <td>{{ $car->brand }}</td>
                        <td>{{\Carbon\Carbon::parse($rental->start_date)->diffForHumans()}}</td>
                        <td>{{\Carbon\Carbon::parse($car->end_date)->diffForHumans()}}</td>
                        <td>{{ $rental->total_cost }}</td>
                        <td>{{ $rental->status }}</td>
                        <td>
                            @if($rental->status == 'Ongoing')
                                <a href=" {{ url('complete-booking/' . $rental->id) }} "><button type="submit"
                                        class="btn btn-primary">Mark as Completed</button></a>
                            @elseif ($rental->status == 'Canceled')
                                <button type="submit" class="btn btn-danger" disabled>Canceled </button></a>
                            @elseif ($rental->status == 'Completed')
                                <button type="submit" class="btn btn-success" disabled>Completed </button></a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            @endforeach


        </table>

        <div class="row justify-content-center">
            <h3 class="text-center py-3 text-primary">Dashboard Overview</h3>
            <div class="col mx-2 p-5 border border-primary rounded">
                <p class="text-center fw-bold h5 fst-italic text-primary">Total number of cars: {{ $cars->count() }}
                </p>
            </div>
            <div class="col mx-2 p-5 border border-primary rounded">
                <p class="text-center fw-bold h5 fst-italic text-primary">Number of available cars:
                    {{ $cars->where('availability', '1')->count() }}
                </p>
            </div>
            <div class="col mx-2 p-5 border border-primary rounded">
                <p class="text-center fw-bold h5 fst-italic text-primary">Total number of rentals:
                    {{ $rentals->count() }}
                </p>
            </div>
            <div class="col mx-2 p-5 border border-primary rounded">
                <p class="text-center fw-bold h5 fst-italic text-primary">Total earnings from rentals:
                    {{ $rentals->where('status', 'Completed')->sum('total_cost') }}
                </p>
            </div>
        </div>
        </body>

        </html>