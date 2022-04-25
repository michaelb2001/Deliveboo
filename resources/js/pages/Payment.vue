<template>
  <div class="pay-container">
      <div v-if="tot" class="pay-box">
        
        <div class="container mt-3">
          <div class="row">
            <div class="col-12 col-md-5 col-lg-8">
              <h2>{{user.activity}}</h2>
              <p>Recapito consegna</p>
              <!-- Box form -->
              <div class="form-edit-box">    
                <div class="main-box">
                  <div v-if="!formComplete" class="main-form-box">
                      <div class="form-group">
                          <label for="name">Nome</label>
                          <input :disabled="formComplete" v-model="name" type="text" class="form-control" id="name" name="name" placeholder="Nome">
                          <div v-if="!validation.name.success" class="alert alert-danger">
                            {{validation.name.message}}
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="surname">cognome</label>
                          <input :disabled="formComplete" v-model="surname" type="text" class="form-control" id="surname" name="surname" placeholder="surname">
                          <div v-if="!validation.surname.success" class="alert alert-danger">
                            {{validation.surname.message}}
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="email">Email</label>
                          <input :disabled="formComplete" v-model="email" id="email" type="email" class="form-control" name="email" placeholder="Inserisi l'indirizzo email">
                          <div v-if="!validation.email.success" class="alert alert-danger">
                            {{validation.email.message}}
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="phone">Telefono</label>
                          <input :disabled="formComplete" v-model="phone" id="phone" type="text" class="form-control" name="phone" placeholder="Insierisci il numero di telefono">
                          <div v-if="!validation.phone.success" class="alert alert-danger">
                            {{validation.phone.message}}
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="address">Indirizzo</label>
                          <input :disabled="formComplete" v-model="address" id="address" type="text" class="form-control" name="address" placeholder="Inserisci l'indirizzo per il recapito">
                          <div v-if="!validation.address.success" class="alert alert-danger">
                            {{validation.address.message}}
                          </div>
                      </div>
                  </div>

                  <div class="form-is-complete d-flex flex-column" v-else>
                    <div> <h3>Nome</h3> : {{this.formData.name}}</div>
                    <div> <h3>Cognome</h3> : {{this.formData.surname}}</div>
                    <div> <h3>Email</h3> : {{this.formData.email}}</div>
                    <div> <h3>Telefono</h3> : {{this.formData.phone}}</div>
                    <div> <h3>Indirizzo</h3> : {{this.formData.address}}</div>
                  </div>
                </div>
              </div>
              <!-- Box pagamento BrainTree-->
              <div class="">
                <Paybox :user="user" :cart="cart" v-if="formComplete" :formData="formData" @payed="isPayed()"/>
              </div>
              <!-- Box pulsanti -->
              <div class="text-center mt-3">
                <button v-if="!formComplete" @click="controlInput()" type="button" class="btn option-btn">
                  Conferma i dati !
                </button>
              </div>
            </div>

            <div class="col-12 col-md-5 col-lg-4 mt-3">
              <div class="box-cart border">
                <div class="w-100 d-flex flex-column align-items-center">
                    <h2 class="ml-5 mb-3 mt-3" style="color:black; align-self:flex-start;">Il Tuo Ordine</h2>
                    <div class="px-5 w-100 d-flex justify-content-between" v-for="(item,index) in cart" :key="index">
                        <p class="order-plate-name">{{item.plate.name}}</p> 
                        <div class="quantity-box">
                            <span class="me-3">{{item.quantity}}</span>
                        </div>
                        <div>
                          <span>{{(item.plate.price * item.quantity).toFixed(2)}} €</span>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          
        
      </div>
  </div>
</template>

