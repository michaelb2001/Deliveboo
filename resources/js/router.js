import Vue from "vue";
        import VueRouter from "vue-router";

        Vue.use(VueRouter);

        import MainPage from "./pages/MainPage";

        const router = new VueRouter({
            mode: "history",
            routes: [
                {
                    path: "/",
                    name: "main",
                    component: MainPage
                }
            ]
        });

        export default router