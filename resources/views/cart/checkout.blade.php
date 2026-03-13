<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Finalizar Compra (Simulación)') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold mb-4">Resumen de tu pedido</h3>
                    @foreach($cart as $details)
                        <div class="flex justify-between mb-2 text-sm">
                            <span>{{ $details['name'] }} (x{{ $details['quantity'] }})</span>
                            <span>${{ number_format($details['price'] * $details['quantity'], 2) }}</span>
                        </div>
                    @endforeach
                    <div class="border-t mt-4 pt-4 flex justify-between font-bold text-xl">
                        <span>Total:</span>
                        <span class="text-indigo-600">${{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <h3 class="text-lg font-bold mb-4 italic text-orange-600">⚠ Módulo de Prueba</h3>
                    <form action="{{ route('cart.process') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <x-input-label for="card_name" value="Nombre en la tarjeta" />
                            <x-text-input id="card_name" name="card_name" type="text" class="block mt-1 w-full" placeholder="JUAN PEREZ" required />
                        </div>
                        <div>
                            <x-input-label for="card_number" value="Número de tarjeta" />
                            <x-text-input id="card_number" name="card_number" type="text" class="block mt-1 w-full" placeholder="1234123412341234" required />
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="expiry" value="Vencimiento" />
                                <x-text-input id="expiry" name="expiry" type="text" class="block mt-1 w-full" placeholder="MM/AA" required />
                            </div>
                            <div>
                                <x-input-label for="cvv" value="CVV" />
                                <x-text-input id="cvv" name="cvv" type="text" class="block mt-1 w-full" placeholder="123" required />
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-bold hover:bg-green-700 shadow-lg shadow-green-200 transition">
                            Confirmar Pago de ${{ number_format($total, 2) }}
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>