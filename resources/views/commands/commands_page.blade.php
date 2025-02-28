
@extends('../layout/index')
@section('content')
    <div class="commands_container">
        @foreach($commands as $command)

            @if($command->confirmed)
                <p style="background-color : green ;">{{$command->oner_id}} </p>
            @else
                <form class="notConfirmed" style="border : 1px solid red" >
                    <img src="{{asset('img/'.$command->user_img)}}" alt="profail" style="width:100px ; border-radius:100px" >
                    <p>{{$command->name}}</p>
                    <img src="{{asset('img/'.$command->product_img)}}" alt="profail" style="width:200px ; border-radius:10px" >
                    <p>{{$command->price}}</p>
                    <p>{{$command->title}}</p>
                    <button>confirm</button>

                </form>
            @endif
        @endforeach
    </div>
@endsection