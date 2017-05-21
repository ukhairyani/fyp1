@extends('layouts.app')
@section('content')


  <div class="panel panel-default">
    <div class="panel-heading">
      <h2>Leave review for {{ $driver->user->name }}</h2>
    </div>
  <div class="panel-body">
    <form class="form-horizontal" action="{{ action('CommentdsController@store') }}"method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="row">

    <input type="hidden" name="driver" value="{{$driver->id}}">

    <div class="col-md-10">
      <label class="col-md-2 control-label">By</label>
    <div class="col-md-8">
      <label class="control-label">{{ $user->name }}</label>
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
    </div>

    <div class="col-md-10">
      <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}" >
      <label class="col-md-2 control-label">Rating</label>
      <div class="col-md-8">
        {{--@for ($i=0; $i < 5; $i++)
            <span class="glyphicon glyphicon-star"></span>
        @endfor--}}

        <div class='starrr'></div>
      </div>
    </div>
    </div>


  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <a href="{{ url('/driver_list') }}" class="btn btn-default">Cancel</a>
      <button type="submit" class="btn btn-success">Save</button>
    </div>
  </div>
    </form>
      </div>
    </div>
  </div>
  </div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('.starrr').starrr({
            rating: 4
        });
    });
</script>
@endsection
