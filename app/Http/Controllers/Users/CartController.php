<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\Product;
use DB;
use App\Productimages;
use App\Productcategories;
use App\Categoriesdetail;
use App\Discount;
use App\Courier;
use Illuminate\Http\Request;

class CartController extends Controller
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
        $allcart = Cart::where('user_id',Auth::user()->id)->where('carts.status','notyet')->get();
        $produk = Product::join('product_images','products.id','=','product_images.product_id')
        ->leftJoin('carts','products.id','=','carts.product_id')
        ->groupBy('product_images.product_id')
        ->where('carts.user_id',Auth::user()->id)
        ->where('carts.status','notyet')
        ->select('product_images.image_name','products.*','carts.qty','carts.product_id','carts.id as cart_id')
        ->get();
        // return $produk;
        $cart=array();
        foreach ($allcart as $c) {
            foreach ($produk as $p) {
                if ($c->product_id == $p->id) {
                    array_push($cart,$p);
                }
            } 

        }
        $now = date("Y-m-d H:i:s");
        // return $now;
        $diskon = Discount::where([
            ['start', '<=', $now],
            ['end', '>=', $now],
        ])->get();
        $max = sizeof($diskon);
        $subtotal=0;
        $totalweight=0;
        // return $cart;
        $province = json_decode($this->province(), true);
        $courier = Courier::all();
        $counter = sizeof($cart);
        return view('user.cart',compact('cart','diskon','max','subtotal','province','courier','totalweight','counter'));
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
        $id = Auth::user()->id;
        // return $id;
        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'status' => 'notyet',
        ]);
        return redirect('/cart/');
    }

    public function checkout(Request $request)
    {
        // return $request;
        $id = Auth::user()->id;
        // return $id;
        Cart::create([
            'user_id' => Auth::user()->id,
            'product_id' => $request->product_id,
            'qty' => $request->qty,
            'status' => 'notyet',
        ]);
        return redirect('/cart/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show($cart)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $cart)
    {
        return $request;
        Courier::find($courier->id)->update($request->all());
        return redirect('/courier');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($cart)
    {
        // return $cart;
        Cart::where('id',$cart)->delete();
        return redirect('/cart/');
    }

    protected $RAJAONGKIR_APIKEY = "fb07f7105b1863b2bcf81a3521302472";

    public function province(){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$this->RAJAONGKIR_APIKEY
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return  $response;
        }
    }

    public function city(Request $request){
        // return 'ayam';
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$request->province_id",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: ".$this->RAJAONGKIR_APIKEY
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $datastring = "";
            foreach($response['rajaongkir']['results'] as $res){
                $datastring .= $res['city_id'].','.$res['city_name'].',';
            }
            return $datastring;
        }
    }

    public function shippingCost(Request $request){
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=17&destination=$request->destination&weight=$request->weight&courier=$request->courier",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: ".$this->RAJAONGKIR_APIKEY
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $response = json_decode($response, true);
            $datastring = "";
            foreach($response['rajaongkir']['results'] as $res){
                if($res['code'] == $request->courier){
                    foreach($res['costs'] as $cost){
                        $datastring .= $cost['service'].',';
                        foreach($cost['cost'] as $detailcost){
                            $datastring .= $detailcost['value'].',';
                        }
                    }
                }
            }
            return $datastring;
        }
    }
}
