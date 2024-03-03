<x-app-layout>
  <x-slot name="slot">
    <div class="max-w-md mx-auto my-10 bg-white p-6 rounded-md shadow-md">
        <h2 class="text-xl font-semibold mb-4">Modify Category</h2>

        <form action="{{ route('Categories.update', $Category) }}" method="post">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Category Name</label>
                <input type="text" name="name" id="name" value="{{ $Category->name }}" class="mt-1 p-2 border rounded-md w-full">
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Update Category
                </button>
            </div>
        </form>
    </div>
  </x-slot>
</x-app-layout>