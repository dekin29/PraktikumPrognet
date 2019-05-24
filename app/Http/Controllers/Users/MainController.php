<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Product;
use DB;
use App\Productimages;
use App\Productcategories;
use App\Categoriesdetail;
use App\Discount;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Product::all();
        $kategori = Productcategories::all();
        return view('user.home',compact('produk','kategori'));
    }

    public function shop()
    {
        $produk = Product::all();
        $gambar = Productimages::groupBy('product_id')->get();
        //return $gambar;
        $kategori = DB::table('product_categories')
            ->join('product_category_details', 'product_categories.id', '=', 'product_category_details.category_id')
            ->get();
        $now = date("Y-m-d H:i:s");
        // return $now;
        $diskon = Discount::where([
            ['start', '<=', $now],
            ['end', '>=', $now],
        ])->get();
        // return $diskon;
        $max = sizeof($diskon);
        // return $diskon;
        return view('user.shop',compact('produk','kategori','gambar','diskon','max'));
    }

    public function shop_list()
    {
        $produk = Product::all();
        $gambar = Productimages::groupBy('product_id')->get();
        $allkategori = Productcategories::all();
        $kategori = DB::table('product_categories')
            ->join('product_category_details', 'product_categories.id', '=', 'product_category_details.category_id')
            ->get();
        $now = date("Y-m-d H:i:s");
        // return $now;
        $diskon = Discount::where([
            ['start', '<=', $now],
            ['end', '>=', $now],
        ])->get();
        // return $diskon;
        $max = sizeof($diskon);
        return view('user.shop_list',compact('produk','kategori','gambar','diskon','max','allkategori'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        $produk = Product::where('id',$id) ->first();
        // return $produk;
        $kategori = DB::table('product_categories')
            ->join('product_category_details', 'product_categories.id', '=', 'product_category_details.category_id')
            ->where('product_id',$id)->get();
        // return $kategori;
        $images = Productimages::where('product_id',$id)->get();
        // return $images;
        $now = date("Y-m-d H:i:s");
        // return $now;
        $diskon = Discount::where([
            // ['id_product', '==', $id],
            ['start', '<=', $now],
            ['end', '>=', $now],
        ])->get();
        // return $diskon;
        $max = sizeof($diskon);
        // return $max;
        return view('user.detailProduk',compact('produk','kategori','images','diskon','max'));
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
