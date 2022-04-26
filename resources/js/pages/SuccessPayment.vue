<template>
  <div v-if="show" class="main-container d-flex align-items-center flex-column">
    <div class="back text-center">
        <!-- <h1> {{user.activity}} </h1> -->
        <div>
            <h1> Nome attività </h1>
            <p>Grazie per averci scelto !</p> 
            <h3>Il tuo ordine :</h3>            
        </div>
        <!-- <ul v-if="cart">  il v-if VA TOLTO ALLA FINE DI LUCA 
            <li v-for="(elem,index) in cart" :key="index">
                {{elem.plate.name}} - {{elem.quantity}}x
            </li>
        </ul> -->
        <ul>
            <li v-for="(elem,index) in 3" :key="index">
                piatto{{index}} - {{index + 1}}x
            </li>
        </ul>

        <!-- <router-link class="back" :to="{ name: 'main'}">
    Torna alla Home 
</router-link> -->
        <a href="/">
            <button type="button" class="btn option-btn">Torna alla home</button>
        </a>
    </div>
        
  </div>
</template>

<script>
export default {
    name:"SuccessPayment",
    data(){
        return{
            user: null,
            cart: null,
            show: true, //VA MESSO FALSE ALLA FINE DI LUCA
        }
    },
    /*created(){
        console.log(this.$route)
        this.user = this.$route.params.user;
        this.cart = this.$route.params.cart;
        if(this.cart && this.user)
            this.show = true;
        else
            this.$router.push({
                name: 'main', 
            });
    },*/
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';


ul{
    list-style-type: none;
    padding: 0px;
}

.back{
    background-color: #00ccbb;
    color: white;
    font-size: 15px;
    padding: 9px;
    border-radius: 10px;
    width: 80%;
    a{
        text-decoration-line: none;
    }
  }

.option-btn{
    color: $light-color;
    background-color: $primary-color;
    border: 1px solid $third-color;
    &:hover{
    color: $primary-color;
    background-color: $third-color;
    border: 1px solid $third-color;
    }
}
</style>