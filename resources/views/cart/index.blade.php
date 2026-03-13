<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Tu Carrito') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                @if(session('cart') && count(session('cart')) > 0)
                    <div class="space-y-4">
                        @foreach($cart as $id => $details)
                            <div class="flex items-center justify-between border-b pb-4">
                                <div class="flex items-center">
                                    <img src="{{ asset('storage/' . $details['image']) }}" class="w-16 h-16 object-cover rounded">
                                    <div class="ml-4">
                                        <h3 class="text-lg font-bold">{{ $details['name'] }}</h3>
                                        <p class="text-gray-600">${{ number_format($details['price'], 2) }} x {{ $details['quantity'] }}</p>
                                    </div>
                                </div>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf @method('DELETE')
                                    <input type="hidden" name="id" value="{{ $id }}">
                                    <button type="submit" class="text-red-500 hover:text-red-700">Eliminar</button>
                                </form>
                            </div>
                        @endforeach

                        <div class="mt-8 text-right">
                            <h3 class="text-2xl font-bold">Total: ${{ number_format($total, 2) }}</h3>
<a href="{{ route('cart.checkout') }}" class="mt-4 inline-block bg-green-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-green-700">
    Proceder al Pago
</a>
                        </div>
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-gray-500 text-lg">Tu carrito está vacío.</p>
                        <a href="{{ route('store.index') }}" class="mt-4 inline-block text-indigo-600 font-bold">Volver a la tienda</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>