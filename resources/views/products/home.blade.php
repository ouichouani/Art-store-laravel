{{-- index page --}}
@extends('../layout/index')
@section('style')
    <link rel="stylesheet" href="{{asset('style/home_products.css')}}">
@endsection


@section('content')



    @foreach($products as $product)

        @if($product->to_sell)
            <div class="product_card">

                <form action="{{ route('product.show' , $product->product_id )}}" onclick=submit() method="GET">   
                    @csrf
                        <img class="product_img" src="{{asset("img/" . $product->product_img)}}" alt="product img">
                </form>
                <div class="user_card">
                    <img class="product_img" src="{{asset("img/" . $product->user_img)}}" alt="artist profile">
                    <p class="artist_name">{{$product->name}}</p>
                    <p class="product_price">{{$product->price}} $ </p>
                </div>
                
            </div>
        @endif

    @endforeach

@endsection