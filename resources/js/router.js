import Vue from "vue";
        import VueRouter from "vue-router";

        Vue.use(VueRouter);

        import MainPage from "./pages/MainPage";
        import CardUser from "./pages/CardUser";
        import NotFound from "./pages/NotFound";

        const router = new VueRouter({
            mode: "history",
            routes: [
                {
                    path: "/",
                    name: "main",
                    component: MainPage
                },
                {
                    path: "/card-user/:activity",
                    name: "CardUser",
                    component: CardUser
                },
				{
		            path: "*",
		            name: "page-404",
		            component: NotFound
		        },
            ]
        });

        export default router