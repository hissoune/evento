
<x-Home-layout>
    <x-slot name="Home">
    <div class="p-8 mx-3 my-6 bg-white rounded shadow-md w-full">
        <h2 class="mb-4 text-3xl font-semibold text-center text-blue-500">{{ $Event->title }}</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="mb-4">
                <img src="{{ asset('storage/' . $Event->image) }}" alt="{{ $Event->title }}" class="w-full rounded-lg">
            </div>
            <div class="col-span-2">
                <p class="text-gray-700">{{ $Event->description }}</p>
                <p class="text-gray-600 mt-2">Date: {{ $Event->date }}</p>
                <p class="text-gray-600">Location: {{ $Event->location }}</p>
                <p class="text-gray-600">Number of Places: {{ $Event->number_places }}</p>
                <p class="text-gray-600">Status: {{ $Event->status }}</p>
            </div>
        </div>
        @auth
            
       
        @role('client')
        <div class="mt-8 text-center">
            <a href="{{ route('/') }}" class="text-blue-500 hover:underline"><< Back to Events</a>
        </div> 
        @endrole
        @role('admin')
        <div class="mt-8 text-center">
            <a href="{{ route('validate_event') }}" class="text-blue-500 hover:underline"> << Back to Events</a>
        </div> 
        @endrole
        @role('client')
                    @if( $Event->number_places >0)
                    <form action="{{ route('Reservations.store') }}" method="POST">
                    
                   
                        @csrf
                        <input type="number" name="Event_id" value="{{ $Event->id }}" hidden>
                        <button class="btn bg-green-500 rounded p-1 text-white">reserver</button>
                        </form>
                        @else
                        this event is full

                    @endif
                   
                        @endrole  
        @else

        @endauth
    </div>
    </x-slot>
</x-Home-layout>
