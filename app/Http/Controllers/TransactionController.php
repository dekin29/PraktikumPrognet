<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;

use App\Transaction;
use App\DetailTransaction;
use App\Cart;
use App\Product;
use DB;
use App\Productimages;
use App\Productcategories;
use App\Categoriesdetail;
use App\Discount;
use App\Courier;
use App\AdminNotif;


class TransactionController extends Controller
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
        $unverified = Transaction::where('status','unverified')->get();
        $delivered = Transaction::where('status','delivered')->get();
        $cancel = Transaction::where('status','canceled')->orWhere('status','expired')->get();
        $success = Transaction::where('status','success')->get();
        $notif = AdminNotif::where('read_at',NULL)->get();
        return view('admin.transaction.indexTransaction',compact('unverified','delivered','cancel','success','notif'));        
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
        $id_kurir = Courier::where('courier',$request->courier)->first()->id;
        $todayString = Carbon::today()->toDateString();
        $today = Carbon::now();
        $timeout = $today->addDays(2)->toDateTimeString();
        // return $timeout;

        $transaksi = Transaction::create([
            'timeout' => $timeout,
            'address' => $request->address,
            'regency' => $request->regency,
            'province' => $request->province,
            'total' => $request->total,
            'shipping_cost' => $request->shipping_cost,
            'sub_total' => $request->sub_total,
            'user_id' => Auth::user()->id,
            'courier_id' => $id_kurir,
            'status' => 'unverified',
            'service' => $request->service,
        ]);
        // return $todayString;
        $cart = Cart::join('products','carts.product_id','=','products.id')
        ->where('user_id',Auth::user()->id)->where('carts.status','notyet')
        ->select('carts.*','products.price')->get();
        $allDiskon = Discount::where([
            ['start', '<=', $todayString],
            ['end', '>=', $todayString],
        ])->orderBy('updated_at', 'desc')->get();
        // return compact('cart','allDiskon');
        // $flag=2;
        foreach ($cart as $c) {
            foreach ($allDiskon as $d) {
                if ($c->product_id == $d->id_product) {
                    $flag=1;
                    $diskon = $d->percentage;
                    // return $diskon;
                    break;
                }
                else {
                    $flag=2;
                }
            }
            if ($flag==1) {
                DetailTransaction::create([
                    'transaction_id' => $transaksi->id,
                    'product_id' => $c->product_id,
                    'qty' => $c->qty,
                    'discount' => $diskon,
                    'selling_price' => $c->price,
                ]);
            }
            else {
                DetailTransaction::create([
                    'transaction_id' => $transaksi->id,
                    'product_id' => $c->product_id,
                    'qty' => $c->qty,
                    'discount' => 0,
                    'selling_price' => $c->price,
                ]);
            } 
        }
        Cart::where('user_id', Auth::user()->id)
          ->where('status', 'notyet')
          ->update(['status' => 'checkedout']);
        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($transaction)
    {
        // return $transaction;
        // Transaction::where('id',$transaction)->delete();
        Transaction::where('id',$transaction)
          ->update(['status' => 'delivered']);
        return redirect('/transaction/');
    }

    public function cancel($transaction)
    {
        // return $transaction;
        // Transaction::where('id',$transaction)->delete();
        Transaction::where('id',$transaction)
          ->update(['status' => 'canceled']);
        return redirect('/transaction/');
    }

    public function uploadBukti(Request $request)
    {
        // return $request;
        $today = Carbon::now();
        $transaksi = Transaction::where('id',$request->id)->first();
        if(!empty($transaksi->proof_of_payment)){
            File::delete($transaksi->proof_of_payment);
        }
        if($transaksi->timeout < $today){
            Transaction::where('id',$request->id)
                    ->update([
                    'status' =>  'expired',
                ]);
        }
        if($request->hasFile('images')) {
            $destinationPath = public_path('images/bukti/');
            $image = $request->file('images');
            $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                Transaction::where('id',$request->id)
                    ->update([
                    'proof_of_payment' =>  'images/bukti/'. $filename,
                ]);
        }
        return redirect('/myprofile/');
    }

}
