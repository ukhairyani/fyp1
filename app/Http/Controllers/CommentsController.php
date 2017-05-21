<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Driver;
use App\Comment;
use App\User;

class CommentsController extends Controller
{
    function index($id) //comment driver
    {
        //
        $user = User::where('id', Auth::user()->id)->first();
        $driver = Driver::db connection(mysql2)->where('user_id', $id)->first();
        return view('feedback.comment_for_driver', compact('driver'))->with('user', $user);
    }


    public function create()
    {
        //
    }

    public function store(Request $request) //comment driver
    {
        //
        $this->validate($request, [
            'title' => 'required|max:50',
            'feedback' => 'required|max:500',
        ]);

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->passenger_id = Auth::user()->id;
        $comment->driver_id = $request->driver;

        $comment->title = $request->title;
        $comment->feedback = $request->feedback;

        // dd($comment);
        $comment->save();

        return redirect()->action('BooksController@show3')->withMessage('Comment added');
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

    function indexPassenger($id)
    {
        //
        $driver = Driver::where('user_id', Auth::user()->id)->first();
        $user = User::where('id', $id)->first();
        return view('feedback.comment_for_passenger', compact('user'))->with('driver', $driver);
    }



    public function storePassenger(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|max:50',
            'feedback' => 'required|max:500',
        ]);

        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->passenger_id = $request->passenger;
        $comment->driver_id = Auth::user()->id;


        $comment->title = $request->title;
        $comment->feedback = $request->feedback;

        // dd($comment);
        $comment->save();

        return redirect()->action('BooksController@show3')->withMessage('Comment added');
    }


}
