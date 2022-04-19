import Vue from "vue";
        import VueRouter from "vue-router";

        Vue.use(VueRouter);

        import Home from "./pages/Home";
        import MainPage from "./pages/MainPage";

        const router = new VueRouter({
            mode: "history",
            routes: [
                {
                    path: "/",
                    name: "home",
                    component: Home
                },
                {
                    path: "/main",
                    name: "MainPage",
                    component: MainPage
                },
            ]
        });

        export default router