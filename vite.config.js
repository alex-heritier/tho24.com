import { fileURLToPath, URL } from 'url';
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
    resolve: {
        alias: {
            "@": fileURLToPath(new URL("./resources/js", import.meta.url)),
            "$images": fileURLToPath(new URL("./public/images", import.meta.url)),
            "$fonts": fileURLToPath(new URL("./public/fonts", import.meta.url)),
        }
    },
});
