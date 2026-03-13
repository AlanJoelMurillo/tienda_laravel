<x-app-layout>
<x-slot name="header">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catálogo de Tecnología') }}
        </h2>

        <div class="flex items-center space-x-3">
            <a href="{{ route('orders.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                {{ __('Mis Pedidos') }}
            </a>

            <a href="{{ route('cart.index') }}" class="relative inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                {{ __('Carrito') }}
                
                @if(session('cart') && count(session('cart')) > 0)
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full border-2 border-white shadow-sm">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>
        </div>
    </div>
</x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-400 text-green-700 flex justify-between items-center shadow-sm rounded-r-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <a href="{{ route('cart.index') }}" class="text-sm font-bold underline hover:no-underline">Ir al carrito &rarr;</a>
                </div>
            @endif

            <div class="flex flex-col md:flex-row gap-8">
                
                <div class="w-full md:w-1/4">
                    <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100 sticky top-4">
                        <h3 class="font-bold text-gray-700 mb-4 uppercase text-xs tracking-wider">Categorías</h3>
                        <ul class="space-y-1">
                            <li>
                                <a href="{{ route('store.index') }}" class="block px-3 py-2 rounded-md text-sm {{ !request('category') ? 'bg-indigo-600 text-white font-bold' : 'text-gray-600 hover:bg-gray-100' }}">
                                    Todos los productos
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('store.index', ['category' => $category->slug]) }}" 
                                       class="block px-3 py-2 rounded-md text-sm {{ request('category') == $category->slug ? 'bg-indigo-600 text-white font-bold' : 'text-gray-600 hover:bg-gray-100' }}">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="w-full md:w-3/4">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @forelse($products as $product)
                            <div class="flex flex-col bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100 hover:shadow-lg transition-all duration-300">
                                
                                <div class="aspect-square w-full bg-gray-50 overflow-hidden border-b border-gray-50">
                                    @if($product->image_path)
                                        <img src="{{ asset('storage/' . $product->image_path) }}" 
                                             alt="{{ $product->name }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center bg-gray-100 text-gray-400">
                                            <span class="text-xs italic">Sin foto</span>
                                        </div>
                                    @endif
                                </div>
                                
                                <div class="p-4 flex flex-col flex-1">
                                    <span class="text-[10px] font-bold text-indigo-500 uppercase tracking-tight">{{ $product->category->name }}</span>
                                    <h4 class="font-bold text-gray-800 text-sm mt-1 line-clamp-2 h-10">{{ $product->name }}</h4>
                                    
                                    <div class="mt-4 flex items-center justify-between">
                                        <span class="text-lg font-black text-gray-900">${{ number_format($product->price, 2) }}</span>
                                        <a href="{{ route('store.show', $product) }}" class="p-2 bg-gray-900 text-white rounded-lg hover:bg-indigo-600 transition" title="Ver detalles">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full py-20 text-center bg-white rounded-xl border border-gray-100">
                                <p class="text-gray-400 text-sm">No hay productos disponibles por ahora.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="mt-10">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>