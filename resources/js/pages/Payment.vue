<template>
  <div class="pay-container">
      <div v-if="tot" class="pay-box">
        qua si paga
        {{(tot).toFixed(2)}}
        {{user.activity}}

        <div class="form-edit-box">    
    <div class="main-box">
        <div class="main-form-box">
            <div class="form-group">
                <label for="name">Nome</label>
                <input v-model="name" type="text" class="form-control" id="name" name="name" placeholder="Nome">
            </div>

            <div class="form-group">
                <label for="surname">Cognome</label>
                <input v-model="surname" type="text" class="form-control" id="surname" name="surname" placeholder="Cognome">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input v-model="email" id="email" type="email" class="form-control" name="email">
            </div>

             <div class="form-group">
                <label for="phone">Telefono</label>
                <input v-model="phone" id="phone" type="text" class="form-control" name="phone">
            </div>

            <div class="form-group">
                <label for="address">Indirizzo</label>
                <input v-model="address" id="address" type="text" class="form-control" name="address">
            </div>
        </div>
    </div>
        </div>
        <button @click="pay()">
          PAGA
        </button>
      </div>
  </div>
</template>

<script>
export default {
    name:"Payment",
    created(){
      if(this.$route.params.user)
        this.user = this.$route.params.user;
      if(this.$route.params.tot)
        this.tot = this.$route.params.tot;
      if(this.$route.params.cart)
        this.cart = this.$route.params.cart;
      
      if(!this.user || !this.tot){
        this.user = JSON.parse(localStorage.getItem('storedData2'));
        this.cart = JSON.parse(localStorage.getItem('storedData3'));
        this.tot = JSON.parse(localStorage.getItem('storedData1'));
      }
    },
    data(){
      return{
        user: null,
        cart: null,
        tot: null,
        name: null,
        surname: null,
        email: null,
        phone: null,
        address: null,
        formData: {
          name: null,
          surname: null,
          email: null,
          phone: null,
          address: null,
          status: null,
          total: null,
          user_id: null,
          plates: null,
        },
      }
    },
    methods:{
      pay(){
        this.controlInput();

        axios.post('../api/payment/' , this.formData)
                .then((response) => {
            // handle success
                console.log(response.data);
            });
      },
      controlInput(){
        //qua andrannno i controlli

        //se tutto è giusto
        this.formData.name = this.name;
        this.formData.surname = this.surname;
        this.formData.email = this.email;
        this.formData.phone = this.phone;
        this.formData.address = this.address;
        this.formData.status = 0;
        this.formData.total = this.tot;
        this.formData.user_id = this.user.id;
        this.formData.plates = this.cart;
      }
    },
}
</script>

<style lang="scss" scoped>
@import '../../sass/front.scss';

</style>