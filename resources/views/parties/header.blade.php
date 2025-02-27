
    <header>
        <div class="header_container">
            <h1 class="header_title" ><span>Art Store</span></h1>
        </div>
        <nav>
            
            <a href='/' title="home" class="home">
                {!! file_get_contents(public_path('svg/home.svg')) !!}
            </a>
            {{-----------------------------------------------------}}
            @if(Auth::check())
            <a href={{route('user.show' , Auth::user())}} title ="account" class="account">
                {!! file_get_contents(public_path('svg/account.svg')) !!}
            </a>          
            @else
            <a href={{route('LoginFrom')}} title ="account" class="account">
                {!! file_get_contents(public_path('svg/account.svg')) !!}
            </a>
            @endif
            {{-----------------------------------------------------}}
            
            <a href={{route('product.index')}} title ="my products" class="my_products">
                {!! file_get_contents(public_path('svg/store.svg')) !!}
            </a>
            {{-- <a href={{route('sing_up')}} title ="my commands" class="my_commands" >
                {!! file_get_contents(public_path('svg/paper.svg')) !!}
            </a>
            <a href={{route('account')}} title ="my purcheses" class="my_purcheses">
                {!! file_get_contents(public_path('svg/basket.svg')) !!} --}}
            </a>
        </nav>
    
    </header>

    