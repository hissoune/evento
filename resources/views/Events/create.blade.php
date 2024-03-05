<x-app-layout>
   
<div  class="flex items-center justify-center w-full">
    <div class=" p-8 mx-3 my-6 bg-white rounded shadow-md w-full">
        <h2 class="mb-4 text-xl font-semibold">add a Event
        </h2>
        <form action="{{ route('Events.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="title" class="block mb-2 font-medium text-gray-700">title
                    :</label>
                <input type="text" id="title" name="title"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Entrez votre title ">
                @error('title')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="description" class="block mb-2 font-medium text-gray-700">description
                    :</label>
                <input type="text" id="description" name="description"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Entrez votre description ">
                @error('description')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="start_date" class="block mb-2 font-medium text-gray-700">start date
                    :</label>
                <input type="date" id="start_date" name="start_date"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Entrez votre start_date ">
                @error('start_date')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="end_date" class="block mb-2 font-medium text-gray-700">end date
                    :</label>
                <input type="date" id="end_date" name="end_date"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Entrez votre end_date ">
                @error('end_date')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="location" class="block mb-2 font-medium text-gray-700">location
                    :</label>
                <input type="text" id="location" name="location"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Entrez votre location ">
                @error('location')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="image" class="block mb-2 font-medium text-gray-700">image
                    :</label>
                <input type="file" id="image" name="image"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Entrez votre title ">
                @error('image')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="number_places" class="block mb-2 font-medium text-gray-700">number places
                    :</label>
                <input type="number" id="number_places" name="number_places"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Entrez votre number places ">
                @error('number_places')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="status" class="block mb-2 font-medium text-gray-700">status:</label>
                <select id="status" name="status"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                    <option value="manuel">manuel</option>
                    <option value="auto">auto</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="categories_id" class="block mb-2 font-medium text-gray-700">category:</label>
                <select id="categories_id" name="categories_id"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                    @foreach ($Categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
                @error('categories_id')
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit"
                class="px-20 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:bg-blue-600">Add
            </button>
        </form>
       
    </div>
</div>
</x-app-layout>