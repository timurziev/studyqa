<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Text;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $text = Text::firstOrFail();

        return view('home', compact('text'));
    }

    /**
     * Edit text on main page
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $text = Text::firstOrFail();

        return view('home', compact('text'));
    }

    /**
     * Store updated text
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request)
    {
        $text = Text::firstOrFail();

        $text->update(['text' => $request['text']]);

        return redirect('/');
    }
}
