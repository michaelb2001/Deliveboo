<template>
  <div>
      <v-braintree 
        v-if="tokenGenerate"
        :authorization="Token"
        @success="onSuccess"
        @error="onError"
    >

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
      form: {
        tokenClient: "",
        }
    }
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
    onSuccess (payload) {
      let nonce = payload.nonce;
      this.form.tokenClient = nonce;
      console.log(this.form.tokenClient);
      axios
        .post("../api/order/make/payment" , this.form)
        .then((response) => {
          console.log(response.data, 'dopo pagamento');
       //   console.log(this.form.client);
         // this.dataShared.client = this.form.client;
         // console.log(this.dataShared.client);
       //   self.clearCart();
         // self.redirect();
        })
        .catch(function (error) {});
      this.$emit('payed');

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

</style>