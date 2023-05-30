import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', //追加
                'resources/js/app.js',
                'resources/sass/admin.scss', //追加
                'resources/sass/app.scss',
            ],
            refresh: true,
        }),
    ],
});
