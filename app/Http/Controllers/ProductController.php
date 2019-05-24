<?php

namespace App\Http\Controllers;

use App\Product;
use App\Productcategories;
use App\Categoriesdetail;
use App\Productimages;
use App\Discount;
use File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\AdminNotif;

class ProductController extends Controller
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

    public function delTree($dir) { 
        $files = array_diff(scandir($dir), array('.','..')); 
         foreach ($files as $file) { 
           (is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
         } 
         return rmdir($dir); 
    }

    public function index()
    {
        $pesan = 0;
        $produk = Product::all();
        $kategori = Productcategories::all();
        $notif = AdminNotif::where('read_at',NULL)->get();
        return view('admin.product.indexProduct',compact('produk','pesan','kategori','notif'));
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
        // print_r($request->all());
        // return $request;

        $produk = Product::create($request->all());
        foreach ($request->kategori as $kategoris) {
            Categoriesdetail::create([
                'product_id' =>  $produk->id,
                'category_id' => $kategoris,
            ]);
        }
        if($request->hasFile('images')) {
            $destinationPath = public_path('images/product/'.$produk->id.'/');
            mkdir($destinationPath);
            foreach($request->file('images') as $image) {
                $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                Productimages::create([
                    'product_id' =>  $produk->id,
                    'image_name' =>  'images/product/'.$produk->id.'/'. $filename,
                ]);
            }
        }
        return redirect('product');

            // $image = new Productimage([
            //     'product_id' => $produk->id,
            //     'image_name' => $filename,
            // ]);
            // $produkimage = new Product();
            // $produkimages->images()->save($image);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $produk = Product::find($product)->first();
        $allKategori = Productcategories::all();
        $kategori = Categoriesdetail::where('product_id',$produk->id)->get();
        $images = Productimages::where('product_id',$produk->id)->get();
        // return (compact('produk','kategori','images','allKategori'));
        return view('admin.product.showproduct',compact('produk','kategori','images','allKategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $produk = Product::find($product)->first();
        $allKategori = Productcategories::all();
        $kategori = Categoriesdetail::where('product_id',$produk->id)->get();
        $images = Productimages::where('product_id',$produk->id)->get();
        // return (compact('produk','kategori','images','allKategori'));
        return view('admin.product.editProduct',compact('produk','kategori','images','allKategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        Product::find($product->id)->update($request->all());
        Categoriesdetail::where('product_id',$product->id)->delete();
        foreach ($request->kategori as $kategoris) {
            Categoriesdetail::create([
                'product_id' =>  $product->id,
                'category_id' => $kategoris,
            ]);
        }
        $images = Productimages::where('product_id',$product->id)->get();
        $arrayimage[] = "";
        foreach ($images as $i) {
            array_push($arrayimage,$i->image_name);
        }
        Productimages::where('product_id',$product->id)->delete();
        File::delete($arrayimage);
        if($request->hasFile('images')) {
            $destinationPath = public_path('images/product/'.$produk->id.'/');
            mkdir($destinationPath);
            foreach($request->file('images') as $image) {
                $filename = $image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                Productimages::create([
                    'product_id' =>  $produk->id,
                    'image_name' =>  'images/product/'.$produk->id.'/'. $filename,
                ]);
            }
        }
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Categoriesdetail::where('product_id',$product->id)->delete();
        $images = Productimages::where('product_id',$product->id)->get();
        $arrayimage[] = "";
        foreach ($images as $i) {
            array_push($arrayimage,$i->image_name);
        }
        Productimages::where('product_id',$product->id)->delete();
        $path = public_path('images/product/'.$product->id);
        exec(sprintf("rd /s /q %s", escapeshellarg($path)));
        Product::find($product->id)->delete();
        $diskon = Discount::find($product->id);
        // return $diskon;
        if (!is_null($diskon)) {
            $diskon->delete();
        }   
        return redirect('/product');
        
    }

    
}
