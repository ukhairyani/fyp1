@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2><strong>Validate Your Matric Number</strong></h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" action="{{ action('StudentsController@store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('matricNo') ? ' has-error' : '' }}">
                        <label for="matricNo" class="col-md-4 control-label">Matric No</label>

                        <div class="col-md-6">
                            <input id="matricNo" type="text" class="form-control" name="matricNo" value="{{ old('matricNo') }}" required autofocus>

                            @if ($errors->has('matricNo'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('matricNo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-10">
                            <button type="submit" class="btn btn-primary" style="font-weight: bold; width:150px">Validate</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
