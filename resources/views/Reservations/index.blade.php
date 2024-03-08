<x-app-layout>
    <div class="p-3 my-6 grid grid-cols-3 grid-cols-1-sm  gap-2">
            @forelse ($reservations as $item)
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                <img class="w-full h-48 object-cover" src="storage/{{ $item->Events->image }}" alt="Card Image">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $item->Events->title }}</div>
                    
                    <div class="grid grid-cols-2 gap-2">
                    <p class="text-gray-700 text-base">
                        {{ $item->Events->date }}
                    </p>
                    <p class="text-gray-700 text-base">
                        {{ $item->Events->description }}
                    </p>
                    <p class="text-gray-700 text-base">
                        {{ $item->Events->location }}
                    </p>
                    <p class="text-gray-700 text-base">
                        {{ $item->Events->number_places }}
                    </p>
                </div>
                </div>
                <div class="px-6 py-4 grid grid-cols-3 gap-2">
                    
                    <form action="{{ route('Reservation.update',$item) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit"><span class="inline-block bg-green-500 rounded-full p-1 px-1  text-sm font-semibold text-white mr-2">Accept</span></button>
                    </form>                    
                   

                    <form action="{{ route('Reservation.destroy',$item) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit"><span class="inline-block bg-red-500 rounded-full  p-1 px-1 text-sm font-semibold text-white mr-2">refiouse</span></button>
                    </form>                        </div>
            </div>
            @empty
                
           <div class="p-3 bg-yellow-700 ">
            <h5>there is no reservations to accepte or delete</h5>

           </div>
            @endforelse
        
    </div>
</x-app-layout>
