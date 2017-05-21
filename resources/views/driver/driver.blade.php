@extends('layouts.app')
@section('content')

     <div class="panel panel-default">
         <div class="panel-heading">
             <h2><strong>Update Driver Account</strong></h2>
         </div>
         <div class="panel-body">
         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
             <div class="panel panel-info" style="margin-top:50px">
                 <div class="panel-heading">
                     <h3 class="panel-title">{{ Auth::user()->name }}, {{ Auth::user()->gender }}<p class="pull-right">{{ Auth::user()->created_at }}</p></h3>
                 </div>
                 <div class="panel-body">
                     <div class="row">

                         @foreach ($drivers as $driver)

                        <div class="col-md-3 col-lg-3 " align="center"> <img src="{{ asset("$driver->gambar_profile") }}" class="img-circle img-responsive" style="max-height:150px"> </div>
                        <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                          <tbody>
                            <tr>
                              <td>License No </td>
                              <td>{{ $driver->noLesen }}</td>
                            </tr>
                            <tr>
                              <td>License Expiry Date </td>
                              <td>{{ $driver->lesen_luput }}</td>
                            </tr>
                            <tr>
                              <td>License Image </td>
                              <td><div class="col-md-3 col-lg-3" align="center"> <img src="{{ asset("$driver->gambar_lesen") }}" style="max-height:130px"> </div></td></td>
                            </tr>
                            <tr>
                              <td>IC Image </td>
                              <td><div class="col-md-3 col-lg-3" align="center"> <img src="{{ asset("$driver->gambar_ic") }}" style="max-height:130px"> </div></td>
                            </tr>
                            <tr>
                              <td> Car Plat No </td>
                              <td>{{ $driver->no_plat }}</td>
                            </tr>
                            <tr>
                              <td>Car Type </td>
                              <td>{{ $driver->jenis_kereta }}</td>
                            </tr>
                            <tr>
                              <td>Road Tax Expiry Date </td>
                              <td>{{ $driver->roadtax_luput }}</td>
                            </tr>
                            <tr>
                              <td>Telephone No </td>
                              <td>{{ $driver->user->noTel }}</td>
                            </tr>
                            <tr>
                              <td>Email </td>
                              <td>{{ $driver->user->email }}</td>
                            </tr>
                            <tr>
                              <td>Address </td>
                              <td>{{ $driver->user->address }}</td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>

                    </div>
                    </div>

                    <div class="col-sm-offset-4 col-sm-10">

                    <a href="{{ action ('DriversController@edit', $driver->user_id) }}" class="btn btn-primary">Update</a>

                    <a href="{{ action ('OfferController@index') }}" type="button" class="btn btn-danger"><i class="fa fa-times"></i>Cancel</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
