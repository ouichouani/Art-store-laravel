<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href={{asset('style/style.css')}}>
    @yield('style')   {{-- hadi bach n9ad style dyal kola page bo7dha --}}
    <title>Art store</title>
</head>

<body> 
    <header>
        @include('../parties.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('../parties.footer')
    </footer>
    
    <script src= {{asset('script.js')}} ></script>
</body>
</html>