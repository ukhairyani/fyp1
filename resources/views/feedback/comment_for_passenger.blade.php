@extends('layouts.app')
@section('content')


  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Leave review for {{ $user->name }}</h2>
    </div>
  <div class="panel-body">
    <form class="form-horizontal" action="{{ action('CommentpsController@store') }}"method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">

    <input type="hidden" name="passenger" value="{{$user->id}}">

    <div class="col-md-10">
      <label class="col-md-2 control-label">By</label>
    <div class="col-md-8">
      <label class="control-label">{{ $driver->user->name }}</label>
    </div>
    </div>


    <div class="col-md-10">
      <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}" >
      <label class="col-md-2 control-label">Title</label>
      <div class="col-md-8">
        <input class="form-control" name="title">
      </div>
    </div>
    </div>

    <div class="col-md-10">
        <div class="form-group{{ $errors->has('feedback') ? ' has-error' : '' }}" >
      <label class="col-md-2 control-label">Comment</label>
      <div class="col-md-8">
        <textarea class ="form-control" name="feedback" placeholder="Leave your comment" rows="6" value="{{ old('feedback') }}" maxlength="500"></textarea>
        <p class="text-muted">Maxmimum character is 500</p>
          @if($errors->has('feedback'))
            <span class ="help-block">
              <strong>{{ $errors ->first('feedback') }}</strong>
            </span>
          @endif
      </div>
    </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <a href="{{ url('/passenger_list') }}" class="btn btn-default">Cancel</a>
      <button type="submit" class="btn btn-success">Save</button>
    </div>
  </div>
  </div>
    </form>
      </div>
    </div>
  </div>
  </div>
@endsection
