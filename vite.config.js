import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    server: {
        https: true, // Jika Anda juga ingin menjalankan server pengembangan di HTTPS
    },
    build: {
        // Pastikan Vite menghasilkan URL yang benar di mode production
        assetsInlineLimit: 0,
    },
});
