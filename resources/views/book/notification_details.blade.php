@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h2><strong>Booking Confirmation</strong></h2>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <form class="form-horizontal" action="{{ action('BooksController@update', $book->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="col-sm-6 col-md-6">     <!--open left-->

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
                        <div class="panel panel-info" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Passenger Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center"> <img src="{{ asset($book->user->driver->gambar_profile) }}" class="img-circle img-responsive" style="max-height:150px"> </div>
                                    <div class=" col-md-9 col-lg-9 ">
                                        <h3>{{$book->user->name}}, {{ $book->user->gender}}</h3>
                                        <h4><i class="glyphicon glyphicon-user"></i> {{ $book->user->matricNo}}</h4>
                                        <h4><i class="glyphicon glyphicon-phone"></i> {{ $book->user->noTel}}</h4>
                                        <h4><i class="glyphicon glyphicon-envelope"></i> {{ $book->user->email}}</h4>
                                        <h4><i class="glyphicon glyphicon-education"></i> {{ $book->user->faculty}}</h4>
                                        <h4><i class="glyphicon glyphicon-home"></i> {{$book->user->address}}</h4>
                                        <h4><i class="glyphicon glyphicon-heart"></i> {{$book->nama_waris}}</h4>
                                        <h4><i class="glyphicon glyphicon-phone-alt"></i> {{$book->tel_waris}}</h4>
                                        <h4><i class="glyphicon glyphicon-inbox"></i> {{$book->email_waris}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
                        <div class="panel panel-info" >
                            <div class="panel-heading">
                                <h3 class="panel-title">Review For {{$book->user->name}}</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class=" col-md-9 col-lg-9 ">
                                        @foreach ($comments as $comment)
                                            <h2>{{ $comment->title }}</h2>
                                            <h4>{{ $comment->feedback }}</h4>
                                            <h5>{{ $comment->created_at->diffForHumans() }}</h5>
                                        @endforeach
                                        <div class="col-sm-offset-5">
                                            {{ $comments->links() }}
                                        </div>
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
                                <h3 class="panel-title">Ride Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3 col-lg-3 " align="center"> <img src="{{ url("images/background/car.png") }}" class="img-circle img-responsive" style="max-height:150px"> </div>
                                    <div class=" col-md-9 col-lg-9 ">
                                        <h4><i class="glyphicon glyphicon-map-marker"></i> {{$book->offer->pickup_loc}} -> {{$book->offer->destination}}</h4>
                                        <h4><i class="glyphicon glyphicon-calendar"></i> {{$book->offer->date}}</h4>
                                        <h4><i class="glyphicon glyphicon-time"></i> {{$book->offer->time}}</h4>
                                        <h4><i class="glyphicon glyphicon-usd"></i> RM {{  number_format($book->offer->price, '2', '.', '') }}</h4>
                                        <h4><i class="glyphicon glyphicon-list-alt"></i> {{ $book->offer->info}}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>  <!--close right-->

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10">
                    <button id="status_book" name="status_book" value="Accept" type="submit" style="width:15%" class="btn btn-success" >Accept</button>
                    <button id="status_book" name="status_book" value="Reject" type="submit" style="width:15%" class="btn btn-danger" >Reject</button>
                    <input type="hidden" name="status_sah" value="Invalid">


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
