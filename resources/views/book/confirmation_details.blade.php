@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Ride Confirmation</h2>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <form class="form-horizontal" action="{{ action('BooksController@update2', $book->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
          <div class="col-sm-6 col-md-6">
            <h2>RIDE DETAILS</h2>
            <h4>Date: {{$book->offer->date}}</h4>
            <h4>Time: {{$book->offer->time}}</h4>
            <h4>Destination: {{$book->offer->destination}}</h4>
            <h4>Price: {{$book->offer->price}}</h4>
            <h4>Pickup Location: {{$book->offer->pickup_loc}}</h4>
            <h4>Additional Info: {{$book->offer->info}}</h4>

          </div>
          <div class="col-sm-6 col-md-6">
              <h2>DRIVER DETAILS</h2>
              <h4>Matric No: {{$book->driver->user->matricNo}}</h4>
              <h4>Name: {{$book->driver->user->name}}</h4>
              <h4>Gender: {{$book->driver->user->gender}}</h4>
              <h4>Telephone No: {{$book->driver->user->noTel}}</h4>
              <h4>Email: {{$book->driver->user->email}}</h4>
              <h4>Faculty: {{$book->driver->user->faculty}}</h4>
              <h4>Address: {{$book->driver->user->address}}</h4>


          </div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10">
                  <a href="{{action('BooksController@payment', $book->id)}}" id="status_sah" name="status_sah" value="Confirm" type="submit" style="width:15%" class="btn btn-success" >Pay Now</a>
                  <button id="status_sah" name="status_sah" value="Cancel" type="submit" style="width:15%" class="btn btn-danger" >Cancel</button>
                </div>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/warning.js') }}"></script>
  @endsection
