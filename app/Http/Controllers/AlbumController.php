<?php

namespace App\Http\Controllers;

use App\Album;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Input;
use Validator;
use Illuminate\Support\Facades\File;
use Auth;



class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $image = Album::all();

        return view('album.index')->with('images',$image);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'image'=>'image',
            ]);

        $avatar= Input::file('image');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        $size = getimagesize($avatar);
        if($size[0] > 1280 && $size[1] > 720) {//RESIZE PHOTO

            Image::make($avatar)->resize(1280, 720)->save(public_path('/photo/' . $filename));

        }
        else{

            Image::make($avatar)->save(public_path('/photo/' . $filename));

        }

        //ADD PRODUCT_NAME, PRODUCT_DESCRIPTION, AMOUNT AND QUANTITY

        $use = new Album;
        $use->image=$filename;
        $use->save();

        return redirect('/album')->with('success');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


        $image =Album::all('image')->where('id', $id)->first();
        $file= $image->your_file_path;
        $filename = public_path().'/photo/'.$file;
        File::delete($filename);





    }
}
