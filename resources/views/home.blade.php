@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">



                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                @if(count($products)>0)
                    @foreach($products as $product)

                            <div class="row">

                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>Product</th>

                                            <th class="text-center">Price</th>

                                            <th> </th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>

                                            <td class="col-sm-8 col-md-6" style="text-align: center">

                                                <div class="media">
                                                    <div class="photo">
                                                        <a class="thumbnail pull-left" href="/products/{{$product->id}}" style=""> <img  src="/photo/{{$product->product_image}}"> </a>
                                                    </div><!-- END OF PHOTO -->
                                                    <div class="media-body">
                                                        <h4  class="product-title" ><a  href="/products/{{$product->id}} ">{{$product->product_name}}</a></h4>

                                                        <span>Created at :  </span><span class="text-success"><strong>{{$product->created_at}}</strong></span>
                                                    </div>

                                                </div>

                                            </td>

                                            <td class="col-sm-1 col-md-1 text-center"><strong>  {{$product->amount}}$</strong></td>

                                            <td class="col-sm-1 col-md-1" style="text-align: center">
                                                {!! Form::Open(['action'=>['ProductsController@destroy',$product],'method'=>'Delete']) !!}

                                                {{Form::Submit('DELETE',['class'=>'btn btn-danger'])}}

                                                {!! Form::Close() !!}

                                                <a href="/products/{{$product->id}}/edit" class="btn btn-primary">EDIT</a>
                                            </td>

                                        </tr>


                                        </tbody>
                                    </table>

                            </div>
                        @endforeach
                    @else
                        <h1 class="display-4">THERE'S NO PRODUCT<BR><a href="/products/create">ADD PRODUCT </a>  </h1>

                @endif
                </div>

        </div>
    </div>
</div>
@endsection
