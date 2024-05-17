// vite.config.js
import { defineConfig } from 'vite';

export default defineConfig({
    root: './src',
    build: {
        outDir: '../dist',
        rollupOptions: {
            input: {
                main: './src/index.html', // メインのHTMLエントリーポイント
                style: './src/sass/style.scss', // SCSSエントリーポイント
            },
        },
    },
});
