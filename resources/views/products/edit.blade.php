<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Editar: {{ $product->name }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700">Nombre</label>
                    <input type="text" name="name" value="{{ $product->name }}" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Precio</label>
                    <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="w-full border-gray-300 rounded-md shadow-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700">Categoría</label>
                    <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Actualizar Producto</button>
            </form>
        </div>
    </div>
</x-app-layout>