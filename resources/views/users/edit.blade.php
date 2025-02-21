@extends('../layout/index')

@section('content')


    <form action="{{route('user.update' , $user ) }}" class="profail_container_form" enctype ='multipart/form-data' method='POST' >

        @csrf
        @method('PUT')

        <label for='name_input' >name</label>
        <input type='text' id='name_input' name="name_input" value="{{old('name_input' ,  $user->name )}}">

        @error(('name_input'))
        <div class="input_error">{{$message}}</div>
        @enderror

        <br>
        <label for='password_input' >password</label>
        <input type='password' id='password_input' name="password_input" value="{{old('password_input' ,  $user->password )}} ">

        @error(('password_input'))
            <div class="input_error">{{$message}}</div>
        @enderror

        <br>
        <label for='img_input' >img</label>
        <input type='file' id='img_input' name="img_input">

        @error(('img_input'))
        <div class="input_error">{{$message}}</div>
        @enderror
    
        <br>
        <label for='keep_img' >keep the profaile img</label>
        <input type='checkbox' id='keep_img' name="keep_img" checked>

        @error(('img_input'))
        <div class="input_error">{{$message}}</div>
        @enderror

        <br>
        <button type="submit" >update</button>
    </form>
   


@endsection
