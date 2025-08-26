import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/js/app.js', 
                'resources/js/label.js', 
                'resources/js/audiopost.js', 
                'resources/js/bootstrap.js', 
                'resources/js/logo-sonar.js',
                'resources/js/audiopost2.js',
                'resources/js/sidebar.js',
                'resources/js/loading.js', 
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
