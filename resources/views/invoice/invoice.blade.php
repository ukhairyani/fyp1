@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h2><strong>New Booking</strong></h2>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <form class="form-horizontal" action="{{ action('BooksController@update2', $book->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="col-sm-6 col-md-6">     <!--open left-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
                        <div class="panel panel-info" style="margin-top:10px">
                            <div class="panel-heading">
                                <h3 class="panel-title">Ride Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center"> <img src="{{ url("images/background/car.png") }}" class="img-circle img-responsive" style="max-height:150px"> </div>
                                    <div class=" col-md-9 col-lg-9 ">
                                        <h4><i class="glyphicon glyphicon-map-marker"></i> {{$book->offer->pickup_loc}} -> {{$book->offer->destination}}</h4>
                                        <h4><i class="glyphicon glyphicon-calendar"></i> {{$book->offer->date}}</h4>
                                        <h4><i class="glyphicon glyphicon-time"></i> {{$book->offer->time}}</h4>
                                        <h4><i class="glyphicon glyphicon-record"></i> {{$book->offer->pickup_loc}}</h4>
                                        <h4><i class="glyphicon glyphicon-list-alt"></i> {{ $book->offer->info}}</h4>
                                        <h4>Price: RM {{  number_format($book->offer->price, '2', '.', '') }}</h4>
                                        <h4 style="color: #32CD32	">Deposit: {{$book->status_sah}} RM{{$book->deposit}}</h4>
                                        <h4 style="color: #FF0000">Balance: RM{{$book->offer->price - $book->deposit}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      <!--close left-->

                <div class="col-sm-6 col-md-6">     <!--open right-->
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
                        <div class="panel panel-info" style="margin-top:10px">
                            <div class="panel-heading">
                                <h3 class="panel-title">Driver Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center"> <img src="{{ asset($book->driver->gambar_profile) }}" class="img-circle img-responsive" style="max-height:150px"> </div>
                                    <div class=" col-md-9 col-lg-9 ">
                                        <h3>{{$book->driver->user->name}}, {{$book->driver->user->gender}}</h3>
                                        <h4><i class="glyphicon glyphicon-user"></i> {{$book->driver->user->matricNo}}</h4>
                                        <h4><i class="glyphicon glyphicon-phone"></i> {{$book->driver->user->noTel}}</h4>
                                        <h4><i class="glyphicon glyphicon-envelope"></i> {{$book->driver->user->email}}</h4>
                                        <h4><i class="glyphicon glyphicon-education"></i> {{$book->driver->user->faculty}}</h4>
                                        <h4><i class="glyphicon glyphicon-home"></i> {{$book->driver->user->address}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>      <!--close right-->

            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-10">
                  <a href="{{ url('pdf/resit', $book->id) }}" target="_blank" class="btn btn-success" style="font-weight: bold; width:200px">Download Receipt</a>
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
