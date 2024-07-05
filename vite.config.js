import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // SCSS
                'resources/scss/main.scss',

                // JS
                'resources/js/app.js',

                // Old
                'resources/css/app.css',
            ],
            refresh: true,
        }),
    ],
});
