<?php

namespace App\Http\Controllers;

use App\Discount;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\AdminNotif;

class DiscountController extends Controller
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
        $diskon = Discount::join('products','products.id','=','discounts.id_product')
        ->select('products.product_name','discounts.*')->get();
        // $produk = Product::all();
        // return $produk;
        $produk = Product::whereNotIn('products.id', function($query){
            $query->select('id_product')
            ->from(with(new Discount)->getTable())
            ->where('discounts.end', '>', Carbon::now());
        })-> get();
        $notif = AdminNotif::where('read_at',NULL)->get();
        return view('admin.discount.indexDiscount',compact('diskon','produk','pesan','notif'));
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
        // return $request;
        // Discount::create($request->all());
        $start = $request->start;
        $end = $request->end;
        // return $tanggal;
        // $date = DateTime::createFromFormat('d/m/Y H:i:s', $tanggal);
        // return $date;
        // $tanggal->format('Y-m-d h:i:s');
        $start = strtotime($start);
        $end = strtotime($end);
        $start = date('Y-m-d H:i:s',$start);
        $end = date('Y-m-d H:i:s',$end);
        // return compact('start','end');

        $produk = $request->produk;
        // return $produk;
        foreach ($produk as $p) {
            // return $p;
            $diskon = Discount::create(
                [
                'id_product' => $p,
                'percentage' => $request->percentage,
                'start' => $start,
                'end' => $end,
                ]);
        }
        return redirect('discount');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        $diskon = Discount::find($discount->id)->first();
        // return $kurir;
        return view('admin.discount.editDiscount',compact('diskon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        Discount::find($discount->id)->update($request->all());
        return redirect('/discount');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        Discount::find($discount->id)->delete();
        return redirect('/discount');
    }
}
