@extends('../layout/index')

@section('content')

   

        <h1>hello user</h1>
        <form action="{{route("user.store")}}" method="post" enctype="multipart/form-data">


            @csrf

            <label for="name">name</label>
            <input  type="text" id="name" name="name" value="{{old('name')}}" >
            @error('name')
                <div class="error_input">{{$message}}</div>
            @enderror
            <br>

            <label for="email">email</label>
            <input  type="text" id="email" name="email" value="{{old('email')}}" >
            @error('email')
            <div class="error_input">{{$message}}</div>
            @enderror
            <br>

            <label for="password">password</label>
            <input  type="password" id="password" name="password" value="{{old('password')}}" >
            @error('password')
            <div class="error_input">{{$message}}</div>
            @enderror
            <br>

            <label for="confirm_password">confirm password</label>
            <input  type="password" id="password_confirmation" name="password_confirmation">
            <br>

            <label for="img">profail image</label>
            <input type="file" id="img" name="img" value="{{old('img')}}" >
            @error('img')
            <div class="error_input">{{$message}}</div>
            @enderror
            <br>

            <label for="gender">gender</label>
            <span>male</span>
            <input type="radio" name="gender" id="gender" value='1' checked  >
            <span>female</span>
            <input type="radio" name="gender" id="gender" value='0'>
            <br>

            <a href="{{route('LoginFrom')}}">login</a>
            <br>
            <button type="submit">create</button>
        </form>

        {{-- <form action="{{route('showLoginFrom')}}" method='get'>
            @csrf
            <button type="submit">login</button>
        </form> --}}


        {{-- <div class="description_of_web_sit">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique aspernatur ullam blanditiis! Dolores officia odit nisi autem provident sed explicabo deleniti. Delectus officiis aspernatur temporibus ipsa explicabo harum libero dolorem.
        </div> --}}

    {{-- @endif --}}



    <style>
        nav .account {height: 110px;}
        nav .account:hover {height: 110px;}
    </style>
    
@endsection