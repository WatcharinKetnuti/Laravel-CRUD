<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Journey</title>
        <link href="{{asset('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
        <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{url('style.css')}}">



    </head>


    <header class="bg-blue-500 py-4 bg-color2-4">
        <div class="container mx-auto flex justify-between items-center">
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="{{ url('/') }}" class=" header-text">Home</a></li>
                    @if (Auth::user()==true)
                    @if (Auth::user()->admin == 1)
                    <li><a href="{{ url('/categories/add') }}" class="header-text">Landmark Add</a></li>
                    {{-- <li><a href="{{ url('/product/add/view') }}" class="header-text">Product Add</a></li> --}}
                    @endif
                    @endif
                    {{-- <li><a href="#" class="text-white hover:text-gray-300">About</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">Contact</a></li> --}}
                </ul>
            </nav>

            <nav>
                <ul class="flex space-x-4">
                    @if (Auth::user()==false)
                    <li><a href="{{ url('/login') }}" class="header-text">Login</a></li>
                    <li><a href="{{ url('/register') }}" class="header-text">Register</a></li>
                    @else
                    <li><a  class="header-text-none">{{Auth::user()->name}}</a></li>
                    <li><a href="{{ url('/logout') }}" class="header-text">Logout</a></li>
                    @endif
                </ul>
            </nav>

        </div>
    </header>


<body class="bg-gray-100">
    <div class="">

        @yield('content')

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.2/dist/axios.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('vendor/aos/aos.js')}}"></script>
    <script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @stack('script')
</body>


</html>
