import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'public/vendor/datatables/dataTables.bootstrap4.css'
            ],
            refresh: true,
        }),
    ],
});
