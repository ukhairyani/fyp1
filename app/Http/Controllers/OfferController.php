<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Driver;
use App\Book;
use App\State;
use App\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
use Charts;


class OfferController extends Controller
{
    public function index()
    {
        $searchResults =Input::get('search');
        $current = Carbon::now();

        $offers = Offer::where([
            ['destination','like','%'.$searchResults.'%'],
            ['date','>', $current],
            ])->paginate(4);


       return view('offer.index', compact('offers','current'));

    }

    public function ajax()
    {
      $state_id = Input::get('state_id');
      $district = District::where('state_id', '=', $state_id)->get();

      return \Response::json($district);
    }

    public function create()
    {
        $states = State::all();
        // dd($states);
        return view('offer.create')->with('states', $states);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
            'state' => 'required',
            'district' => 'required',
            // 'destination' => 'required|max:45',
            'est_duration' => 'required|max:45',
            'price' => 'required|max:10',
            'seat' => 'required|max:10',
            'pickup_loc' => 'required|max:45',
            'info' => 'required|max:455',
            'instant' => 'required|max:5',
        ]);

        $driver = Driver::findOrFail(Auth::user()->id);

        foreach ($driver->offer as $offer) {
            if($offer->date == $request->date) {
                if($offer->time == $request->time){
                    return redirect()->action('OfferController@create')->withErrors('Ride existed' )->withInput();
                }
            }
        }

        if($request->date >= $driver->lesen_luput || $request->date >= $driver->roadtax_luput){
            return redirect()->action('OfferController@create')->withErrors('Your license or road tax has expired on this date')->withInput();
        }


            $offer = new Offer;
            $offer->driver_id = $driver->id;

            $offer->date = $request->date;
            $offer->time = $request->time;
            $offer->state_id = $request->state;
            $offer->district_id = $request->district;

            $state_name = State::where('id', $request->state)->first();
            $district_name = District::where('id', $request->district)->first();
            $offer->destination = $district_name->name.$state_name->name;

            $duration_hour = $request->est_duration_hour*60;    //convert hour to minute
            $total_duration = $request->est_duration + $duration_hour;  //sum hour & min (in minute)
            $offer->est_duration = $total_duration;

            $offer->price = $request->price;
            $offer->seat = $request->seat;
            $offer->pickup_loc = $request->pickup_loc;
            $offer->info = $request->info;
            $offer->instant = $request->instant;
            $offer->user_id = Auth::user()->id;
            // dd($offer);
            $offer->save();

            return redirect()->action('OfferController@store')->withMessage("Ride from {$offer->pickup_loc} to {$offer->destination} on {$offer->date} has successfully added");

        // dd($driver->offer);

    }


    public function show(c $c)
    {
        //
    }


    public function edit($id)
    {
        $offer = Offer::findOrFail($id);
        $states = State::all();
        return view('offer.edit', compact('offer'))->with('states', $states);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
            // 'destination' => 'required',
            'est_duration' => 'required',
            'price' => 'required',
            'seat' => 'required',
            'pickup_loc' => 'required',
            'info' => 'required',
            'instant' => 'required|max:5',

        ]);

        $offer = Offer::findOrFail($id);
        $offer->date = $request->date;
        $offer->state_id = $request->state;
        $offer->district_id = $request->district;

        $state_name = State::where('id', $request->state)->first();
        $district_name = District::where('id', $request->district)->first();
        $offer->destination = $district_name->name.$state_name->name;

        $duration_hour = $request->est_duration_hour*60;    //convert hour to minute
        $total_duration = $request->est_duration + $duration_hour;  //sum hour & min (in minute)
        $offer->est_duration = $total_duration;

        $offer->price = $request->price;
        $offer->seat = $request->seat;
        $offer->pickup_loc = $request->pickup_loc;
        $offer->info = $request->info;
        $offer->instant = $request->instant;

        $offer->save();

        return redirect()->action('OfferController@index')->withMessage('Ride has successfully updated');
    }

    public function destroy($id)
    {
        $offer = Offer::findOrFail($id);
        $offer->delete();
        return back()->withError('Post has been successfully deleted');
    }

    public function report()
    {
        //  $sum = \DB::table('offer')->sum('price')->month('created_at');
        //    dd($sum);

        $chart = Charts::database(Offer::all(), 'bar', 'highcharts')
        ->elementLabel("Total")
        ->dimensions(1000, 500)
        ->responsive(false)
        ->groupByMonth('2017', true);



    //   $offer = \DB::table('offers')->selectRaw('SUM(price) as total, MONTH(date) as month')->whereUserId(auth()->id())->groupBy('month')->get();
// dd($offer);

    //   $char = Charts::database(Tempahan::all(), 'bar', 'highcharts')
    //   ->elementLabel("Total")
    //   ->dimensions(1000, 500)
    //   ->responsive(false)
    //   ->groupByMonth('2017', true);
        // return view('laporan.index', ['chart' => $chart], ['char' => $char]);
        return view('report', ['chart' => $chart]);
    }
}
