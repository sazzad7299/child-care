<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js', 'themes/frontend') }}" defer></script>
    <script src="{{ asset('themes/frontend/js/all.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('css/app.css', 'themes/frontend') }}" rel="stylesheet">
    <link href="{{ asset('themes/frontend/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('themes/frontend/css/custom.css') }}" rel="stylesheet">
    
</head>
<body>
    <div id="app">
        <nav class="bg-white shadow-sm navbar navbar-expand-md navbar-light">
            <div class="container">
                
                @guest
                <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
                </a>
                @else
                <h2>Hi!{{ Auth::user()->name }}</h2>
                @endif
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="mr-auto navbar-nav">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="ml-auto navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('show_assignment')}}">Assignment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('showItem')}}">Item's</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('showOrders') }}" method="post">
                                @csrf
                                 <input type="hidden" name="user_id" value="{{Auth::user()->id }}" >
                                <input type="submit" value="Orders's" class="nav-link">
                            </form> 
                        </li>
            
                                            
                        <li class="nav-item">
                            <a class="nav-link"> <i class="fas fa-trophy"></i>
                      
                        @php( $currentDay = Carbon\Carbon::today()->format('l')=="Tuesday")                 
                            @if($currentDay)
                                @php($sum=\DB::table('std_assignments')->where('user_id', Auth::user()->id)
                                ->where('status','1')->sum('point')) 
                                @php(\DB::table('std_assignments')->where('user_id', Auth::user()->id)
                                ->where('status','1')->update(['point_sum'=>$sum]))
                            @endif

                            @php($TotalSum=\DB::table('std_assignments')->where('user_id', Auth::user()->id)
                            ->where('status','1')->max('point_sum'))
                            @if($TotalSum)
                               {{$TotalSum}}
                            @else
                                 0
                            @endif
                        
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" style="color:red; font-size:18px">
                                <em class="fas fa-sign-out-alt" ></em>{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>   
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="text-center">
                <h1 class="text-success">{{Session::get('success')}}</h1>
            </div>
            @yield('content')
        </main>
    </div>
</body>
</html>
