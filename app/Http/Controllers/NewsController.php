<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(12);

        return view('news', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new = new News;
        $image = News::storeImage($request['image']);
        $fields = array_merge($request->except('image'), ['image' => $image]);
        $new = $new->create($fields);

        return redirect()->route('show', $new->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $new = News::whereId($id)->firstOrFail();

        return view('show', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::whereId($id)->firstOrFail();

        return view('create_edit', compact('new'));
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
        $new = News::whereId($id)->firstOrFail();
        $image = $new->image;

        if ($request->file('image'))
        {
            $name = News::storeImage($request['image']);

            $image = $name;
        }

        $new->update(['title' => $request['title'], 'text' => $request['text'], 'image' => $image]);

        return redirect()->route('show', $new->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::whereId($id)->firstOrFail();
        $new->delete();

        return redirect()->route('news');
    }
}
