@extends('../layout/index')

@section('content')



@foreach($users as $user)
        <div class="card">
            <ul>
                <li>{{$user->name}}</li>
                <li>{{$user->email}}</li>
                <li><img src={{ asset('img/'.$user->img)}} style = 'width:20px;border-radius:1000px; '></li>
                <li>{{$user->admin}}</li>
                <li>{{$user->gender}}</li>
            </ul>
            <br>
        </div>
    @endforeach


    <style>
        nav .home {height: 110px;}
        nav .home:hover {height: 110px;}
    </style>
    
@endsection