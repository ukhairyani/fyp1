@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2><strong>Offer Ride</strong></h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" action="{{ action('OfferController@store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div style="color:#ff0000; font-size:16px">
                        NOTE: All fields are mandatory.
                    </div>

                    <br>

                    <div class="form-group">
                        <label for="date" class="col-md-4 control-label">Date</label>
                            <div class="col-md-6">
                                {!! Form::date('date', null, array('placeholder' => 'Ride date','class' => 'form-control')) !!}
                            </div>
                    </div>

                    <div class="form-group">
                        <label for="time" class="col-md-4 control-label">Time</label>
                            <div class="col-md-6">
                                {!! Form::time('time', null, array('placeholder' => 'Ride time','class' => 'form-control')) !!}
                            </div>
                    </div>

                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state" class="col-md-4 control-label">Destination</label>

                        <div class="col-md-6">
                            <select class="form-control" name="state" id="states" required>
                                <option value="0" disabled selected>Select State</option>
                                @foreach($states as $state )
                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('district') ? ' has-error' : '' }}">
                      <label class="col-md-4 control-label"></label>

                          <div class="col-md-6">
                              <select class="form-control" name="district" id="district" required>
                                  <option value="0" disabled selected>Select District</option>
                              </select>
                              @if ($errors->has('district'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('district') }}</strong>
                                  </span>
                              @endif
                          </div>
                    </div>

                    <div class="form-group{{ $errors->has('est_duration') ? ' has-error' : '' }}">
                        <label for="est_duration" class="col-md-4 control-label">Estimate Duration</label>

                        <div class="form-field">
                            <div class="form-field">
                                <div class="col-md-2">
                                    <input id="est_duration_hour" type="number" min="0" class="form-control" name="est_duration_hour" value="{{ old('est_duration_hour') }}" required autofocus placeholder="Hour">
                                </div>
                                <div><label for="est_duration_hour" class="col-md-1 control-label" style="text-align:left">Hour</label></div>
                            </div>

                            <div class="form-field">
                                <div class="col-md-2">
                                    <input id="est_duration" type="number" min="0" max="59" class="form-control" name="est_duration" value="{{ old('est_duration') }}" required autofocus placeholder="Minute">
                                </div>
                                <div><label for="est_duration" class="col-md-1 control-label" style="text-align:left">Minute</label></div>
                            </div>

                                @if ($errors->has('est_duration_hour'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('est_duration_hour') }}</strong>
                                    </span>
                                @endif
                                @if ($errors->has('est_duration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('est_duration') }}</strong>
                                    </span>
                                @endif

                        </div>
                    </div>

                        <div class="form-group">
                            <label for="price" class="col-md-4 control-label">Price (RM)</label>
                                <div class="col-md-6">
                                    {!! Form::text('price', null, array('placeholder' => 'Per passenger','class' => 'form-control')) !!}
                                </div>
                        </div>

                    <div class="form-group{{ $errors->has('seat') ? ' has-error' : '' }}">
                        <label for="seat" class="col-md-4 control-label">No of Seat</label>

                        <div class="col-md-3">
                            <select id="seat" type="text" class="form-control" name="seat" required autofocus>
                              <option value="0" disabled selected>Please Select</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                            </select>

                            @if ($errors->has('seat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('seat') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pickup_loc') ? ' has-error' : '' }}">
                        <label for="pickup_loc" class="col-md-4 control-label">Pickup Location</label>

                        <div class="col-md-6">
                            <input id="pickup_loc" type="text" class="form-control" name="pickup_loc" value="{{ old('pickup_loc') }}" required autofocus placeholder="Pickup Location">

                            @if ($errors->has('pickup_loc'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pickup_loc') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('info') ? ' has-error' : '' }}">
                        <label for="info" class="col-md-4 control-label">Additional Info</label>

                        <div class="col-md-6">
                            <textarea id="info" rows="4" cols="5" type="text" class="form-control" name="info" value="{{ old('info') }}" required autofocus placeholder="Say something to your passenger"></textarea>

                            @if ($errors->has('info'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('info') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pickup_loc') ? ' has-error' : '' }}">
                        <label for="pickup_loc" class="col-md-4 control-label">Do you want to accept instant booking?*</label>

                        <div class="col-md-6">
                            <input id="instant" type="radio" name="instant" value="Yes" required > Yes
                            <br>
                            <input id="instant" type="radio" name="instant" value="No" required > No

                            @if ($errors->has('pickup_loc'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('pickup_loc') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                <div style="color:#ff0000; font-size:12px">
                    *Accept instant booking means you automatically accept booking request from passenger.
                </div>
                <div style="color:#ff0000; font-size:12px">
                      This feature only valid when passenger books ride a day before the ride date.
                </div>

                    <br>

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-10">
                            <button type="submit" class="btn btn-success" style="font-weight: bold; width:150px">Save</button>
                            <a href="{{ action('OfferController@index') }}" class="btn btn-danger" style="font-weight: bold; width:150px">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
