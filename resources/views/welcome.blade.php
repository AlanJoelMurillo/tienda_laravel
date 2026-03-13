<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mi Tienda Online | Bienvenido</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-gray-50 dark:bg-[#0a0a0a] text-gray-900 dark:text-gray-100 antialiased">
        
        <header class="w-full p-6 flex justify-between items-center max-w-7xl mx-auto">
            <div class="text-2xl font-bold text-[#f53003]">
                SHOP<span>LOGO</span>
            </div>

            @if (Route::has('login'))
                <nav class="flex gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-5 py-2 bg-[#f53003] text-white rounded-md font-medium">Ir a la Tienda</a>
                    @else
                        <a href="{{ route('login') }}" class="px-5 py-2 border border-gray-300 dark:border-gray-700 rounded-md hover:bg-gray-100 dark:hover:bg-gray-800 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-5 py-2 bg-[#f53003] text-white rounded-md font-medium hover:bg-[#d42a02] transition">Registrarse</a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        <main class="flex flex-col items-center justify-center min-h-[80vh] text-center px-6">
            <h1 class="text-5xl lg:text-7xl font-extrabold mb-6 tracking-tight">
                La mejor tecnología <br> <span class="text-[#f53003]">a un solo clic.</span>
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400 max-w-2xl mb-10">
                Explora nuestro catálogo exclusivo de componentes y periféricos. Calidad garantizada y envíos a todo el país. 
                <span class="block mt-2 font-semibold">Inicia sesión para ver precios y comprar.</span>
            </p>

            <div class="flex gap-4">
                <a href="{{ route('login') }}" class="px-8 py-4 bg-[#f53003] text-white text-lg rounded-full font-bold shadow-lg hover:shadow-[#f5300333] hover:-translate-y-1 transition-all">
                    Entrar a la tienda
                </a>
                <a href="#info" class="px-8 py-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full font-bold hover:bg-gray-50 transition">
                    Saber más
                </a>
            </div>

            <div class="mt-20 grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl w-full opacity-50 grayscale hover:grayscale-0 transition-all duration-700">
                <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
                    <div class="h-40 bg-gray-100 dark:bg-gray-800 rounded-xl mb-4 flex items-center justify-center italic text-gray-400">Imagen Producto 1</div>
                    <div class="h-4 w-3/4 bg-gray-200 dark:bg-gray-700 rounded mb-2"></div>
                    <div class="h-4 w-1/2 bg-gray-100 dark:bg-gray-800 rounded"></div>
                </div>
                <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800 scale-110 border-[#f5300333]">
                    <div class="h-40 bg-gray-100 dark:bg-gray-800 rounded-xl mb-4 flex items-center justify-center italic text-gray-400">Imagen Producto 2</div>
                    <div class="h-4 w-3/4 bg-gray-200 dark:bg-gray-700 rounded mb-2"></div>
                    <div class="h-4 w-1/2 bg-gray-100 dark:bg-gray-800 rounded"></div>
                </div>
                <div class="bg-white dark:bg-gray-900 p-8 rounded-2xl shadow-sm border border-gray-100 dark:border-gray-800">
                    <div class="h-40 bg-gray-100 dark:bg-gray-800 rounded-xl mb-4 flex items-center justify-center italic text-gray-400">Imagen Producto 3</div>
                    <div class="h-4 w-3/4 bg-gray-200 dark:bg-gray-700 rounded mb-2"></div>
                    <div class="h-4 w-1/2 bg-gray-100 dark:bg-gray-800 rounded"></div>
                </div>
            </div>
        </main>

        <footer class="py-12 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} {{ config('app.name') }}. Todos los derechos reservados.
        </footer>
    </body>
</html>