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
                          <input v-model="email" id="email" type="email" class="form-control" name="email" placeholder="Inserisi l'indirizzo email">
                      </div>

                      <div class="form-group">
                          <label for="phone">Telefono</label>
                          <input v-model="phone" id="phone" type="text" class="form-control" name="phone" placeholder="Insierisci il numero di telefono">
                      </div>

                      <div class="form-group">
                          <label for="address">Indirizzo</label>
                          <input v-model="address" id="address" type="text" class="form-control" name="address" placeholder="Inserisci l'indirizzo per il recapito">
                      </div>
                  </div>
                </div>
              </div>
              <!-- Box pagamento BrainTree-->
              <div class="Payment-box">
                <Paybox @payed="isPayed()"/>
              </div>
              <!-- Box pulsanti -->
              <div class="text-center mt-3">
                <button disabled v-if="!payed" class="deniend-button rounded-pill p-2">
                Scegli il metodo di pagamento
                </button>

                <button @click="pay()" type="button" class="btn option-btn" v-else>
                  Conferma
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
      }
    },
    methods:{
      isPayed(){
        this.payed = true
      },
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


.form-edit-box{
  margin-bottom: 30px;
}

.box-cart{
  max-height: calc(calc(100vh - (24px * 2) - (73px + 72px)) - 80px);
  background: rgba( 255, 255, 255, 0.9 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.2 );
  border-radius: 5px;
}

.Payment-box{
  padding-bottom: 20px;
  border-top: 1px solid $primary-color;
  border-bottom: 1px solid $primary-color;
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