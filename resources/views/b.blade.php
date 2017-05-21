@extends('layouts.app')
@section('content')

    <div class="row">
         <div class="col-lg-12">
             <div class="tabs-container">
                     <ul class="nav nav-tabs">
                         <li class="active"><a data-toggle="tab" href="#tab-1">Driver Details</a></li>
                     </ul>
                     <div class="tab-content">

                       <!-- Start of first tab -->
                         <div id="tab-1" class="tab-pane active">
                             <div class="panel-body">

                                 <form class="form-horizontal" action="{{ action ('DriversController@update' , $driver->id) }}" method="POST" enctype="multipart/form-data">

                                   {{ csrf_field() }}
                                   {{ method_field('PATCH') }}

                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                           <strong>Profile Image:</strong><br>
                                               <input type="file" name="gambar_profile" id="gambar_profile" class="hide">
                                                   <label for="gambar_profile" style="width: 500px">
                                                       <img class="image-placeholder" id="gambar_profile_img" src="{{ asset("$driver->gambar_profile") }}" width="50%"/>
                                                   </label>
                                        </div>
                                    </div>

                                   <div class="form-group"><label class="col-sm-2 control-label">License No</label>
                                       <div class="col-sm-10">
                                           <input type="text" class="form-control" name="noLesen" required value="{{ $driver->noLesen }}"></input>
                                       </div>
                                   </div>

                                   <div class="form-group"><label class="col-sm-2 control-label">License Expiry Date</label>
                                       <div class="col-sm-10">
                                           <input type="date" class="form-control" name="lesen_luput" value="{{ $driver->lesen_luput }}"></input>
                                       </div>
                                   </div>

                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                           <strong>License Image:</strong><br>
                                               <input type="file" name="gambar_lesen" id="gambar_lesen" class="hide">
                                                   <label for="gambar_lesen" style="width: 500px">
                                                       <img class="image-placeholder" id="gambar_lesen_img" src="{{ asset("$driver->gambar_lesen") }}" width="50%"/>
                                                   </label>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group"><label class="col-sm-2 control-label">License Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="gambar_lesen" src="{{ $driver->gambar_lesen }}"></input>
                                        </div>
                                    </div> --}}

                                   <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                           <strong>IC Image:</strong><br>
                                               <input type="file" name="gambar_ic" id="gambar_ic" class="hide">
                                                   <label for="gambar_ic" style="width: 500px">
                                                       <img class="image-placeholder" id="gambar_ic_img" src="{{ asset("$driver->gambar_ic") }}" width="50%"/>
                                                   </label>
                                        </div>
                                    </div>

                                    {{-- <div class="form-group"><label class="col-sm-2 control-label">IC Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control" name="gambar_ic" src="{{ $driver->gambar_ic }}"></input>
                                        </div>
                                    </div> --}}

                                   <div class="form-group"><label class="col-sm-2 control-label">Car Plat No</label>
                                       <div class="col-sm-10">
                                           <input type="text" class="form-control" name="no_plat" value="{{ $driver->no_plat }}"></input>
                                       </div>
                                   </div>

                                   <div class="form-group"><label class="col-sm-2 control-label">Car Type</label>
                                       <div class="col-sm-10">
                                           <input type="text" class="form-control" name="jenis_kereta" value="{{ $driver->jenis_kereta }}"></input>
                                       </div>
                                   </div>

                                   <div class="form-group"><label class="col-sm-2 control-label">Road Tax Expiry Date</label>
                                       <div class="col-sm-10">
                                           <input type="date" class="form-control" name="roadtax_luput" value="{{ $driver->roadtax_luput }}"></input>
                                       </div>
                                   </div>

                                   <div class="form-group"><label class="col-sm-2 control-label">Telephone No</label>
                                       <div class="col-sm-10">
                                           <input type="text" class="form-control" name="noTel" placeholder="" value="{{ old('address', $driver->user->noTel) }}"></input>
                                       </div>
                                   </div>

                                   <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                                       <div class="col-sm-10">
                                           <input type="email" class="form-control" name="email" placeholder="" value="{{ old('address', $driver->user->email) }}"></input>
                                       </div>
                                   </div>

                                   <div class="form-group"><label class="col-sm-2 control-label">Address</label>
                                       <div class="col-sm-10">
                                           <input type="text" class="form-control" name="address" placeholder="" value="{{ old('address', $driver->user->address) }}"></input>
                                       </div>
                                   </div>

                                   {{-- <div class="form-group"><label class="col-sm-2 control-label">Faculty</label>
                                       <div class="col-sm-10">
                                           <select id="faculty" type="text" class="form-control" name="seat" required autofocus>
                                             <option value="{{ $driver->user->faculty }}" selected="">{{ $driver->user->faculty }}</option>
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
                                     </div>
                                   </div> --}}


                                    <div class="form-group">
                                     <label class="col-md-2 control-label"></label>
                                     <div class="col-md-4">
                                         <button type="submit" class="btn btn-primary">Save</button>
                                         {{-- <a href="{{ url('/offer/create') }}" class="btn btn-info pull-right" role="button" type="submit">Offer</a> --}}
                                     </div>
                                 </div>

                                </form>

                          </div>
                      </div>
                    <!-- End of first tab -->

                  </div>
              </div>
          </div>
      </div>

  @endsection

  @section('script')
@endsection
