@extends('layouts.shop_front')

@section('content')

    <h1 class="displa-4">WELCOME TO MY SHOP ! </h1>


    @if(count($products)>0)
        <?php
            $colcount = count($products);
            $i = 1;


        ?>

        <DIV class="row">

            @foreach($products as $product)
                @if($i=$colcount)

                    <div class="col-md-6">
                        <div class="product-item">
                            <div class="pi-img-wrapper">

                                <a href="show/{{$product->id}}">  <img src="/photo/{{$product->product_image}}" class="img-responsive" alt="Berry Lace Dress"></a>

                            </div>
                            <h3><a href="show/{{$product->id}}">{{$product->product_name}}</a></h3>
                            <div class="pi-price"> $ {{$product->amount}}</div>
                        </div>
                    </div>


                @else
                    <div class="col-md-6">
                        <div class="product-item">
                            <div class="pi-img-wrapper">
                                <img src="/photo/{{$product->product_image}}" class="img-responsive" alt="Berry Lace Dress">
                                <div>
                                    <a href="products/{{$product->id}}" class="btn">Zoom</a>

                                </div>
                            </div>
                            <h3><a href="products/{{$product->id}}">{{$product->product_name}}</a></h3>
                            <div class="pi-price"> $ {{$product->amount}}</div>
                        </div>
                    </div>



                @endif


            @endforeach

        </DIV><!-- END OF ROW -->



        @else
            <h1 class="display-4">THERE'S NO PRODUCTS ! </h1>




    @endif
    <div class="pagination">{{$products->links()}}</div>

    @endsection