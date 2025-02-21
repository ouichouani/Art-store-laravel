@extends('../layout/index')

@section('style')
    <link rel="stylesheet" href="{{asset('style/profaile_style.css')}}">
@endsection

@section('content')

    @if(session('success'))
        <script>
            alert('the update is success')         
        </script>
    @endif
    
    <div class="profail_container" id="profail_container">

        <div class="img_container">
            <img src="{{asset('img/'.$user->img) }}"alt="" id='profail_container_img'>
        </div>
        <div class="profail_container_info">
            <h1>{{($user->gender ? "Mr " : "Ms ") . $user->name }}</h1>
            <h3>{{$user->email}}</h3>

            @if(session()->get('user_login') == $user)

            <form action= "{{route('user.edit' , $user)}}" class="profail_container_update" id="profail_container_update_button"> 
                @csrf
                <button>update</button>
            </form>
            <form action="{{route('user.logout')}}"  method="POST"  class="profail_container_update" id="profail_container_update_button"> 
                @csrf
                <button>log out</button>
            </form>
            <a href="{{route('user.info' , $user)}}"class="more_info" title="more info">
                {!!file_get_contents(public_path('svg/more.svg')) !!}
            </a>

            @endif
        </div>
    </div>



    <style>
        nav .account {height: 110px;}
        nav .account:hover {height: 110px;}
    </style>
    
@endsection