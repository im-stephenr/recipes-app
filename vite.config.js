import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

const SCSS_Logger = {
    warn(message, options) {
        // Mute "Mixed Declarations" warning
        if (options.deprecation && message.includes("mixed-decls")) {
            return;
        }
        // List all other warnings
        console.warn(`▲ [WARNING]: ${message}`);
    },
};

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/sass/app.scss", "resources/js/app.js"],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                logger: SCSS_Logger,
            },
        },
    },
});
