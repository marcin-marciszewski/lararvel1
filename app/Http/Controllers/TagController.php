<?php

namespace App\Http\Controllers;

use App\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        
        return view('tag.index')->with(['tags' =>  $tags]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
           
        ]);
        $new_tag = new Tag([
            'name' => $request->name,
        ]);

        $new_tag->save();
        return redirect()->route('tag.index')->with( ['message_success' => "The tag <b>" . $new_tag->name . "</b> was created."] );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(tag $tag)
    {
        return $this->index();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tag.edit')->with(['tag' =>  $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|min:3',
        ]);
        $tag->update([
            'name' => $request->name,
        ]);

        return redirect()->route('tag.index')->with( ['message_success' => "The tag <b>" . $tag->name . "</b> was updated."] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $old_name = $tag->name;
        $tag->delete();

        return redirect()->route('tag.index')->with( [ 'message_success' => "<b>" . $old_name . "</b> was deleted." ]);
   
    }
}
