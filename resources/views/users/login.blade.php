@extends('../layout/index')

@section('content')
    @if (session('error'))
       <div> {{session('error')}}</div>
    @endif   
    
    <div class="container_log_in">

            <form action="{{route('user.login')}} " method="post" class="login_form">
                @csrf
                <label for="email">email</label>
                <input type="email" id="email" name="email" required value="{{ old('email') }}">
                <label for="password">password</label>
                <input type="password" id="password" name="password" required value="{{ old('password' , '$2y$12$RUdUgTFVNhJnqBW/orNUQebrARq2ex03Tr2.XCqlcKgsPpUWyf8lC') }}">
                <button type="submit">log in</button>
            </form>
            <a href="{{route('user.create')}}">create an account</a>
            
    </div>


    <p>cassin.janie@example.org</p>
    <p>$2y$12$YfDLz8VBissOVM00UrOJfOYnpdQ0AnsOAbYrK0hj/LxeyrOl8W0ka</p>



    <style>
        nav .account {height: 110px;}
        nav .account:hover {height: 110px;}
    </style>
    
@endsection