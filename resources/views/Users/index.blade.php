<x-app-layout>
   ffffff
  
   <x-slot name="slot">
        
    <div class="relative overflow-x-auto my-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
               
                <tr class="">
                    <h3 class="text-center bg-white border-b border-gray-900 p-3 text-2xl">Users ascked permission</h3>
                </tr>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        user name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3">
                       email verifide
                    </th>
                    <th scope="col" class="px-6 py-3">
                      ascked
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        actions
                      </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($user_ascked as $item)
                    
               
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{ $item->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ ($item->email_verified_at)?'yes':'no' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ ($item->ascked_permission)?'yes':'no' }}
                    </td>
                   
                    <td class="px-6 py-4 flex justify-around">
                      <form action="{{ route('refiouse_permission',$item) }}" method="POST">
                        @csrf
                        @method('put')
                        <button class="btn bg-red-500 text-white rounded p-1">refiouse permission</button>
                      </form>
                      <form action="{{ route('give_permission',$item) }}" method="post" >
                           @csrf
                           @method('put')
                     
                        <button class="btn bg-green-500 text-white rounded p-1">Acsept permission</button>
                      </form>
                    </td>
                
                @empty
                <td colspan="12"><h1 class="text-center">no users ascks</h1></td> 
            </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="relative overflow-x-auto my-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
               
                <tr class="">
                    <h3 class="text-center bg-white border-b border-gray-900 p-3 text-2xl">clients</h3>
                </tr>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        user name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3">
                       email verifide
                    </th>
                    <th scope="col" class="px-6 py-3">
                      reservations
                    </th>
                    <th scope="col" class="px-6 py-3">
                        actions
                      </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $item)
                    
                
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{ $item->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ ($item->email_verified_at)?'yes':'no' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ ($item->email_verified_at)?'yes':'no' }}
                    </td>
                   
                    <td class="px-6 py-4">
                      <form action="" method="POST">
                         @csrf
                         @method('delete')
                        <button class="btn bg-red-500 text-white rounded p-1">delet this client</button>
                      </form>
                    </td>
                </tr>
                @empty
                   <td colspan="12"><h1 class="text-center">no clients</h1></td> 
            </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    

    
    <div class="relative overflow-x-auto my-6">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
               
                <tr class="">
                    <h3 class="text-center bg-white border-b border-gray-900 p-3 text-2xl">organisators</h3>
                </tr>
                <tr>
                    <th scope="col" class="px-6 py-3">
                        user name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3">
                       email verifide
                    </th>
                    <th scope="col" class="px-6 py-3">
                      evenments
                    </th>
                    <th scope="col" class="px-6 py-3">
                        actions
                      </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($organisator as $item)
                    
                
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       {{ $item->name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $item->email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ ($item->email_verified_at)?'yes':'no' }}
                    </td>
                    <td class="px-6 py-4">
                        {{ ($item->email_verified_at)?'yes':'no' }}
                    </td>
                   
                    <td class="px-6 py-4">
                      <form action="" method="POST">
                         @csrf
                         @method('delete')
                        <button class="btn bg-red-500 text-white rounded p-1">delet this organisator</button>
                      </form>
                    </td>
                </tr>
                @empty
                   <td colspan="12"><h1 class="text-center">no organisators</h1></td> 
            </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
        </x-slot>
</x-app-layout>
