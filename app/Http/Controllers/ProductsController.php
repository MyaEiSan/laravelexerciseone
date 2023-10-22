<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "I am index Page";

        $products = Product::all();
        return view('products.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // => 1. Public Folder (public/customfolder/)

        // $request->image->move('customfolder',$imagename);
        // $request->image->move(public_path('customfolder'), $imagename);


        // => 2. Storage Folder/ Local Driver (storage/app/customfolder)

        // php artisan storage:link 

        // $request->image->store('path');

        // use Illuminate\Support\Facades\Storage
        // Storage::disk('local').put($file,'content','optional');

        // $request->image->storeAs($file,$imagename,optional drive);

        $product = new Product();
        $product->name = $request['name'];
        $product->price = $request['price'];
        
        $file = $request->file('image');

        // if($file){
        //     $fname = $file->getClientOriginalName();

        //     // $imagenewname = date('ymdHms').$fname;
        //     // $imagenewname = time().$fname;
        //     $imagenewname = uniqid().$fname; 

        //     $file->move('images',$imagenewname);

        //     $product->image = $imagenewname; 

        // }

        // if($file){
        //     $fname = $file->getClientOriginalName();

        //     $imagenewname = time().$fname; 

        //     // $fileurl = $file->move('images',$imagenewname);
        //     $fileurl = $file->move(public_path('images'),$imagenewname);

        //     $product->image = $fileurl; 

        // }

        // if($request->hasfile('image')){
        //     $fnameext = $file->getClientOriginalExtension();

        //     $imagenewname = uniqid().'.'.$fnameext;

        //     // dd($imagenewname);

        //     $file->storeAs('images',$imagenewname);

        //     $product->image = $imagenewname;
        // }

        // if($request->hasfile('image')){

        //     $fnameext = $file->extension();

        //     $imagenewname = time().'.'.$fnameext;

        //     // dd($imagenewname);

        //     $file->storeAs('public/images',$imagenewname);

        //     $product->image = $imagenewname;
        // }

        // if($request->hasfile('image')){

        //     $fnameext = $file->extension();

        //     $imagenewname = time().'.'.$fnameext;

        //     // dd($imagenewname);

        //     $fileurl = $file->storeAs('public/images',$imagenewname);

        //     $product->image = $fileurl;
        // }

        // if($request->hasfile('image')){
        //     // $fileurl = $file->store();
        //     $fileurl = $file->store('images');
        //     $product->image = $fileurl;
        // }

        // if($request->hasfile('image')){
        //     $fnameext = $file->extension(); 
        //     $imagenewname = uniqid().'.'.$fnameext; 

        //     // dd($file->get());
        //     // dd(file_get_contents($file));

        //     Storage::disk('local')->put('images/',$imagenewname,$file->get());

        //     $product->image = $imagenewname;
        // }

        if($request->hasfile('image')){
            $fnameext = $file->extension(); 
            $imagenewname = uniqid().'.'.$fnameext; 

            // dd($file->get());
            // dd(file_get_contents($file));

            Storage::disk('local')->put('images/',$imagenewname,file_get_contents($file),'public');

            $fileurl = "public/app/images/".$imagenewname;

            $product->image = $fileurl;
        }


        $product->save();
        return redirect(route('products.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.show',['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::findOrFail($id)->update([
            'name'=>$request['name'],
            'price'=>$request['price']
        ]);

        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back();
    }
}


