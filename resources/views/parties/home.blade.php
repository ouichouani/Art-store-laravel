@extends('../layout/index')


@section('content')

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
