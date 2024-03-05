<x-app-layout>

    <div class="relative overflow-x-auto my-6">
        
        <div><a href="{{ route('Events.create') }}" class="btn bg-green-500 text-white p-1 rounded">add category</a></div>
    
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    
                <tr class="">
                    <h3 class="text-center bg-white border-b border-gray-900 p-3 text-2xl">categories</h3>
                </tr>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Event title
                    </th>
                    
                    <th scope="col" class="px-6 py-3">
                        Event start date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Event end date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Event location
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Event image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Event number_places
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Event categorie
                    </th>
                    <th scope="col" class="px-6 py-3">
                        validated
                    </th>
                  
                    
                    <th scope="col" class="px-6 py-3 text-center">
                        actions
                      </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($Events as $item)
                    
               
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{ $item->title }}
                    </th>
                    
                    <td class="px-6 py-4">
                        {{ $item->start_date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->end_date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->location }}
                    </td>
                    <td class="px-6 py-4">
                        <img src="storage/{{ $item->image }}" width="70" alt="Event image">
                        
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->number_places }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $item->categorie->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ ($item->validated)?'vlidated':'waiting' }}
                    </td>
                    <td class="px-6 py-4 flex justify-around">
                        <form action="{{ route('Events.edit', $item) }}">
                            <button type="submit" class="btn bg-green-500 text-white rounded p-1">Edit</button>
                        </form>
                        
                      <form action="{{ route('Events.destroy',$item) }}" method="post" >
                           @csrf
                           @method('delete')
                     
                        <button class="btn bg-red-500 text-white rounded p-1">delete</button>
                      </form>
                    </td>
                
                @empty
                <td colspan="12"><h1 class="text-center">no Events</h1></td> 
            </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    </x-app-layout>