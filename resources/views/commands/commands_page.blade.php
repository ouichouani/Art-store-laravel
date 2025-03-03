
@extends('../layout/index')
@section('content')
    <div class="commands_container">
        @foreach($commands as $command)

            @if($command->confirmed)
                <p style="background-color : green ;">{{$command->oner_id}} </p>
            @else
                <form action="{{route('product.show' ,$command->product_id )}}" method="GET" onclick="submit()" class="notConfirmed" style="border : 1px solid red ; background-color: rgba(248, 149, 0, 0.358)" >
                    <img src="{{asset('img/'.$command->product_img)}}" alt="profail" style="width:200px ; border-radius:10px" >
                    <p>{{$command->price}}</p>
                    <p>{{$command->title}}</p>
                </form>
            
                <form class="vendor" onclick= submit() action="" style="background-color: rgba(255, 0, 0, 0.51)" >
                    <img src="{{asset('img/'.$command->user_img)}}" alt="profail" style="width:100px ; border-radius:100px" >
                    <p>{{$command->name}}</p>
                </form>
                <hr>
                <form action="{{route('commands.validation' , $command->command_id)}}" method="POST">
                    @csrf
                    <button type="submit">confirm command</button>
                </form>

                <form action="{{route('commands.destroy' , $command->command_id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit">refuse command</button>
                </form>
                    
            @endif
        @endforeach
    </div>
@endsection