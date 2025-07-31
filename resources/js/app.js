import { createApp, h } from "vue";
import { createInertiaApp, Head } from "@inertiajs/vue3";
import { Ziggy } from "./ziggy";
import "../../public/assets/css/style.bundle.css";

                                                        // agar menu dari metronic dapat di gunakan tanpa di refresh
                                                        import { router } from "@inertiajs/vue3";
                                                        import { onMounted, nextTick } from "vue";
                                                        
                                                        // Fungsi helper untuk re-init Metronic Menu
                                                        function reinitMetronicMenu() {
                                                            // Metronic v8+
                                                            if (window.MenuComponent?.reinitialization) {
                                                                window.MenuComponent.reinitialization();
                                                            } else if (window.MenuComponent?.createInstances) {
                                                                window.MenuComponent.createInstances();
                                                            }
                                                            // Beberapa bundle expose KTMenu
                                                            else if (window.KTMenu?.createInstances) {
                                                                window.KTMenu.createInstances();
                                                            }
                                                        }
                                                        
                                                        // Init awal saat pertama mount (SPA boot)
                                                        document.addEventListener("DOMContentLoaded", () => {
                                                            reinitMetronicMenu();
                                                        });
                                                        
                                                        // Setiap selesai navigasi Inertia, re-init lagi
                                                        router.on("success", async () => {
                                                            await nextTick();
                                                            reinitMetronicMenu();
                                                        });



createInertiaApp({
    title: (title) => `PORTAL ${title}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        return pages[`./Pages/${name}.vue`];
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Ziggy)
            .component("Head", Head)
            .mount(el);
    },
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        delay: 250,

        // The color of the progress bar...
        color: "#99d",

        // Whether to include the default NProgress styles...
        includeCSS: true,

        // Whether the NProgress spinner will be shown...
        showSpinner: false,
    },
});
