@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h2><strong>Booking Details</strong></h2>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <form class="form-horizontal" action="{{ action('BooksController@store', $book->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

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
                                <h4><i class="glyphicon glyphicon-map-marker"></i> {{$book->pickup_loc}} -> {{ $book->destination}}</h4>
                                <h4><i class="glyphicon glyphicon-calendar"></i> {{ $book->date}}</h4>
                                <h4><i class="glyphicon glyphicon-time"></i> {{ $book->time}}</h4>
                                <h4><i class="glyphicon glyphicon-usd"></i> RM {{  number_format($book->price, '2', '.', '') }}</h4>
                                <h4><i class="glyphicon glyphicon-list-alt"></i> {{ $book->info}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Driver Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3 col-lg-3 " align="center"> <img src="{{ asset($book->driver->gambar_profile) }}" class="img-circle img-responsive" style="max-height:150px"> </div>
                            <div class=" col-md-9 col-lg-9 ">
                                <h3>{{$book->user->name}}, {{ $book->user->gender}}</h3>
                                <h4><i class="glyphicon glyphicon-user"></i> {{ $book->user->matricNo}}</h4>
                                <h4><i class="glyphicon glyphicon-phone"></i> {{ $book->user->noTel}}</h4>
                                <h4><i class="glyphicon glyphicon-envelope"></i> {{ $book->user->email}}</h4>
                                <h4><i class="glyphicon glyphicon-education"></i> {{ $book->user->faculty}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
                <div class="panel panel-info" >
                    <div class="panel-heading">
                        <h3 class="panel-title">Review For {{$book->driver->user->name}}</h3>
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
        </div>      <!--open left-->

        <div class="col-sm-6 col-md-6">     <!--open right-->
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
                <div class="panel panel-info" style="margin-top:10px">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contact Person Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class=" col-md-12 col-lg-12 ">
                                <label>Name</label>
                                {!! Form::text('nama_waris', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-md-12 col-lg-12 ">
                                <label>Tel No</label>
                                {!! Form::text('tel_waris', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-md-12 col-lg-12 ">
                                <label>Email</label>
                                {!! Form::email('email_waris', null, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-0 toppad" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Booking Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class=" col-md-12 col-lg-12 ">
                                <label>Drop Off Location</label>
                                {!! Form::textarea('drop_off', null, array('class' => 'form-control', 'rows' => 3, 'cols' => 40)) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class=" col-md-12 col-lg-12 ">
                                <label>Notification Frequency</label>
                                {{ Form::select('kekerapan_notifikasi', ['Please Select' => 'Please Select','15' => 'For every 15 minutes', '30' => 'For every 30 minutes', '45' => 'For every 45 minutes','60' => 'For every 60 minutes'], null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-10 col-sm-10">
                      <button type="submit" class="btn btn-success" style="font-weight: bold">Save</button>
                      <input type="hidden" name="status_book" value="Accept">
                      <input type="hidden" name="status_sah" value="Confirm">
                    </div>
                </div>

            </div>
        </div>  <!--close right-->

        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
