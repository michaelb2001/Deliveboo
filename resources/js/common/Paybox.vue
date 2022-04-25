<template>
  <div v-if="tokenGenerate" class="payment-box">
      <v-braintree 
        :authorization="Token"
        @success="onSuccess"
        @error="onError"
    >
    <template #button="slotProps">
      <div class="text-center" @click="slotProps.submit">
        <button type="button" id="btn_pay" class="btn option-btn">Paga</button>
        <router-link class="btn back_to_home d-none" id="back_to_home" :to="{ name: 'main'}">Torna alla Home</router-link>
      </div>
    </template>
    </v-braintree>
  </div>
</template>

<script>
export default {
  name:"Paybox",
  data(){
    return{
      Token: null,
      tokenGenerate: false,
    }
  },
  props:{
    formData: Object,
    user: Object,
    cart: Array,
  },
  created(){
  axios
      .get("../api/order/generate")
      .then((response) => {
        this.Token = response.data.token;
        console.log(response.data,'genera token');
        this.tokenGenerate = true;
        
       // dataShared.loaded = true;
      })
      .catch(function (error) {});
  },
  methods: {
    pay(){
      axios.post('../api/payment/' , this.formData)
              .then((response) => {
          // handle success
              console.log(response.data);
              if(response.data.status){
                localStorage.setItem('storedData1', null);
                localStorage.setItem('storedData2', null);
                localStorage.setItem('storedData3', null);
                //this.$emit('clearCart');
                console.log(this.user);
                this.$router.push({
                  name: 'SuccessPayment', 
                  params: { user: this.user , cart: this.cart }
                });
              }
          });
    },
    onSuccess (payload) {
      let nonce = payload.nonce;
      this.formData.tokenClient = nonce;
      axios
        .post("../api/order/make/payment" , this.formData)
        .then((response) => {
          console.log(response.data, 'dopo pagamento');
          if(response.data.success){
            this.pay();
            document.getElementById("btn_pay").classList.add("d-none");
            document.getElementById("back_to_home").classList.remove("d-none");
            document.getElementById("back_to_home").classList.add("d-flex");
          }
          else
            console.log('NON PAGATO');

       //   self.clearCart();
         // self.redirect();
        })
        .catch(function (error) {});
      // Do something great with the nonce...
    },
    onError (error) {
      let message = error.message;
      // Whoops, an error has occured while trying to get the nonce
    }
  }
}
</script>

<style lang="scss" scoped>
@import '../../sass/_variables.scss';
.payment-box{
  padding-bottom: 20px;
  border-top: 1px solid $primary-color;
  border-bottom: 1px solid $primary-color;
}

.option-btn{
  color: $light-color;
  background-color: $primary-color;
  border: 1px solid $primary-color;
  &:hover{
    color: $primary-color;
    background-color: $third-color;
    border: 1px solid $third-color;
  }
}

.back_to_home{
    background-color: #00ccbb;
    color: white;
    font-size: 15px;
    padding: 9px;
    border-radius: 10px;
    text-align: center!important;
    &:hover{
      text-decoration: none;
    }
}
</style>