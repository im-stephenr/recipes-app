@php
use Illuminate\Http\Request;
@endphp

</div>

<nav>
    <div class="container">
        <div class="d-flex justify-content-center">
            <ul class="nav">
                <li class="nav-item"><a @class(['nav-link', 'fw-bold' => request()->path() == '/']) href="{{url('/')}}">Explore</a></li>
                @auth
                <li class="nav-item"><a @class(['nav-link', 'fw-bold' => request()->path() == 'my-recipes'])  href="{{url('/my-recipes')}}">Your Recipes</a></li>
                <li class="nav-item pt-1 ml-5">
                    <form action="{{route('logout')}}" method="POST" >
                        @csrf
                        @method('POST')
                        <button class="btn btn-info btn-xs p-1 text-danger logout-button" type="submit">Logout</button>
                    </form>
                </li>
                @else
                {{-- Using directive @class with condition logic basically saying if request path is explore then use the class fw-bold --}}
                <li class="nav-item"><a @class(['nav-link', 'fw-bold' => request()->path() == 'signup'])  href="{{route('signup')}}">Sign up</a></li>
                <li class="nav-item"><a @class(['nav-link', 'fw-bold' => request()->path() == 'login'])  href="{{route('login')}}">Login</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>