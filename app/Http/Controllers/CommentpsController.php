<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Driver;
use App\Commentp;
use Auth;


class CommentpsController extends Controller
{

    public function index($id)
    {
        $driver = Driver::where('user_id', Auth::user()->id)->first();
        $user = User::where('id', $id)->first();
        return view('feedback.comment_for_passenger', compact('user'))->with('driver', $driver);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50',
            'feedback' => 'required|max:500',
        ]);

        $comment = new Commentp;
        $comment->passenger_id = $request->passenger;
        $comment->driver_id = Auth::user()->id;


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
}
