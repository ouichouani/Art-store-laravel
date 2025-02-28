@extends('../layout/index')

@section('content')

<div class="notification">
    <p style="background-color: rgb(57, 255, 47)"> {{session('success')}}</p>
    <p style="background-color: rgb(255, 200, 47)"> {{session('error')}}</p>
</div>

    


<div class="profuct">
    <span class="price">{{$product->price}} $</span>
    <img src="{{asset('img/' .$product->img)}}" alt="profail_img" style="width: 100px">

    <form action="{{route('user.show' , $artist)}}" method="GET"  onclick=submit()>
        @csrf
        <img src="{{asset('img/' . $artist->img)}}" alt="" style="width: 100px">
        <span class="oner_name">{{$artist->name}}</span>
        <span class="oner_email">{{$artist->email}}</span>
    </form>

    <h3>{{$product->title}}</h3>
    <p class="description">{{$product->description}}</p>

    {{-- --------------------------------------------------------------- --}}
    @if(Auth::check())
        @if(!(Auth::user()->user_id == $product->oner_id))
            <form action="{{route('commands.store')}}" method="POST">
                @csrf
                {{-- about commands --}}
                <input type="hidden" value="{{$product->oner_id}}" name="oner">
                <input type="hidden" value="{{$product->product_id}}" name="product">
                <button type="submit">buy</button> 
            </form>
        @else
            <form action="{{route('product.edit' , $product)}}" method="grt">
                @csrf
                <input type="hidden" value="product.show" name="route">
                <button type="submit">update</button> 
            </form>
            <form action="{{route('product.destroy' , $product)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="hidden" value="product.show" name="route">
                <button type="submit">delete</button>
            </form>
        @endif
    @endif
    

    
</div>


    
@endsection

