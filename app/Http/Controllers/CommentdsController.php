<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Driver;
use App\Commentd;
use Auth;


class CommentdsController extends Controller
{

    public function index($id)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $driver = Driver::where('user_id', $id)->first();
        return view('feedback.comment_for_driver', compact('driver'))->with('user', $user);
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

        $comment = new Commentd;
        $comment->user_id = Auth::user()->id;
        $comment->driver_id = $request->driver;

        $comment->title = $request->title;
        $comment->feedback = $request->feedback;

        // dd($comment);
        $comment->save();

        return redirect()->action('BooksController@show4')->withMessage('Comment added');
    }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function rating()
    {
        $user = User::first();
        $post = Post::first();

        $rating = $post->rating([
            'rating' => 5
        ], $user);

        dd($rating);
    }
}
