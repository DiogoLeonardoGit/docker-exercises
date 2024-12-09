import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
    build: {
        outDir: 'public/build', // Specifies where to output build files
        assetsDir: '', // You can specify a directory for assets if needed
    },
});