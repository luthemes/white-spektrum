import { defineConfig } from 'vite';
import path from 'path';

export default defineConfig({
  publicDir: false,
  build: {
    outDir: 'public/assets',   // Vite only manages this folder
    assetsDir: '',             // no extra nesting
    manifest: 'manifest.json', // lives at public/assets/manifest.json
    emptyOutDir: true,         // cleans old CSS/JS on each build
    rollupOptions: {
      input: {
        app: path.resolve(__dirname, 'resources/js/app.js'),
        nav: path.resolve(__dirname, 'resources/js/navigation.js'),
        screen: path.resolve(__dirname, 'resources/scss/screen.scss'),
        // Customizer assets. The stylesheet gets a -style suffix so its output name
        // doesn't collide with the script of the same name.
        'customize-controls': path.resolve(__dirname, 'resources/js/customize-controls.js'),
        'customize-controls-style': path.resolve(__dirname, 'resources/scss/customize-controls.scss'),
      },
      output: {
        entryFileNames: 'js/[name]-[hash].js',
        chunkFileNames: 'js/[name]-[hash].js',
        assetFileNames: ({ name }) =>
          name && name.endsWith('.css')
            ? 'css/[name]-[hash][extname]'
            : 'media/[name]-[hash][extname]',
      },
    },
  },
});
