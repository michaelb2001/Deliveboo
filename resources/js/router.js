import Vue from "vue";
        import VueRouter from "vue-router";

        Vue.use(VueRouter);

        import MainPage from "./pages/MainPage";
        import CardUser from "./pages/CardUser";
        import Payment from "./pages/Payment";
        import NotFound from "./pages/NotFound";
        import SuccessPayment from "./pages/SuccessPayment";

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
                    path: "/payment",
                    name: "Payment",
                    component: Payment
                },
                {
                    path: "/payment/success",
                    name: "SuccessPayment",
                    component: SuccessPayment
                },
				{
		            path: "*",
		            name: "page-404",
		            component: NotFound
		        },
            ]
        });

        export default router