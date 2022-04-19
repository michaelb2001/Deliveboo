import Vue from "vue";
        import VueRouter from "vue-router";

        Vue.use(VueRouter);

        import Home from "./pages/Home";
        /*import SinglePost from "./pages/SinglePost";
        import SearchedUser from "./pages/SearchedUser";
        import SearchTag from "./pages/SearchTag";
        import NotFound from "./pages/NotFound";*/

        const router = new VueRouter({
            mode: "history",
            routes: [
                {
                    path: "/",
                    name: "home",
                    component: Home
                },
            ]
        });

        export default router