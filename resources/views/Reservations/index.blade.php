<x-app-layout>
    <div class="p-3 my-6 grid grid-cols-3 grid-cols-1-sm  gap-2">
        @if (isset($reservations))
            @forelse ($reservations as $item)
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                <img class="w-full h-48 object-cover" src="storage/{{ $item->Events->image }}" alt="Card Image">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">{{ $item->Events->title }}</div>
                    <p class="text-gray-700 text-base">
                        {{ $item->Events->description }}
                    </p>
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
        @elseif(isset($Reservatin_cl))
            @foreach ($Reservatin_cl as $item)
                <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
                    <img class="w-full h-48 object-cover" src="storage/{{ $item->Events->image }}" alt="Card Image">
                    <div class="px-6 py-4">
                        <div class="border-b border-black">
                        <div class="font-bold text-xl mb-2">{{ $item->Events->title }}</div>
                        <p class="text-gray-700 text-base">
                          
                            {{ $item->Events->description }}
                        </p>
                    </div>
                        <div class="grid grid-cols-2 gap-2">
                        <p class="text-gray-700 text-base">
                           start date: {{ $item->Events->start_date }}
                        </p>
                        <p class="text-gray-700 text-base">
                          end date:  {{ $item->Events->end_date }}
                        </p>
                        <p class="text-gray-700 text-base">
                          location:  {{ $item->Events->location }}
                        </p>
                        <p class="text-gray-700 text-base">
                           number peaple: {{ $item->Events->number_places }}
                        </p>
                    </div>
                    </div>
                    <div class="w-full px-6 py-4 {{ $item->accepted ? 'grid-cols-3' : 'grid-cols-2' }} grid">
                       

                        @if ($item->accepted)
                        <div>
                            <form action="{{ route('generate_pdf', $item) }}" method="post">
                                @csrf
                                <button type="submit">
                                    <span class="inline-block bg-green-500 rounded-full p-1 px-1 text-sm font-semibold text-white mr-2">
                                        Get Ticket PDF
                                    </span>
                                </button>
                            </form>
                        </div>
                    <div>                    
                        <form action="{{ route('get_tiket_byEmail',$item) }}" method="POST">
                            @csrf
                            <button type="submit"><span class="inline-block bg-blue-500 rounded-full p-1   text-sm font-semibold text-white mr-2">get by email</span></button>
                        </form> 
                    </div>
                        @else
                        <div class="cols-2">
                        wating the organisator to accept ...
                      </div>
                        @endif
                              
                        <form action="{{ route('Reservations.destroy',$item) }}" method="POST">
                            @csrf
                        @method('delete')
                            <button type="submit"><span class="inline-block bg-red-500 rounded-full  p-1 px-1 text-sm font-semibold text-white mr-2">cancel</span></button>
                        </form>                        </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
