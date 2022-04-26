<template>
  <div class="cart-box">
    <div v-if="cart ? cart.length <= 0 : !prevUser" class="h-100 d-flex flex-column justify-content-around align-items-center empty">
        <div class="d-flex flex-column align-items-center">
            <i class="fa-solid fa-basket-shopping"></i>
            <p class="my-2">Il carrello è vuoto</p>
        </div>
        <button disabled type="button">
            Vai al pagamento
        </button>
    </div>

    <div v-else-if="cart && cart.length > 0" class="h-100 d-flex flex-column justify-content-around align-items-center no-empty">
        <div class="w-100 d-flex flex-column align-items-center">
            <h2 class="ml-5 mb-3" style="color:black; align-self:flex-start;">Il Tuo Ordine</h2>
            <div class="px-5 w-100 d-flex justify-content-between" v-for="(item,index) in cart" :key="index">
                <p class="order-plate-name">{{item.plate.name}}</p> 
                <div class="quantity-box">
                    <i @click="oneLess(index)" class="quantity-num fa-solid fa-minus"></i>
                    <span class="mx-1">{{item.quantity}}</span>
                    <i @click="oneMore(index)" class="quantity-num fa-solid fa-plus"></i>
                    <span class="mx-1">{{(item.plate.price * item.quantity).toFixed(2)}} €</span>
                </div>
            </div>
        </div>
        <button type="button">
            <router-link class="nav-link" :to="{name : 'Payment' , params:{cart:cart,tot:tot,user:user} }">
                Vai al pagamento
            </router-link>
        </button>
    </div>

    <div v-else class="h-100 d-flex flex-column justify-content-around align-items-center no-empty">
        <div class="d-flex flex-column align-items-center">
            <i class="fa-solid fa-exclamation"></i>
            <p class="my-2">Attenzione, non puoi ordinare da due ristoranti diversi!</p>
        </div>
        <button disabled type="button">
            Vai al pagamento
        </button>
    </div>
    </div>
</template>

<script>
export default {
    name:"CartBox",
    props:{
        cart: Array,
        prevUser: Object,
        tot: Number,
        user: Object,
    },
    methods:{
        oneMore(i){
            console.log('sono in onemore');
            this.cart[i].quantity++;
            this.$emit('add', this.cart, true);
            //this.add(this.cart , true);
        },
        oneLess(i){
            let cart = this.cart;
            console.log('sono in oneless');
            this.cart[i].quantity--;
            if(this.cart[i].quantity == 0)
                this.cart.splice(i,1);

            if(this.cart.length <= 0){
               // this.user = null;
               cart = this.cart;
               cart = null;
               // this.tot = null;
            }
                this.$emit('add', cart, true);
                //this.add(this.cart , true);
        },
    },
}
</script>

<style lang="scss" scoped>
@import '../../sass/front.scss';
a{
    text-decoration: none;
    color: white;

    &:hover{
        color: $third_color;
        font-size: 1.1em;
        font-weight: bold;
    }
}

.order-plate-name{
    font-size: 1.1em;
    color: black;
}

.quantity-box{
    
    .quantity-num{
        cursor: pointer;
        color: $primary_color;
        border: 1px solid $primary_color;
        border-radius: 50%;
        padding: 1px;

        &:hover{
            transform: scale(1.1);
        }
    }
}

.cart-box{
    background-color: white;
    color: $darkgrey-color;
    border: 1px solid $grey-color;
    border-radius: 5px;
    height: 80%;
    width: 100%;
    z-index: 9999;
    top: 50%;
    left: 50%;
    position: fixed;
    transform: translate(-50%, -50%);

    @media screen and (min-width:576px) {
      &{
        height: 60%;
        width: 80%;
      }
    }

    @media screen and (min-width:992px) {
      &{
        all: inherit;
        width: 480px;
        height: 230px;
        background-color: white;
        color: $darkgrey-color;
        border: 1px solid $grey-color;
        border-radius: 5px;
      }
    }

    button{
        border: unset;
        width: 90%;
        height: 55px;
        border-radius: 5px;
        background-color: $primary-color;
        color: white;
    }

    button:disabled{
        cursor: no-drop;
        color: unset;
        background-color: $grey-color!important;
    }

    .fa-basket-shopping,.fa-exclamation{
        font-size: 2.5em;
    }
}

/*.order-plate-name{
    font-size: 1.1em;
    color: black;
}

.quantity-box{
    
    .quantity-num{
        cursor: pointer;
        color: $primary_color;
        border: 1px solid $primary_color;
        border-radius: 50%;
        padding: 1px;

        &:hover{
            transform: scale(1.1);
        }
    }
}

.cart-box{
    background-color: white;
    color: $darkgrey-color;
    border: 1px solid $grey-color;
    border-radius: 5px;
    height: 60%;
    width: 80%;
    z-index: 9999;
    top: 50%;
    left: 50%;
    position: fixed;
    transform: translate(-50%, -50%);

    @media screen and (min-width:992px) {
      &{
        all: inherit;
        width: 480px;
        height: 230px;
        background-color: white;
        color: $darkgrey-color;
        border: 1px solid $grey-color;
        border-radius: 5px;
      }
    }

    button{
        border: unset;
        width: 90%;
        height: 55px;
        border-radius: 5px;
        background-color: $primary-color;
        color: white;
    }

    button:disabled{
        cursor: no-drop;
        color: unset;
        background-color: $grey-color!important;
    }

    .fa-basket-shopping,.fa-exclamation{
        font-size: 2.5em;
    }
}*/
</style>