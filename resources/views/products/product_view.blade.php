@extends('layouts.product_view')

@section('content')



    <h1 class="display-4">PRODUCT VIEW</h1>
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="/photo/{{$products->product_image}}"/></div>

                        </div>


                    </div>
                    <div class="details col-md-6">
                        <h3 class="product-title">{{$products->product_name}}</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>
                        <p class="product-description">{{$products->product_description}}</p>
                        <h4 class="price">current price: <span>${{$products->amount}}</span></h4>


                        <button class="btn btn-primary">SHOW NUMBER</button>
                        <p style="display: none;text-align: center;font-size: 2em;margin: 2%">{{$products->phone_number}}</p>

                        <script>
                            $( "button" ).click(function() {
                                $( "p" ).show( "slow" );
                            });
                        </script>


                        <div class="action">

                            <a href="/"><button class="btn btn-primary">BACK</button> </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>





@endsection


