import {defineConfig, loadEnv} from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite'

export default ({mode}) => {
    process.env = {...process.env, ...loadEnv(mode, process.cwd(), '')};

    return defineConfig ({
        server: {
            host: true,
            hmr: {
                host: process.env.VITE_HOST,
            },
            watch: {
                usePolling: true
            }
        },
        plugins: [
            tailwindcss(),
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
        ],
    });
}
