<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-white p-12 rounded-2xl shadow-sm">
                <div class="flex justify-center mb-6 text-green-500">
                    <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h1 class="text-3xl font-black text-gray-900 mb-2">¡Pago Realizado con Éxito!</h1>
                <p class="text-gray-500 mb-8">Gracias por tu compra simulada. No se ha realizado ningún cargo real a tu tarjeta.</p>
                <a href="{{ route('store.index') }}" class="bg-indigo-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-indigo-700 transition">
                    Volver a la Tienda
                </a>
            </div>
        </div>
    </div>
</x-app-layout>