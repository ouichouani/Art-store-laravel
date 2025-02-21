@extends('../layout/index')
@section('content')
<div class="container">
    @foreach($products as $product)
    <form action="{{route('product.show' , $product)}}" method="GET" onclick="submit()">
        <img src="{{asset('img/' . $product->img)}}" alt="" style="width: 200px ;">
        <p> {{$product->title}} </p>
    </form>
    {{-- <form action="{{route('product.destroy' , $product)}}" method="GET">
        @csrf
        @method('DELETE')
        <input type="hidden" value="product.purcheses" name="route">
        <button type="submit">delete</button>
    </form>
    <form action="{{route('product.edit' , $product)}}" method="grt">
        @csrf
        <input type="hidden" value="product.purcheses" name="route">
        <button type="submit">update</button>
    </form> --}}
    @endforeach
</div>

@endsection