import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
<<<<<<< HEAD
=======
import tailwindcss from '@tailwindcss/vite';
>>>>>>> f4df3c487e9bfd7a44331a13946d6ab092dee692

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
<<<<<<< HEAD
=======
        tailwindcss(),
>>>>>>> f4df3c487e9bfd7a44331a13946d6ab092dee692
    ],
});
