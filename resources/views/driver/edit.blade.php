@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2><strong>Update Profile</strong></h2>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-10">
                <form class="form-horizontal" action="{{ action('DriversController@update', $driver->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group{{ $errors->has('gambar_profile') ? ' has-error' : '' }}">
                        <label for="gambar_profile" class="col-md-4 control-label">Profile Image</label>

                        <div class="col-md-6">
                            <input type="file" name="gambar_profile" id="gambar_profile" class="hide">
                                <label for="gambar_profile" >
                                    <img class="image-placeholder" id="gambar_profile_img" src="{{ asset("$driver->gambar_profile") }}" style="max-height: 150px">
                                </label>
                            @if ($errors->has('gambar_profile'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gambar_profile') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('noLesen') ? ' has-error' : '' }}">
                        <label for="noLesen" class="col-md-4 control-label">License No</label>

                        <div class="col-md-6">
                            <input id="noLesen" type="text" class="form-control" name="noLesen" value="{{ $driver->noLesen }}" required autofocus>

                            @if ($errors->has('noLesen'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('noLesen') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('lesen_luput') ? ' has-error' : '' }}">
                        <label for="lesen_luput" class="col-md-4 control-label">License Expiry Date</label>

                        <div class="col-md-6">
                            <input id="lesen_luput" type="date" class="form-control" name="lesen_luput" value="{{ $driver->lesen_luput }}" required autofocus>

                            @if ($errors->has('lesen_luput'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('lesen_luput') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('gambar_lesen') ? ' has-error' : '' }}">
                        <label for="gambar_lesen" class="col-md-4 control-label">License Image</label>

                        <div class="col-md-6">
                            <input type="file" name="gambar_lesen" id="gambar_lesen" class="hide">
                                <label for="gambar_lesen" style="width: 500px">
                                    <img class="image-placeholder" id="gambar_lesen_img" src="{{ asset("$driver->gambar_lesen") }}" width="50%"/>
                                </label>
                            @if ($errors->has('gambar_lesen'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gambar_lesen') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('gambar_ic') ? ' has-error' : '' }}">
                        <label for="gambar_ic" class="col-md-4 control-label">IC Image</label>

                        <div class="col-md-6">
                            <input type="file" name="gambar_ic" id="gambar_ic" class="hide">
                                <label for="gambar_ic" style="width: 500px">
                                    <img class="image-placeholder" id="gambar_ic_img" src="{{ asset("$driver->gambar_ic") }}" width="50%"/>
                                </label>
                            @if ($errors->has('gambar_ic'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('gambar_ic') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('no_plat') ? ' has-error' : '' }}">
                        <label for="no_plat" class="col-md-4 control-label">Car Plat No</label>

                        <div class="col-md-6">
                            <input id="no_plat" type="text" class="form-control" name="no_plat" value="{{ $driver->no_plat }}" required autofocus>

                            @if ($errors->has('no_plat'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('no_plat') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('jenis_kereta') ? ' has-error' : '' }}">
                        <label for="jenis_kereta" class="col-md-4 control-label">Car Type</label>

                        <div class="col-md-6">
                            <input id="jenis_kereta" type="text" class="form-control" name="jenis_kereta" value="{{ $driver->jenis_kereta }}" required autofocus>

                            @if ($errors->has('jenis_kereta'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('jenis_kereta') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('roadtax_luput') ? ' has-error' : '' }}">
                        <label for="roadtax_luput" class="col-md-4 control-label">Road Tax Expiry Date</label>

                        <div class="col-md-6">
                            <input id="roadtax_luput" type="date" class="form-control" name="roadtax_luput" value="{{ $driver->roadtax_luput }}" required autofocus>

                            @if ($errors->has('roadtax_luput'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('roadtax_luput') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('noTel') ? ' has-error' : '' }}">
                        <label for="noTel" class="col-md-4 control-label">Telephone No</label>

                        <div class="col-md-6">
                            <input id="noTel" type="text" class="form-control" name="noTel" value="{{ $driver->user->noTel }}" required autofocus>

                            @if ($errors->has('noTel'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('noTel') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email" value="{{ $driver->user->email }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address" class="col-md-4 control-label">Address</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="form-control" name="address" value="{{ $driver->user->address }}" required autofocus>

                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                     <div class="col-sm-offset-4 col-sm-10">
                         <button type="submit" class="btn btn-success" style="font-weight: bold; width:150px">Save</button>
                     </div>
                 </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
