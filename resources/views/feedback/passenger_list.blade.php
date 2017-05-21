@extends('layouts.app')
@section('content')

<div class="panel panel-default">
    <div class="panel-heading">
        <h2>Rate Your Passenger</h2>
    </div>

    <div class="panel-body">
        <div class="col-md-12">
            <form class="form-inline text-center" method="get" action="{{ url('catalog') }}">
                <input class="form-control" type="text" placeholder="Search your destination" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th width="10%">Matric No</th>
                                <th width="25%">Passenger Name</th>
                                <th width="10%">Ride ID</th>
                                <th width="25%">Ride</th>
                                <th width="10%">Date</th>
                                <th width="10%">Time</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody pull-{right}>
                            <?php $i = 0 ?>

                            @forelse($books as $book)
                                @if( $book->user_id != Auth::user()->id)

                                <tr>
                                    <td>{{ $books->firstItem() + $i }}</td>
                                    <td>{{ $book->user->matricNo }}</td>
                                    <td><a href="{{ action('DriversController@showPassenger', $book->user_id)}}">{{ $book->user->name }}</td>
                                    <td>{{ $book->offer->id }}</td>
                                    <td>{{ $book->offer->destination }}</td>
                                    <td>{{ $book->offer->date }}</td>
                                    <td>{{ $book->offer->time }}</td>


                                    {{-- <td><a href="{{ action('BooksController@edit', $book->id) }}" class="btn btn-info" role="button">Details</a></td> --}}


                                </tr>

                                <?php $i++ ?>
                        @endif

                            @empty
                            <tr>
                                <td colspan="6">Looks like there is no notification available.</td>
                            </tr>

                        @endforelse

                        </tbody>


                </div>
                </div>
                </div>
            </div></div>


</div>
<script src="{{ asset('js/warning.js') }}"></script>
@endsection
