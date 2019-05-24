<?php

namespace App\Http\Controllers;

use App\Productcategories;
use Illuminate\Http\Request;
use App\AdminNotif;

class ProductcategoriesController extends Controller
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
        $kategori = Productcategories::all();
        $notif = AdminNotif::where('read_at',NULL)->get();
        return view('admin.productcategories.productcategories',compact('kategori','pesan','notif'));
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
        // $kategori = Productcategories::all();
        // foreach ($kategori as $key) {
        //     if ($request->category_name == $key->category_name) {
        //         $pesan = 1;
        //         return view('admin.productcategories.productcategories',compact('pesan','kategori'));
        //     } 
        //     else {
                Productcategories::create($request->all());
                return redirect('productcategories');
        //     }

        // }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function show(Productcategories $productcategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function edit($productcategories)
    {
        $kategori = Productcategories::find($productcategories)->first();
        // return $kategori;
        return view('admin.productcategories.editProductcategories',compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $productcategories)
    {
        Productcategories::find($productcategories)->update($request->all());
        return redirect('/productcategories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Productcategories  $productcategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($productcategories)
    {
        Productcategories::find($productcategories)->delete();
        return redirect('/productcategories');
    }
}
