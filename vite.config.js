import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.scss', //追加
                'resources/js/app.js',
                'resources/sass/admin.scss', //追加
            ],
            refresh: true,
        }),
    ],
});
