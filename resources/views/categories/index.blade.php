<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Categorías') }}</h2>
            <a href="{{ route('categories.create') }}" class="bg-gray-800 text-white px-4 py-2 rounded-md text-xs uppercase tracking-widest font-semibold hover:bg-gray-700 transition">+ Nueva Categoría</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full divide-y divide-gray-200 border">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Slug</th>
                            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-6 py-4">{{ $category->name }}</td>
                                <td class="px-6 py-4 text-gray-500">{{ $category->slug }}</td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600 hover:underline">Editar</a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar categoría? Esto podría fallar si tiene productos asociados.')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Borrar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>