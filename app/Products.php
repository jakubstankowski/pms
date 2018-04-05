<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{

    protected  $fillable=[
        'product_name','product_description','amount','quantity','product_image'
        ];

        public function photos(){
            return $this->hasMany('App\Photo');
        }
}
