<x-Home-layout>
    <x-slot name="Home">

        {{-- <section
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
        </section> --}}

        <main>
            <form action="{{ route('search') }}" method="GET" id="searchForm" onsubmit="return false;">
                <div class="relative border-2 border-gray-100  rounded-lg">
                    <div class="absolute top-4 left-3">
                        <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                    </div>
                    <input
                        type="text"
                        id="searchInput"
                        name="searchInput"
                        class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                        placeholder="Search for Event..."
                    />
                </div>
                
            </form>
            <div class="container mx-auto">
                <div class="relative  flex justify-center">
                    <div id="serchResult" class="absolute w-full max-h-80 overflow-y-auto pl-10 pr-20 shadow rounded-lg focus:shadow focus:outline-none bg-white  bg-opacity-98">
                    </div>
                </div>
            </div>
           <div>
            <div class="lg:grid lg:grid-cols-6 gap-0 space-y-4 md:space-y-0 mx-2 my-6 ">

            @foreach($categories as $category)
                <div>
                    <form action="{{ route('filter',$category) }}">
                        <button class="btn bg-blue-400 rounded p-1 text-white">{{ $category->name }}</button>
                    </form>
                </div>
                 @endforeach
                </div>
           </div>
            
       

            <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4 " >
               
                @forelse ($Events as $Event)
                
                <div class="bg-gray-50 border border-gray-200 hover:p-2 shadow rounded p-6">
                    <div class="flex">
                        <div><img
                            class="hidden w-48 h-48 mr-6 md:block"
                            src="{{ asset('storage/' . $Event->image) }}"
                            alt=""
                        /></div>
                        
                        <div>
                            <h3 class="text-2xl">
                                <a href="">{{ $Event->title }}</a>
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
                    <form action="{{ route('Event.show',$Event) }}" >
                    
                   
                        @csrf
                        <button class="btn bg-green-500 rounded p-1 text-white">viw more</button>
                        </form>
                    
                    </div>
                </div>
                @empty
                     <div>
                        fuck you
                     </div>
                @endforelse

                
            </div>
            <div class="flex justify-center mt-6">{{ $Events->links() }}</div>
        </main>
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        $(document).ready(function () {
            var searchResult=$('#serchResult');
            $('#searchInput').on('input', function () {
                var searchTerm = $(this).val();
                
                $.ajax({
                    type: 'GET',
                    url: '{{ route("search") }}',
                    data: { searchInput: searchTerm }, // Pass the search input value to the server
                    dataType: 'json',
                    success: function (data) {
                       
                       
                        searchResult.empty();
        
                        if (data.length === 0) {
                            var cardHtml = `
                                    <div class="bg-gray-50 border border-gray-200 shadow rounded p-6">
                                        <div>No results found</div>

                                    </div>
                                `;
                            searchResult.append(cardHtml);
                        } else {
                            $.each(data, function (index, Event) {
                                var cardHtml = `
                                    <div class="  rounded flex flex-col justify-center border-y border-gray-300 p-4">
                                        <a class="text-center font-bold text-blue-300" href="{{ route('Event.show',$Event) }}">${Event.title}</a>
                                        <h5 class="text-center">${Event.description}</h5>

                                    </div>
                                `;
                                searchResult.append(cardHtml);
                                if(searchTerm ==""){
                                    searchResult.empty();
                                }
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
            

        });
        

      
    </script>
        
        
          
    </x-slot>

</x-Home-layout>
