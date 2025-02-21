@extends("../layout/index")

@section('content')
<div class="container">

    <div class="oner" style="background-color: aquamarine">
        <img src="{{asset("img/" . $user->img)}}" alt="" style="width :40px">
        <p class="name">{{$user->name}}</p>
        <p class="email">{{$user->email}}</p>
    </div>

    <form action="{{route('product.update' , $product)}}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" value="{{$route}}" name="route">

        <label for="title">title</label>
        <input type="text" name="title" id="title" value="{{old('title' ,$product->title)}}">
        @error('title')
        <p class="error_input" style="color: red">{{$message}}</p>
        @enderror
        <br>

        <label for="price">price</label>
        <input type="number" name="price" id="price" value="{{old('price',$product->price)}}">
        @error('price')
        <p class="error_input" style="color: red">{{$message}}</p>
        @enderror
        <br>

        <label for="description">description</label>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="write the project description">{{old('description' ,$product->description)}}</textarea>
        @error('description')
        <p class="error_input" style="color: red">{{$message}}</p>
        @enderror
        <br>

        <label for="img">your project</label>
        <input type="file" name="img" id="img">
        @error('img')
        <p class="error_input" style="color: red">{{$message}}</p>
        @enderror
        <br>

        <button type="submit">update</button>
        <button type="reset">reset</button>
        <br>
    </form>

</div>



@endsection