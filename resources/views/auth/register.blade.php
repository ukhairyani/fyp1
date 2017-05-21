@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
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

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('noIc') ? ' has-error' : '' }}">
                            <label for="noIc" class="col-md-4 control-label">IC No</label>

                            <div class="col-md-6">
                                <input id="noIc" type="text" class="form-control" name="noIc" value="{{ old('noIc') }}" required autofocus>

                                @if ($errors->has('noIc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('noIc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('noTel') ? ' has-error' : '' }}">
                            <label for="noTel" class="col-md-4 control-label">Telephone No</label>

                            <div class="col-md-6">
                                <input id="noTel" type="text" class="form-control" name="noTel" value="{{ old('noTel') }}" required autofocus>

                                @if ($errors->has('noTel'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('noTel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <input id="gender" type="radio" name="gender" value="Male" required > Male
                                <br>
                                <input id="gender" type="radio" name="gender" value="Female" required > Female

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <textarea id="address" rows="4" cols="5" type="text" class="form-control" name="address" value="{{ old('address') }}" required autofocus></textarea>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('faculty') ? ' has-error' : '' }}">
                            <label for="faculty" class="col-md-4 control-label">Faculty</label>

                            <div class="col-md-6">
                                <select id="faculty" type="text" class="form-control" name="faculty" required autofocus>
                                  <option value="0" disabled selected>Please Select</option>
                                  <option value="FSSK">Faculty of Social Sciences and Humanities</option>
                                  <option value="FST">Faculty of Science and Technology</option>
                                  <option value="FEP">Faculty of Economics and Management</option>
                                  <option value="FFARMASI">Faculty of Pharmacy</option>
                                  <option value="FPI">Faculty of Islamic Studies</option>
                                  <option value="FSK">Faculty of Health Sciences</option>
                                  <option value="FKAB">Faculty of Engineering and Built Environment</option>
                                  <option value="FUU">Faculty of Law</option>
                                  <option value="FPERGIGIAN">Faculty of Dentistry</option>
                                  <option value="FPEND">Faculty of Education</option>
                                  <option value="FPERUBATAN">Faculty of Medicine</option>
                                  <option value="FTSM">Faculty of Information Science and Technology</option>
                                </select>
                                @if ($errors->has('faculty'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('faculty') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
