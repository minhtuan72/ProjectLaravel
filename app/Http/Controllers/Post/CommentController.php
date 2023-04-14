<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Xetaio\Mentions\Parser\MentionParser;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // Handle the comment creation however you like
        $comment = Comment::create($request->all());

        // Register a new Parser and parse the content.
        $parser = new MentionParser($comment);
        $content = $parser->parse($comment->content);

        /**
         * Re-assign the parsed content and save it.
         *
         * Note : If you use a custom Parser and you don't modify
         * the `$content` in your custom Parser, you can ignore that.
         */
        $comment->content = $content;
        $comment->save();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'body'=>'required',
        // ]);
   
        $input = $request->all();
        
        $input['user_id'] = auth()->user()->id;//chèn thêm trường user_id

        // dd($input['body']);
        
        // dd($input);
        $comment = Comment::create($input);
        
        $parser = new MentionParser($comment);
        $content = $parser->parse($comment->content);
        //return redirect("test2");
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
