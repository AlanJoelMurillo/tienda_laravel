<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Historial de Pedidos') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-6">
                @forelse($orders as $order)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100">
                        <div class="flex justify-between items-center border-b pb-4 mb-4">
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Orden #</p>
                                <h3 class="text-lg font-black text-indigo-600">{{ $order->order_number }}</h3>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-500 uppercase font-bold tracking-wider">Fecha</p>
                                <p class="text-sm font-medium">{{ $order->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            @foreach($order->items as $item)
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600 italic">
                                        {{ $item->product->name }} (x{{ $item->quantity }})
                                    </span>
                                    <span class="font-mono">${{ number_format($item->price * $item->quantity, 2) }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-4 pt-4 border-t flex justify-between items-center">
                            <span class="px-2 py-1 bg-green-100 text-green-700 text-[10px] font-bold uppercase rounded">
                                {{ $order->status }}
                            </span>
                            <p class="text-xl font-extrabold text-gray-900">
                                Total: ${{ number_format($order->total_amount, 2) }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="bg-white p-12 text-center rounded-lg shadow-sm">
                        <p class="text-gray-500">Aún no has realizado ninguna compra.</p>
                        <a href="{{ route('store.index') }}" class="text-indigo-600 font-bold hover:underline mt-2 inline-block">Ir a la tienda</a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>