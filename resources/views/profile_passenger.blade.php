@include('modal.destroy-modal')
@extends('layouts.app')
@section('content')

     <div class="container">
         <div class="row">

             <br>
         </div>

         <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
             <div class="panel panel-info" style="margin-top:50px">
                 <div class="panel-heading">
                     <h3 class="panel-title">{{ $user->name }}, {{ $user->gender }}<p class="pull-right">{{ $user->created_at }}</p></h3>
                 </div>
                 <div class="panel-body">
                     <div class="row">
                         <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive"> </div>
                         <div class=" col-md-9 col-lg-9 ">
                        <table class="table table-user-information">
                          <tbody>

                            <tr>
                              <td>Matric No </td>
                              <td>{{ $user->matricNo }}</td>
                            </tr>
                            <tr>
                              <td>Telephone No </td>
                              <td>{{ $user->noTel }}</td>
                            </tr>
                            <tr>
                              <td>Email </td>
                              <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                              <td>Address </td>
                              <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                              <td>Faculty </td>
                              <td>{{ $user->faculty }}</td>
                            </tr>


                            <tr><td>


                            </td></tr>


                        </tbody>
                    </table>

                        </div>
                    </div>
                </div>


                <div class="panel-footer">
                    {{-- @if($driver->user_id != Auth::user()->id) --}}
                        <a href="{{ action ('CommentpsController@index', $user->id) }}" class="btn btn-success">Leave Comment</a>
                        <a href="{{ url('home') }}" type="button" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Exit</a>

                    {{-- @endif --}}
                </div>
                <div class="panel-footer">
                </div>



            </div>
        </div>
    </div>

@endsection
