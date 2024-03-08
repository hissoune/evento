<x-Home-layout>
    <x-slot name="Home">
<div class="p-3 my-6 grid grid-cols-3 grid-cols-1-sm  gap-2">
@foreach ($Reservatin_cl as $item)
<div class="max-w-sm rounded overflow-hidden shadow-lg bg-white">
    <img class="w-full h-48 object-cover" src="storage/{{ $item->Events->image }}" alt="Card Image">
    <div class="px-6 py-4">
        <div class="border-b border-black">
        <div class="font-bold text-xl mb-2">{{ $item->Events->title }}</div>
        
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
</div>
    </x-slot>
</x-Home-layout>