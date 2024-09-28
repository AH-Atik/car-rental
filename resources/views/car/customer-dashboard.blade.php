@include('layouts.customer-header')

<div class="container">

    <div class="row justify-content-center">
        <h3 class="text-center py-3 text-primary">Customer Dashboard</h3>
        <div class="col mx-2 p-2 border border-primary rounded">
            <a href="{{ url('display-cars') }}" class="nav-link active text-primary fw-bold"> <button class="btn btn-primary w-100 btn-lg">Browse Cars</button></a>
        </div>
    </div>
    <h3 class="text-center pt-5 pb-3 text-primary">Booking List | Manage Booking</h3>
    <table class="table table-bordered table-hover container">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Total Cost</th>
                <th scope="col">Booking Status</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach($rentals as $rental)
        <tbody>
            <tr>
                <td>{{ $rental->user_id }}</td>
                <td>{{ $rental->start_date }}</td>
                <td>{{ $rental->end_date }}</td>
                <td>{{ $rental->total_cost }}</td>
                <td>{{ $rental->status }}</td>
                @if($rental->status == 'Ongoing')
                <td><a href=" {{ url('cancel-booking/'.$rental->id) }} "><button type="submit" class="btn btn-primary">Cancel Boking</button></a></td>
                @elseif ($rental->status == 'Completed')
                <td><button type="submit" class="btn btn-success" disabled>Completed </button></a></td>
                @elseif ($rental->status == 'Canceled')
                <td><button type="submit" class="btn btn-danger" disabled>Canceled </button></a></td>
                @endif

            </tr>
        </tbody>
        @endforeach
    </table>
</div>
</body>

</html>
