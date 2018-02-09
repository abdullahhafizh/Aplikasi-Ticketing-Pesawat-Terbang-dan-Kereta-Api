<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Reservation;
use \App\Route;
use \App\Transportation;

class GuestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $table = new Reservation;
        $table->reservation_code = uniqid();
        $table->reservation_at = $request->input('reservation_at');
        $table->reservation_date = date('d/m/y');
        $table->costumerid = $request->input('costumerid');

        $route = Route::find($request->input('routeid'));
        $transportation = Transportation::find($route->transportationid);

        $available_qty =  $transportation->available_qty;
        $current_qty = $available_qty - 1;

        $transportation->available_qty = $available_qty - 1;

        $code = $route->transportationid.'-'.$current_qty;

        $table->seat_code = $code;
        $table->routeid = $request->input('routeid');
        $table->depart_at = $request->input('depart_at');
        $table->price = $request->input('depart_at');

        $route = Route::find($request->input('routeid'));
        $table->price = $route->price;

        $table->userid = Auth::user()->id;
        $table->save();
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
}
