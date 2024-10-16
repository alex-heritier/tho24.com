import { fileURLToPath, URL } from 'url';
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from "@vitejs/plugin-react";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // SCSS
                'resources/scss/main.scss',

                // JS
                'resources/js/app.js',

                // JSX
                'resources/jsx/PageBuilder/index.jsx',

                // Old
                'resources/css/app.css',
            ],
            refresh: true,
        }),
        react(),
    ],
    resolve: {
        alias: {
            "@": fileURLToPath(new URL("./resources/js", import.meta.url)),
            "@@": fileURLToPath(new URL("./resources/jsx", import.meta.url)),
            "$images": fileURLToPath(new URL("./public/images", import.meta.url)),
            "$fonts": fileURLToPath(new URL("./public/fonts", import.meta.url)),
        }
    },
});
