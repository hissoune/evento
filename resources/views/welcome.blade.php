<x-Home-layout>
    <x-slot name="Home">


{{--         
<form class="max-w-lg mx-auto mt-6 ">
    <div class="flex ">
        <label for="search-dropdown" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Your Email</label>
       
        <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20  bg-gray-50 rounded border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search for event ..." required />

        <div class="relative w-full">
            <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-blue-500 bg-blue-700 rounded-e-lg border border-blue-700  focus:ring-4 rounded focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
                <span class="sr-only">Search</span>
            </button>
        </div>
    </div>
</form>

        
        
        <section class=" w-full mt-6 container px-6 flex justify-around">
            @forelse ($Events as $Event)
                <div class="mb-8 w-full md:w-1/2 lg:w-1/2 xl:w-1/3 p-4">
                    <div class="bg-white rounded-lg overflow-hidden shadow-md">
                        <img src="{{ asset('storage/' . $Event->image) }}" alt="{{ $Event->title }}" width="200" class=" object-cover object-center">
                        
                        <div class="p-4">
                            <h2 class="text-xl font-semibold  text-blue-500 mb-2">{{ $Event->title }}</h2>
                            <p class="text-gray-700">{{ $Event->description }}</p>
                            <p class="text-gray-600 mt-2">Date: {{ $Event->date }}</p>
                            <p class="text-gray-600">Location: {{ $Event->location }}</p>
                            <p class="text-gray-600">Number of Places: {{ $Event->number_places }}</p>
                            <p class="text-gray-600">Status: {{ $Event->status }}</p>
                        </div>
                    </div>
                    <div>
                        @auth
                        @role('client')
                        <form action="{{ route('Reservations.store') }}" method="POST">
                        @endrole
                        @role('organosator')
                        <form action="{{ route('Reservation.store') }}" method="POST">
                        @endrole
                            @csrf
                            <input type="number" name="Event_id" value="{{ $Event->id }}" hidden>

                            <label for="num_seet">number seetes</label>
                            <input type="number" name="num_seet" id="num_seet">
                            <button class="btn bg-green-500 rounded p-1 text-white">reserver</button>
                            </form>  
                        @endauth
                    </div>
                </div>
            @empty
                <div class="bg-red-100 w-full border text-center border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <h1>There is no result with this search</h1>
                </div>
            @endforelse
        </section> --}}


        <section
            class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4"
        >
            <div
                class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
                style="background-image: url('images/laravel-logo.png')"
            ></div>

            <div class="z-10">
                <h1 class="text-6xl font-bold uppercase text-white">
                    Even<span class="text-black">TO</span>
                </h1>
                <p class="text-2xl text-gray-200 font-bold my-4">
                    Find your favorit Event
                </p>
               
            </div>
        </section>

        <main>
            <!-- Search -->
            <form action="">
                <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                    <div class="absolute top-4 left-3">
                        <i
                            class="fa fa-search text-gray-400 z-20 hover:text-gray-500"
                        ></i>
                    </div>
                    <input
                        type="text"
                        name="search"
                        class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                        placeholder="Search Laravel Gigs..."
                    />
                    <div class="absolute top-2 right-2">
                        <button
                            type="submit"
                            class="h-10 w-20 text-white rounded-lg bg-red-500 hover:bg-red-600"
                        >
                            Search
                        </button>
                    </div>
                </div>
            </form>

            <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 " >
               
                @forelse ($Events as $Event)
                
                <div class="bg-gray-50 border border-gray-200 shadow rounded p-6">
                    <div class="flex">
                        <div><img
                            class="hidden w-48 h-48 mr-6 md:block"
                            src="{{ asset('storage/' . $Event->image) }}"
                            alt=""
                        /></div>
                        
                        <div>
                            <h3 class="text-2xl">
                                <a href="show.html">{{ $Event->title }}</a>
                            </h3>
                            <div class="text-xl flex  mb-4">
                                Location: <p class="font-bold">  {{ $Event->location }}</p> 
                            </div>
                            <ul class="flex justify-around">
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                {{ $Event->start_date }}
                                </li>
                                
                               
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                {{ $Event->end_date }}
                                </li>
                            </ul>
                            <div class="my-3">
                            <ul class="flex">
                                <li
                                    class="py-1 px-3 mr-2"
                                >
                                type reservation: <p class="font-bold"> {{ $Event->status }}</p>
                                </li>
                                
                               
                                <li
                                    class="py-1 px-3 mr-2 "
                                >
                                Number of Places: <p class="font-bold"> {{ $Event->number_places }}</p>
                                
                                </li>
                            </ul>
                        </div>
                            
                        </div>
                    </div>
                  <div class="flex justify-end">
                    @role('client')
                    <form action="{{ route('Reservations.store') }}" method="POST">
                    
                   
                        @csrf
                        <input type="number" name="Event_id" value="{{ $Event->id }}" hidden>
                        <button class="btn bg-green-500 rounded p-1 text-white">reserver</button>
                        </form>
                        @endrole  
                    </div>
                </div>
                @empty
                     <div>
                        fuck you
                     </div>
                @endforelse
            </div>
        </main>

    </x-slot>
</x-Home-layout>
