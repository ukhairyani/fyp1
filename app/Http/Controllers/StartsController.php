<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Offer;
use App\Book;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\HantarEmel;


class StartsController extends Controller
{

    public function index()
    {
        $books = Book::with('user')->paginate();
        return view('active.list_ride', compact('books'));

    }


    public function create($id)
    {
        $book = Book::findOrFail($id);
        $timestamp = Carbon::now();

        $nama_waris = $book->nama_waris;
        $nama_penumpang = $book->user->name;
        $drop_off = $book->drop_off;
        $destination = $book->offer->destination;
        $pickup_loc = $book->offer->pickup_loc;
        $nama_driver = $book->driver->user->name;
        $tel_driver = $book->driver->user->noTel;

        $time = $book->offer->time;
        $est_duration = $book->offer->est_duration;
        $eta = Carbon::parse($time)->addMinute($est_duration);

        $book->notify(new HantarEmel($timestamp, $nama_waris, $nama_penumpang, $drop_off, $destination, $pickup_loc, $nama_driver, $tel_driver, $eta));
    }



    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
