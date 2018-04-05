@extends('layouts.shop');



@section('content')






    {!! Form::open(['action' => 'ProductsController@store','method'=>'Post','enctype'=>'multipart/form-data']) !!}

            {{Form::label('product_name','PRODUCT TITLE',['class' => 'h1 display-3'])}}
            {{Form::text('product_name','',['class'=>'form-control','placeholder'=>'MAX 50 CHARACTERS'])}}

            {{Form::label('product_description','PRODUCT DESCRIPTION',['class' => 'h1 display-3'])}}
            {{Form::textarea('product_description','',['class'=>'form-control rounded-0','placeholder'=>'MAX 250 CHARACTERS'])}}


    <div class="row">
                <div class="col-md-4">
                    {{Form::label('amount','PRICE',['class' => 'h1 display-3'])}}

                    {{Form::number('amount','',['class'=>'form-control','placeholder'=>'SET A PRICE'])}}
                </div>
                <div class="col-md-4">
                    {{Form::label('phone_number','PHONE NUMBER',['class' => 'h1 display-3'])}}

                    {{Form::number('phone_number','',['class'=>'form-control','placeholder'=>'SET QUANTITY'])}}
                </div>
                <div class="col-md-4">
                    {{Form::label('product_image','IMAGE',['class' => 'h1 display-3'])}}
                    {{Form::file('product_image')}}

                </div>
            </div>




            {{Form::submit('ADD',['class' => 'btn btn-primary'])}}





    {!! Form::close() !!}

    <a href="http://127.0.0.1:8000/products"><button type="button" class="btn btn-secondary">BACK</button></a>




@endsection

