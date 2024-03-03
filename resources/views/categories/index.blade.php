<x-app-layout>

<div class="relative overflow-x-auto my-6">
    <button id="ouvrirPopup"
                            class="w-20 px-4 py-2 mx-2 mt-4 text-white bg-[#387ADF] rounded-md  ">Add</button>

                        <div id="popup" class="fixed inset-0 flex items-center justify-center hidden"
                            style="margin-left:20% !important;">
                            <div class="max-w-md p-8 mx-3 bg-white rounded shadow-md">
                                <h2 class="mb-4 text-xl font-semibold">Formulaire d'insertion de CaTegorie
                                </h2>
                                <form action="{{ route('Categories.store') }}" method="post">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="categorie" class="block mb-2 font-medium text-gray-700">Categorie
                                            :</label>
                                        <input type="text" id="categorie" name="name"
                                            class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                                            placeholder="Entrez votre CaTegorie ">
                                        @error('categorie')
                                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                        class="px-20 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add
                                    </button>
                                </form>
                                <button id="fermerPopup"
                                    class="px-16 py-2 mt-4 text-white bg-red-500 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Fermer</button>
                            </div>
                        </div>
    {{-- <div><a href="{{ route('Categories.create') }}" class="btn bg-green-500 text-white p-1 rounded">add category</a></div> --}}

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

            <tr class="">
                <h3 class="text-center bg-white border-b border-gray-900 p-3 text-2xl">categories</h3>
            </tr>
            <tr>
                <th scope="col" class="px-6 py-3">
                    categoriy name
                </th>
                <th scope="col" class="px-6 py-3">
                    created at
                </th>
                
                <th scope="col" class="px-6 py-3 text-center">
                    actions
                  </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($categories as $item)
                
           
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $item->name }}
                </th>
                <td class="px-6 py-4">
                    {{ $item->created_at }}
                </td>
                
               
                <td class="px-6 py-4 flex justify-around">
                    <form action="{{ route('Categories.edit', $item) }}">
                        <button type="submit" class="btn bg-green-500 text-white rounded p-1">Edit</button>
                    </form>
                    
                  <form action="{{ route('Categories.destroy',$item) }}" method="post" >
                       @csrf
                       @method('delete')
                 
                    <button class="btn bg-red-500 text-white rounded p-1">delete</button>
                  </form>
                </td>
            
            @empty
            <td colspan="12"><h1 class="text-center">no categories</h1></td> 
        </tr>
            @endforelse
        </tbody>
    </table>
</div>
</x-app-layout>