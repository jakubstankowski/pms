@extends('layouts.shop')
@section('content')


        {!! Form::Open(['action'=>['ProductsController@update',$product->id],'method'=>'Post','enctype'=>'multipart/form-data']) !!}

                {{method_field('PATCH')}}


                    <div class="form-group">
                        {{Form::label('product_name','PRODUCT TITLE',['class' => 'h1 display-3'])}}
                        {{Form::text('product_name',$product->product_name,['class' => 'form-control','placeholder'=>'MAX 50 CHARACTERS'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('product_description','PRODUCT DESCRIPTION ',['class' => 'h1 display-3'])}}
                        {{Form::textarea('product_description',$product->product_description,['class' => 'form-control rounded-0','placeholder'=>'MAX 250 CHARACTERS'])}}
                    </div>

                    <div class="row">

                        <div class="col-sm-4">
                            <div class="form-group">
                                {{Form::label('amount','CHANGE PRICE',['class' => 'h1 display-3'])}}
                                {{Form::number('amount',$product->amount,['class' => 'form-control','placeholder'=>'SET A PRICE $ '])}}
                            </div>

                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                {{Form::label('phone_number','PHONE NUMBER',['class' => 'h1 display-3'])}}
                                {{Form::number('phone_number',$product->phone_number,['class' => 'form-control','placeholder'=>'GIVE QUANTITY'])}}
                            </div>


                        </div>

                        <div class="col-sm-4">
                            {{Form::label('product_image','UPDATE IMAGE',['class'=>'h1 display-3'])}}
                            {{Form::file('product_image')}}
                        </div>

                    </div>


                {{Form::submit('SAVE',['class'=>'btn btn-primary'])}}


        {!! Form::Close() !!}



@endsection