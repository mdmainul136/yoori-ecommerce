import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import path from "path";
import { VitePWA } from "vite-plugin-pwa";

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), "");

    return {
        plugins: [
            laravel({
                input: "resources/js/app.js",
                buildDirectory: "public/build",
                refresh: true,
            }),
            vue(),

            // for pwa
            VitePWA({
                registerType: "autoUpdate",
                includeAssets: [
                    "favicon.svg",
                    "favicon.ico",
                    "robots.txt",
                    "apple-touch-icon.png",
                ],
                manifest: {
                    name: "Yoori",
                    short_name: "App",
                    description: "Yoori Multi vendor eCommerce Website",
                    theme_color: "#ffffff",
                    icons: [
                        {
                            src: "icons/favicon-192x192.png",
                            sizes: "192x192",
                            type: "image/png",
                        },
                        {
                            src: "icons/favicon-512x512.png",
                            sizes: "512x512",
                            type: "image/png",
                        },
                    ],
                },
            }),
            // for pwa
        ],
        build: {
            chunkSizeWarningLimit: 4000,
            outDir: "public/build",
            emptyOutDir: true,
            manifest: true,
            assetsDir: "assets",
        },
        base: env.VITE_APP_BASE_URL || "/public/build/",
        resolve: {
            alias: {
                vue: "vue/dist/vue.esm-bundler.js",
                "@": path.resolve(__dirname, "resources/js"),
            },
        },
    };
});

// import { defineConfig } from "vite";
// import laravel from "laravel-vite-plugin";
// import vue from "@vitejs/plugin-vue";
// import path from "path";

// export default defineConfig({
//     plugins: [
//         laravel({
//             input: 'resources/js/app.js',
//             buildDirectory: 'public/build',
//             refresh: true,
//         }),
//         vue()
//     ],
//     build: {
//         chunkSizeWarningLimit: 4000,
//         outDir: 'public/build',
//         emptyOutDir: true,
//         manifest: true,
//         assetsDir: 'assets',
//     },
//     base: '/Yoori-Laravel/public/build/',
//     resolve: {
//         alias: {
//             vue: "vue/dist/vue.esm-bundler.js",
//             "@": path.resolve(__dirname, "resources/js"),
//         },
//     },
// });

// import { defineConfig } from "vite";
// import laravel from "laravel-vite-plugin";
// import vue from "@vitejs/plugin-vue";
// import path from "path";

// export default defineConfig({
//     base: 'http://localhost/Yoori-Laravel/public',
//     plugins: [
//         laravel({
//             input: ["resources/js/app.js"],
//             refresh: true,
//         }),
//         vue({
//             template: {
//                 transformAssetUrls: {
//                     base: null,
//                     includeAbsolute: false,
//                 },
//             },
//         }),
//     ],
//     resolve: {
//         alias: {
//             vue: "vue/dist/vue.esm-bundler.js",
//             "@": path.resolve(__dirname, "resources/js"),
//         },
//     },
//     build: {
//         chunkSizeWarningLimit: 4000,
//         outDir: "public/build",
//         // outDir: "./build",
//         // publicDir: "./build",
//         manifest: true

//     },
// });
