@extends("../layout/index")

@section('content')
<div class="container">

    <div class="oner" style="background-color: aquamarine">
        <img src="{{asset("img/" . $user->img)}}" alt="" style="width :40px">
        <p class="name">{{$user->name}}</p>
        <p class="email">{{$user->email}}</p>
    </div>

    <form action="{{route('product.store')}}" enctype="multipart/form-data" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        <label for="title">title</label>
        <input type="text" name="title" id="title" value="{{old("title")}}">
        @error('title')
        <p class="error_input" style="color: red">{{$message}}</p>
        @enderror
        <br>

        <label for="price">price</label>
        <input type="number" name="price" id="price" value="{{old("price")}}"> 
        @error('price')
        <p class="error_input" style="color: red">{{$message}}</p>
        @enderror
        <br>

        <label for="description">description</label>
        <textarea name="description" id="description" cols="30" rows="10" placeholder="write the project description">{{old("description")}}</textarea>
        @error('description')
        <p class="error_input" style="color: red">{{$message}}</p>
        @enderror
        <br>

        <label for="img">your project</label>
        <input type="file" name="img" id="img" value="{{old("img")}}">
        @error('img')
        <p class="error_input" style="color: red">{{$message}}</p>
        @enderror
        <br>

        <button type="submit">create</button>
        <button type="reset">reset</button>
        <br>
    </form>

</div>



@endsection