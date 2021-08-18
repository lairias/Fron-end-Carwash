<?php

namespace App\Http\Controllers;

use App\Models\widgets;
use Illuminate\Http\Request;

class WidgetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Estadistica.widgets');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\widgets  $widgets
     * @return \Illuminate\Http\Response
     */
    public function show(widgets $widgets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\widgets  $widgets
     * @return \Illuminate\Http\Response
     */
    public function edit(widgets $widgets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\widgets  $widgets
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, widgets $widgets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\widgets  $widgets
     * @return \Illuminate\Http\Response
     */
    public function destroy(widgets $widgets)
    {
        //
    }
}
