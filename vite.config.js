import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    // --- AÑADE ESTA SECCIÓN ---
    server: {
        host: '0.0.0.0', // Escucha en todas las interfaces del contenedor
        hmr: {
            host: 'localhost', // El navegador busca el hot-reload en tu máquina
        },
    },
    // --------------------------
});
