{{-- <nav class="flex justify-between items-center mb-4">
           
    <a href="index.html"
        ><img class="w-24" src="images/logo.png" alt="" class="logo"
    /></a>
    <ul class="flex space-x-6 mr-6 text-lg">
        @if (Route::has('login'))
        <div class=" sm:top-0 sm:right-0 p-6 text-right z-10">
            @auth
                @role('admin')
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @endrole
                @role('client')
                <x-nav-link :href="route('get_reservations')" :active="request()->routeIs('get_reservations')">
                    {{ __('My Reservations') }}
                </x-nav-link>
                @endrole
                @role('organosator')
                <a href="{{ url('/organisator') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @endrole
            @else
            
            <li>
                <a href="{{ route('login') }}" class="hover:text-laravel"
                    >class="hover:text-laravel"<i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a
                >
            </li>


                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}" class="hover:text-laravel"
                        ><i class="fa-solid fa-user-plus"></i> Register</a
                    >
                </li>
                @endif
            @endauth
        </div>
    @endif
        
       
    </ul>
</nav> --}}
<div class="container-xxl relative p-0">
    <nav x-data="{ open: false }" class="bg-gray-800 text-white px-4 py-3">
        <div class="flex items-center justify-between">
            <a href="#" class="text-2xl font-bold flex items-center">
                <i class="fa fa-calendar-alt me-3"></i><strong>Even</strong>TO
            </a>
           
            

            <div class="hidden lg:flex space-x-4">
                {{-- <a href="{{ route('/') }}" class="hover:text-gray-300">Home</a> --}}
               @auth
               @if(!request()->is('/'))
               <a href="{{ url('/') }}" class="nav-item nav-link">Home</a>
           @endif
               @role('admin')
               <a href="{{ url('/dashboard') }}" class="nav-item nav-link">Dashboard</a>
               @endrole
               @role('client')
               <a href="{{ route('get_reservations') }}" class="nav-item nav-link">My Reservations</a>
               @endrole
               @role('organosator')
               <a href="{{ url('/organisator') }}" class="nav-item nav-link">Dashboard</a>
               @endrole 
              
           
               <div class="group">
                <a href="#" class="group-hover:text-gray-300">{{ Auth::user()->name }}</a>
                <div class="hidden group-hover:block absolute  bg-gray-800 text-white p-2 space-y-2">
                    <a href="{{ route('profile.edit') }}">
                        Profile
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
    
                        <a class="hover:text-gray-300 block" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                           Log Out
                        </a>
                    </form> 
                    @if(Auth::user()->ascked_permission == false)
                    @role('client')
                        <form action="{{ route('asckPermission',['user' => Auth::user()]) }}"><button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-blue-400 text-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">asck organitation</button></form>
                         @endrole
                        @else
                        @role('organosator')
                        fuck you
                          @else  
                          waiting
                        @endrole
                        @endif
                </div>
            </div>
                @else
                <a href="{{ route('login') }}" class="hover:text-laravel"> <i class="fa-solid fa-arrow-right-to-bracket"></i> login</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="hover:text-laravel">Register</a>
                @endif
               @endauth
               
               
                {{-- <a href="{{ route('client') }}" class="hover:text-gray-300">Client</a> --}}
            </div>

            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>


    </nav>

    <div class="container-xxl py-5 bg-gray-800 text-white hero-header mb-5 " style="background-image: url('storage/EventsImg/b983c8a0bedde84961ec3593b5df9627.jpg');background-repeat: no-repeat;background-size: cover;">
        <div class="container my-5 py-5">
            <div class="lg:flex lg:items-center lg:justify-between">
                <div class="lg:w-6/12 text-center lg:text-lg-start ">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-4 lg:mb-6 animate__animated animate__slideInLeft">Explore Exciting Events with Us</h1>
                    
                    @auth
                    @role('admin')
                    <a href="{{ url('/dashboard') }}" class="nav-item nav-link">Dashboard</a>
                    @endrole
                    @role('client')
                    <a href="{{ url('/client') }}" class="nav-item nav-link">Dashboard</a>
                    @endrole
                    @role('organosator')
                    <a href="{{ url('/organisator') }}" class="nav-item nav-link">Dashboard</a>
                    @endrole   
                     @else
        
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary py-2 px-4">Register</a>
                        @endif</div>
                       
            </div>
            @endauth
                </div>
                <div class="lg:w-6/12 text-center lg:text-lg-end overflow-hidden">
                </div>
            </div>
        </div>
    </div>
</div>
