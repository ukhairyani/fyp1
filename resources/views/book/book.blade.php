@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')
<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Details</h2>
  </div>
  <div class="panel-body">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
            <form class="form-horizontal" action="{{ action('BooksController@store', $book->id) }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

          <div class="col-sm-6 col-md-6">
            <div class="col-sm-6 col-md-6">
                <h2>Driver Details</h2>
              <h3>{{$book->user->name}}, {{ $book->user->gender}}</h3>
              <h4><i class="glyphicon glyphicon-user"></i> {{ $book->user->matricNo}}</h4>
              <h4><i class="glyphicon glyphicon-phone"></i> {{ $book->user->noTel}}</h4>
              <h4><i class="glyphicon glyphicon-envelope"></i> {{ $book->user->email}}</h4>
              <h4><i class="glyphicon glyphicon-education"></i> {{ $book->user->faculty}}</h4>
          </div>
          <div class="col-sm-6 col-md-6">
              <h2>Ride Details</h2>
              <h3>{{$book->pickup_loc}} -> {{ $book->destination}}</h3>
              <h4><i class="glyphicon glyphicon-calendar"></i> {{ $book->date}}</h4>
              <h4><i class="glyphicon glyphicon-time"></i> {{ $book->time}}</h4>
              <h4><i class="glyphicon glyphicon-list-alt"></i> {{ $book->info}}</h4>
          </div>
          <div class="col-sm-6 col-md-12">
              <h2>Review for {{$book->driver->user->name}}</h2>
              @foreach ($comments as $comment)
                  <h2>{{ $comment->title }}</h2>
                  <h4>{{ $comment->feedback }}</h4>
                  <h4>{{ $comment->created_at->diffForHumans() }}</h4>
              @endforeach
              <div class="col-sm-offset-5">
                  {{ $comments->links() }}
              </div>
          </div>
          </div>

          <div class="col-sm-6 col-md-6">
          <div class="col-sm-6 col-md-12">
              <h2>Contact Person Details</h2>
              <div class="form-group{{ $errors->has('nama_waris') ? ' has-error' : '' }}">
                  <label for="nama_waris" class="col-md-4 control-label">Name</label>

                  <div class="col-md-6">
                      <input id="nama_waris" type="text" class="form-control" name="nama_waris" value="{{ old('nama_waris') }}" required autofocus>

                      @if ($errors->has('nama_waris'))
                          <span class="help-block">
                              <strong>{{ $errors->first('nama_waris') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('tel_waris') ? ' has-error' : '' }}">
                  <label for="tel_waris" class="col-md-4 control-label">Tel No</label>

                  <div class="col-md-6">
                      <input id="tel_waris" type="text" class="form-control" name="tel_waris" value="{{ old('tel_waris') }}" required autofocus>

                      @if ($errors->has('tel_waris'))
                          <span class="help-block">
                              <strong>{{ $errors->first('tel_waris') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

              <div class="form-group{{ $errors->has('email_waris') ? ' has-error' : '' }}">
                  <label for="email_waris" class="col-md-4 control-label">Email</label>

                  <div class="col-md-6">
                      <input id="email_waris" type="email" class="form-control" name="email_waris" value="{{ old('email_waris') }}" required autofocus>

                      @if ($errors->has('email_waris'))
                          <span class="help-block">
                              <strong>{{ $errors->first('email_waris') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
          </div>

              <div class="col-sm-6 col-md-12">
                  <h2>Booking Details</h2>

                  <div class="form-group{{ $errors->has('drop_off') ? ' has-error' : '' }}">
                      <label for="address" class="col-md-4 control-label">Drop Off Point</label>

                      <div class="col-md-6">
                          <textarea id="drop_off" rows="4" cols="5" type="text" class="form-control" name="drop_off" value="{{ old('drop_off') }}" required autofocus></textarea>

                          @if ($errors->has('drop_off'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('drop_off') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

              <div class="form-group{{ $errors->has('kekerapan_notifikasi') ? ' has-error' : '' }}">
                  <label for="kekerapan_notifikasi" class="col-md-4 control-label">Notification Frequency</label>

                  <div class="col-md-6">
                      <select id="kekerapan_notifikasi" type="text" class="form-control" name="kekerapan_notifikasi" required autofocus>
                        <option value="0" disabled selected>Please Select</option>
                        <option value="15">For every 15 minutes</option>
                        <option value="30">For every 30 minutes</option>
                        <option value="45">For every 45 minutes</option>
                        <option value="60">For every 60 minutes</option>
                      </select>

                      @if ($errors->has('kekerapan_notifikasi'))
                          <span class="help-block">
                              <strong>{{ $errors->first('kekerapan_notifikasi') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>

          </div>
      </div>



            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-10">
                  <button type="submit" class="btn btn-success">Save</button>
                  <input type="hidden" name="status_book" value="Accept">
                  <input type="hidden" name="status_sah" value="Confirm">

                </div>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
