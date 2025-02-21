@extends('../layout.index')

@section('content')

<div class="user_info_container">
    <img src="{{asset( 'img/'. $user->img)}}" alt="profaile" style="height: 100px" >
    <table>
        <tr>
            <td>Name :</td>
            <td>{{$user->name}}</td>
        </tr>
        <tr>
            <td>email :</td>
            <td>{{$user->email}}</td>
        </tr>
        <tr>
            <td>gender :</td>
            <td>{{$user->gender ? 'male' : "femal"}}</td>
        </tr>
        <tr>
            <td>created at :</td>
            <td>{{$user->created_at}}</td>
        </tr>
        <tr>
            <td>sold :</td>
            <td>{{$user->sold}}</td>
        </tr>
        <tr>
            <td>post :</td>
            <td>{{$user->is_admin ? "admin" : "user" }}</td>
        </tr>
        <tr>
            <td>bio :</td> 
            <td>dont forget the bio // add bio to migration </td> 
            {{-- <td>{{$user->bio ? "admin" : "user" }}</td> --}}
        </tr>
    </table>

</div>

@endsection