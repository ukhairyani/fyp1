<?php
namespace App\Http\Controllers;
use App\User;
use App\Driver;
use App\State;
use App\Commentp;
use Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class DriversController extends Controller
{

    public function index()
    {
        $drivers = Driver::where('user_id',Auth::user()->id)->get();
        $current = Carbon::now();

        // if($drivers->first()->noLesen == "" || $drivers->first()->lesen_luput <= $current || $drivers->first()->roadtax_luput <= $current){
            return view ('driver.driver', compact('drivers'));
        // }

        // return view('offer.create')->with('states', $states);

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
        $driver = Driver::where('user_id', $id)->first();

        return view('profile_driver', compact('driver'));
    }


    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('driver.edit', compact('driver'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->input());
        $this->validate($request, [
            // 'gambar_profile' => 'required',
            'noLesen' => 'required',
            'lesen_luput' => 'required',
            // 'gambar_lesen' => 'required',
            // 'gambar_ic' => 'required',
            'no_plat' => 'required',
            'jenis_kereta' => 'required',
            'roadtax_luput' => 'required',

        ]);

        $user = User::findOrFail($id);
        $driver = Driver::where('user_id', $id)->first();


        if ($request->hasFile('gambar_profile'))
        {
           $this->validate($request, [
              'gambar_profile' => 'required|image'
          ]);
           $gambar_profile = 'images/profile/profile_image_' . time() . $driver->id . '.' . $request->gambar_profile->getClientOriginalExtension();

            $request->gambar_profile->move(public_path('images/profile'),$gambar_profile);
            $driver->gambar_profile = $gambar_profile;
        }

        if ($request->hasFile('gambar_lesen'))
        {
           $this->validate($request, [
              'gambar_lesen' => 'required|image'
          ]);
           $gambar_lesen = 'images/license/license_image_' . time() . $driver->id . '.' . $request->gambar_lesen->getClientOriginalExtension();

            $request->gambar_lesen->move(public_path('images/license'),$gambar_lesen);
            $driver->gambar_lesen = $gambar_lesen;
        }

        if ($request->hasFile('gambar_ic'))
       {
           $this->validate($request, [
              'gambar_ic' => 'required|image'
          ]);
           $gambar_ic = 'images/ic/ic_image_' . time() . $driver->id . '.' . $request->gambar_ic->getClientOriginalExtension();

            $request->gambar_ic->move(public_path('images/ic'),$gambar_ic);
            $driver->gambar_ic = $gambar_ic;
        }

        $driver->noLesen = $request->noLesen;
        $driver->lesen_luput = $request->lesen_luput;
        $driver->no_plat = $request->no_plat;
        $driver->jenis_kereta = $request->jenis_kereta;
        $driver->roadtax_luput = $request->roadtax_luput;

        $user->noTel = $request->noTel;
        $user->email= $request->email;
        $user->address = $request->address;

        $current = Carbon::now();
        if($request->lesen_luput<=$current || $request->roadtax_luput<=$current){
            return redirect()->action('DriversController@edit', $id)->withErrors('License or road tax expiry date is invalid');
        }

        $driver->save();
        $user->save();

        return redirect()->action('OfferController@create')->withMessage('Driver account has successfully updated');
    }

    public function destroy($id)
    {
        //
    }

    public function showPassenger($id)
    {
        //
        $user = User::where('id', $id)->first();

        return view('profile_passenger', compact('user'));
    }
}
