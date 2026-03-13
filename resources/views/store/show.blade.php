<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $product->name }}
            </h2>
            <a href="{{ route('store.index') }}" class="text-sm text-indigo-600 hover:underline">
                &larr; Volver al catálogo
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex flex-col md:flex-row gap-12">
                    
                    <div class="w-full md:w-1/2">
                        <div class="aspect-square rounded-2xl overflow-hidden bg-gray-100 border border-gray-100">
                            @if($product->image_path)
                                <img src="{{ asset('storage/' . $product->image_path) }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 italic">
                                    Sin imagen disponible
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 flex flex-col">
                        <div class="mb-6">
                            <span class="px-3 py-1 bg-indigo-100 text-indigo-700 text-xs font-bold uppercase rounded-full">
                                {{ $product->category->name }}
                            </span>
                            <h1 class="text-4xl font-extrabold text-gray-900 mt-4">{{ $product->name }}</h1>
                            <p class="text-3xl font-light text-gray-600 mt-2">${{ number_format($product->price, 2) }}</p>
                        </div>

                        <div class="prose prose-indigo mb-8">
                            <h3 class="text-sm font-bold text-gray-700 uppercase tracking-widest">Descripción</h3>
                            <p class="text-gray-600 leading-relaxed mt-2">
                                {{ $product->description ?? 'No hay una descripción detallada para este producto.' }}
                            </p>
                        </div>

                        <div class="mt-auto pt-6 border-t">
                            <div class="flex items-center justify-between mb-6">
                                <span class="text-sm {{ $product->stock > 0 ? 'text-green-600' : 'text-red-600' }} font-medium">
                                    {{ $product->stock > 0 ? '● En Stock (' . $product->stock . ' unidades)' : '● Agotado' }}
                                </span>
                            </div>

<form action="{{ route('cart.add', $product) }}" method="POST">
    @csrf
    <button type="submit" class="w-full bg-indigo-600 text-white py-4 rounded-xl font-bold text-lg hover:bg-indigo-700 transition flex items-center justify-center gap-2">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
        Añadir al Carrito
    </button>
</form>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>