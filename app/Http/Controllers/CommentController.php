<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\newcomment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'comment_content' => 'required|max:255',
            'post_id' => 'required|integer',
            'author_id' => 'required|integer',
        ]);

        $a = new Comment;
        $a->comment_content = $validatedData['comment_content'];
        $a->post_id = $validatedData['post_id'];
        $a->author_id = $validatedData['author_id'];
        $a->save();

        session()->flash('message', 'Comment was created');
        return redirect()->route('posts.show', $a->post_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    public function apiStore(Request $request)
    {
        $validatedData = $request->validate([
            'comment_content' => 'required|max:255',
            'post_id' => 'required|integer',
            'author_id' => 'required|integer',
        ]);

        $a = new Comment;
        $a->comment_content = $validatedData['comment_content'];
        $a->post_id = $validatedData['post_id'];
        $a->author_id = $validatedData['author_id'];
        $a->save();

        Mail::to(User::find($a->author_id))->send(
            new newcomment(
                User::find($a->author_id),
                Post::find($a->post_id)
            )
        );


        return $a;
    }
}
