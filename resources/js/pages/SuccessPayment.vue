<template>
  <div v-if="show" class="main-container">
      <h1> {{user.activity}} </h1>
      Grazie Di Aver Scelto Noi ! 
      <h3>Il tuo ordine : </h3>
      <ul>
          <li v-for="(elem,index) in cart" :key="index">
              {{elem.plate.name}} - {{elem.quantity}}x
          </li>
      </ul>

    <!-- <router-link class="back" :to="{ name: 'main'}">
        Torna alla Home 
    </router-link> -->
    <a href="/">
        Torna alla Home
    </a>
  </div>
</template>

<script>
export default {
    name:"SuccessPayment",
    data(){
        return{
            user: null,
            cart: null,
            show: false,
        }
    },
    created(){
        console.log(this.$route)
        this.user = this.$route.params.user;
        this.cart = this.$route.params.cart;
        if(this.cart && this.user)
            this.show = true;
        else
            this.$router.push({
                name: 'main', 
            });
    },
}
</script>

<style lang="scss" scoped>
.back{
    background-color: #00ccbb;
    color: white;
    font-size: 15px;
    padding: 9px;
    border-radius: 10px;

    &:hover{
      text-decoration: none;
    }
  }
</style>