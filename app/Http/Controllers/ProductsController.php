<?php

namespace App\Http\Controllers;


use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Products::with('Photo')->get();
        $products = Products::paginate(5);
        return view('home') -> with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {

        $this->validate($request, [
            'product_name' => 'required|min:3|max:50',
            'product_description' => 'required|min:10',
            'amount' => 'required|min:1|max:6',
            'phone_number' => 'required|min:9|max:11|',
            'product_image'=>'image'

        ]);

        //ADD PHOTO

        $avatar= Input::file('product_image');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        $size = getimagesize($avatar);

        if($size[0] > 1280 && $size[1] > 720) {//RESIZE PHOTO
        Image::make($avatar)->resize(1280, 720)->save(public_path('/photo/' . $filename));

    }
        else{
            Image::make($avatar)->save(public_path('/photo/' . $filename));
        }

        //ADD PRODUCT_NAME, PRODUCT_DESCRIPTION, AMOUNT AND QUANTITY
        $product = new Products;
        $product->product_name = $request->input('product_name');
        $product->product_description = $request->input('product_description');
        $product->amount=$request->input('amount');
        $product->phone_number=$request->input('phone_number');
        $product->product_image = $filename;
        $product->save();


        return redirect('/home')->with('success');

        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Products $product)
    {

        return view('products.show') -> with('products',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Products  $product)
    {



        return view('products.edit')->with('product',$product);


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

        $products = Products::find($id);
        $products->product_name = $request->product_name;
        $products->product_description = $request->product_description;
        $products->amount=$request->amount;
        $products->phone_number=$request->phone_number;

        //resize photo
        if($request->hasFile('product_image')){
            $avatar = $request->file('product_image');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $size = getimagesize($avatar);
            if ($size[0]>1280 && $size[1]>720){
                Image::make($avatar)->resize(1280,720)->save(public_path('photo/').$filename);
            }
            else{
                Image::make($avatar)->save(public_path('photo/').$filename);

            }
            $oldFilename = $products->product_image;
            //update the database
            $products->product_image=$filename;
            //Delete the old photo
            Storage::delete($oldFilename);

        }

        $products->save();



        return redirect('/home') -> with('edit','');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  Products $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product )
    {


        //delete image from local folder "/photo/"
        Storage::delete($product->product_image);

        //delete product title, description, amount and image from MySQL
        $product -> delete();



        return redirect('/home') -> with('delete',' ');



    }

    //FRONTEND CONTROL -  ANY PRODUCT SHOW LIST, AND  INDIVIDUAL PRODUCT VIEW
    public function product_show(){

        $products = Products::paginate(4);

        return view('products.product_show')->with('products',$products);

    }
    public function product_view(Products $product){


        return view('products.product_view')->with('products',$product);
    }


}
