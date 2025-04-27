import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig(({ mode }) => {
    // Load environment variables based on the current mode
    const env = loadEnv(mode, process.cwd());

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
        ],
        define: {
            'process.env': env
        }
    };
});
