@extends('../layout/index')


@section('content')

<p style="background-color : green">{{session('deleted_success')}}</p>
<p style="background-color : rgb(128, 58, 0)">{{session('deleted_error')}}</p>


<div class="container">
        <a href="{{route('product.create')}}">create project</a>
        <br>
        <a href="{{route('product.index')}}">explore</a>
        <br>
        <a href="{{route('product.purcheses')}}">my one pictur</a>
        <br>
        {{-- <a href="{{route('product.purcheses')}}">my one product</a> --}}
</div>

@endsection
