<?php

namespace App\Http\Controllers;

use App\Response;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\UserNotif;
use App\User;

class ResponseController extends Controller
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
        $review = Review::join('users','users.id','=','product_reviews.user_id')
        ->join('products','products.id','=','product_reviews.product_id')
        ->select('product_reviews.*','users.name','products.product_name')
        ->get();
        return view('admin.response.indexResponse',compact('review'));
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
        Response::create([
            'review_id' => $request->review_id,
            'admin_id' => Auth::user()->id,
            'content' => $request->content,
        ]);
        $user = User::find(2);
        $user->notify(new UserNotif("Review Anda Diresponse Admin"));
        return redirect('/response/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function edit(Response $response)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Response $response)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Response  $response
     * @return \Illuminate\Http\Response
     */
    public function destroy(Response $response)
    {
        //
    }
}
