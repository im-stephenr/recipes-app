@props(['title'=>'Default']) {{-- WE SHOULD ALWAYS DECLARE THE PROPS USED ON OTHER FILES THAT ARE USING THE AppLayout class component --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }} | Recipes App</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header class="m-5 text-center">Food Recipes</header>

    <div class="container main-container">
        @auth
        <div class="col-md-12 text-center">
            <p>Welcome back <i>{{Auth::user()->name}}</i>, </p>
        </div>
        @endauth
        {{-- MENU --}}
        @include('layouts.includes.nav')
        {{-- Main content --}}
        <main class="px-5">
          {{$slot}}
        </main>
        <img class="bg-image" src="{{asset('images/bg2.png')}}" alt="">
        {{-- FOOTER --}}
        @include('layouts.includes.footer')
    </div>
</body>
</html>