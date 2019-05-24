<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Productimages;
use App\Productcategories;
use App\Categoriesdetail;
use App\Discount;
use App\AdminNotif;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produk = Product::all();
        $kategori = Productcategories::all();
        // $allNotif = AdminNotif::all();
        // $count = sizeof($allNotif);
        $notif = UserNotif::where('read_at',NULL)->get();
        // return compact('notif','allNotif');
        // return $notif;
        return view('user.home',compact('produk','kategori','notif'));
    }
}