<script>
import Paybox from '../common/Paybox.vue';
export default {
    name:"Payment",
    components: { Paybox },
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

        if(!this.user || !this.tot)
          this.$router.push('/');
      }
    },
    data(){
      return{
        formComplete: false,
        user: null,
        cart: null,
        tot: null,
        
        name: null,
        surname: null,
        email: null,
        phone: null,
        address: null,
        payed: false,
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
        validation: {
          name: {
            success: true,
            message: "",
          },
          surname: {
            success: true,
            message: "",
          },
          email: {
            success: true,
            message: "",
          },
          address: {
            success: true,
            message: "",
          },
          phone: {
            success: true,
            message: "",
          },
      },
      }
    },
    methods:{
      clearCart(){

      },
      controlInput(){
      // validazione nome
      console.log(this.name);
      if (!this.name) {
        this.validation.name.success = false;
        this.validation.name.message = "Il nome non può essere vuoto";
      } else if (this.name.length > 30) {
        this.validation.name.success = false;
        this.validation.name.message =
          "Il nome non può superare i 30 caratteri";
      } else {
        this.validation.name.success = true;
        this.validation.name.message = "";
      }
      // validazione cognome
      if (!this.surname) {
        this.validation.surname.success = false;
        this.validation.surname.message = "Il cognome non può essere vuoto";
      } else if (this.surname.length > 30) {
        this.validation.surname.success = false;
        this.validation.surname.message =
          "Il cognome non può superare i 30 caratteri";
      } else {
        this.validation.surname.success = true;
        this.validation.surname.message = "";
      }
      // validazione email
      if (!this.email) {
        this.validation.email.success = false;
        this.validation.email.message = "La mail non può essere vuota";
      } else if (this.email.length > 255) {
        this.validation.email.success = false;
        this.validation.email.message =
          "La mail non può superare i 255 caratteri";
      } else if (
        !this.email.match(
          /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/
        )
      ) {
        this.validation.email.success = false;
        this.validation.email.message = "Formato della mail non valido";
      } else {
        this.validation.email.success = true;
        this.validation.email.message = "";
      }
      //validazione indirizzo
      if (!this.address) {
        this.validation.address.success = false;
        this.validation.address.message = "L'indirizzo non può essere vuoto";
      } else if (this.address.length > 255) {
        this.validation.address.success = false;
        this.validation.address.message =
          "L'indirizzo non può superare i 255 caratteri";
      } else {
        this.validation.address.success = true;
        this.validation.address.message = "";
      }
      // validazione telefono
      if (!this.phone) {
        this.validation.phone.success = false;
        this.validation.phone.message = "Inserire il numero di telefono";
      } else if (isNaN(this.phone)) {
        this.validation.phone.success = false;
        this.validation.phone.message =
          "Il telefono deve essere composto da numeri";
      } else if (
        this.phone.length < 8 ||
        this.phone.length > 11
      ) {
        this.validation.phone.success = false;
        this.validation.phone.message =
          "Il telefono deve essere compreso tra gli 8 e gli 11 caratteri";
      } else {
        this.validation.phone.success = true;
        this.validation.phone.message = "";
      }
    
      this.isValidate();
      },
      isValidate() {
      let control = true;
      for(let i in this.validation) 
        if(!this.validation[i].success) 
          control = false;
      
      if(!control)
        return;

      //se tutto va bene
      this.formData.name = this.name;
      this.formData.surname = this.surname;
      this.formData.email = this.email;
      this.formData.phone = this.phone;
      this.formData.address = this.address;
      this.formData.status = 0;
      this.formData.total = this.tot;
      this.formData.user_id = this.user.id;
      this.formData.plates = this.cart;

      this.formComplete = true;
      },
    },
}
</script>

<style lang="scss" scoped>
@import '../../sass/front.scss';
.form-is-complete{
  h3{
    display: inline-block;
  }

  p{
    font-size: 1.3em;
  }
}

.form-edit-box{
  margin-bottom: 30px;
}

.box-cart{
  max-height: calc(calc(100vh - (24px * 2) - (73px + 72px)) - 80px);
  background: rgba( 255, 255, 255, 0.9 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.2 );
  border-radius: 5px;
}

.deniend-button{
  border: 2px solid  $light-color;
  background-color: $primary-color;
  color: $light-color;
  &:hover{
    cursor: no-drop;
  }
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


</style>