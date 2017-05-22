@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2><strong>Edit Offer</strong></h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" action="{{ action('OfferController@update', $offer->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div style="color:#ff0000; font-size:16px">
                        NOTE: All fields are mandatory.
                    </div>

                    <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                        <label for="date" class="col-md-4 control-label">Date</label>

                        <div class="col-md-6">
                            <input id="date" type="date" class="form-control" name="date" value="{{ $offer->date }}" required autofocus>

                            @if ($errors->has('date'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                        <label for="time" class="col-md-4 control-label">Time</label>

                        <div class="col-md-6">
                            <input id="time" type="time" class="form-control" name="time" value="{{ $offer->time }}" required autofocus>

                            @if ($errors->has('time'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('time') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state" class="col-md-4 control-label">Destination</label>

                        <div class="col-md-6">
                            <select class="form-control input-sm" name="state" id="states" required>
                                @foreach($states as $state )
                                    {{-- <option value="{{ $state->id }}" selected="">{{ $state->id }}</option> --}}
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
                              <select class="form-control input-sm" name="district" id="district" required>
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
                                    <input id="est_duration_hour" type="number" min="0" class="form-control" name="est_duration_hour" value="{{ floor($offer->est_duration/60) }}" required autofocus>
                                </div>
                                <div><label for="est_duration_hour" class="col-md-1 control-label" style="text-align:left">Hour</label></div>
                            </div>

                            <div class="form-field">
                                <div class="col-md-2">
                                    <input id="est_duration" type="number" min="0" max="59" class="form-control" name="est_duration" value="{{ $offer->est_duration%60 }}" required autofocus>
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

                    <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                        <label for="price" class="col-md-4 control-label">Price (RM/passenger)</label>

                        <div class="col-md-3">
                            <input id="price" type="text" class="form-control" name="price" value="{{ $offer->price }}" required autofocus>

                            @if ($errors->has('price'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('price') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('seat') ? ' has-error' : '' }}">
                        <label for="seat" class="col-md-4 control-label">No of Seat</label>

                        <div class="col-md-3">
                            <select id="seat" type="text" class="form-control" name="seat" required autofocus>
                              <option value="{{ $offer->seat }}" selected="">{{ $offer->seat }}</option>
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
                            <input id="pickup_loc" type="text" class="form-control" name="pickup_loc" value="{{ $offer->pickup_loc }}" required autofocus>

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
                            <textarea id="info" rows="4" cols="5" type="text" class="form-control" name="info" required autofocus>{{ $offer->info }}</textarea>

                            @if ($errors->has('info'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('info') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('pickup_loc') ? ' has-error' : '' }}">
                        <label for="pickup_loc" class="col-md-4 control-label">Do you want to accept instant booking?</label>

                        <div class="col-md-6">
                            <input id="instant" type="radio" name="instant" value="Yes" <?php echo ($offer->instant == 'Yes') ?  "checked" : "" ;  ?>/ required > Yes
                            <br>
                            <input id="instant" type="radio" name="instant" value="No" <?php echo ($offer->instant == 'No') ?  "checked" : "" ;  ?>/ required > No

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
