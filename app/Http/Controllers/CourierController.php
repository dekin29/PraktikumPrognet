<?php

namespace App\Http\Controllers;

use App\Courier;
use Illuminate\Http\Request;
use App\AdminNotif;

class CourierController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesan = 0;
        $kurir = Courier::all();
        $notif = AdminNotif::where('read_at',NULL)->get();
        return view('admin.courier.indexCourier',compact('kurir','pesan','notif'));
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
        Courier::create($request->all());
        return redirect('courier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function edit(Courier $courier)
    {
        $kurir = Courier::find($courier->id)->first();
        // return $kurir;
        return view('admin.courier.editCourier',compact('kurir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Courier $courier)
    {
        Courier::find($courier->id)->update($request->all());
        return redirect('/courier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Courier  $courier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Courier $courier)
    {
        Courier::find($courier->id)->delete();
        return redirect('/courier');
    }
}
