<template>
  <div>
      <div v-if="!createNewCartShow" class="focus-cards">
        <div class="container">
          <div class="row flex-column">
            <div class="col p-0">
              
              <div>
                <img class="img-fluid img-class" v-if="plate.img" :src="`../storage/${plate.img}`">
                <img class="img-fluid img-class" v-else src="https://consumer-component-library.roocdn.com/25.27.6/static/images/placeholder.svg">
              </div>

            </div>
            <div class="col mt-3">
               <div>
                <h4>{{plate.name}}</h4>
              </div>
              <div>
                <p>{{plate.ingredients}}</p>
              </div>
            </div>

            <div class="col">
              <div class="row flex-column text-center">
                <div class="col btn-add-remove d-flex align-items-center justify-content-center">

                    <div @click="(quantity - 1 >= 1 ) ? quantity-- : null" class="btn btn-three">
                      <span>-</span>
                    </div>

                    <div class="quantity">
                      {{quantity}}
                    </div>

                    <div @click="quantity++" class="btn btn-three">
                      <span>+</span>
                    </div>
                
                </div>
                <div class="col">
                  <button @click="(prevUser) ? (prevUser.id == user.id) ? add() : createNewCartShow = true : add()" type="button" class="btn btn-price">{{(plate.price * quantity).toFixed(2)}}€</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex flex-column justify-content-center align-items-center focus-new-cart" v-else-if="createNewCartShow && user && prevUser.id != user.id">
        <h1> Attenzione! </h1>
        <p>Vuoi svuotare il carrello e crearne uno nuovo? </p>
        <div class="w-75 d-flex justify-content-around">
          <button class="btn btn-price" @click="add()"> SI </button>
          <button class="btn btn-price" @click="createNewCartShow = false"> NO </button>
        </div>
      </div>
  </div>
</template>

<script>
export default {
    name:"FocusCard",
    data(){
      return{
        quantity: 1,
        order: [], 
        createNewCartShow: false,
      }
    },
    props:{
        plate: Object,
        prevOrder: Array,
        prevUser: Object,
        user: Object,
    },
    methods:{
      add(){
        this.order.push({
          plate: this.plate,
          quantity: this.quantity,
        });

    if(this.prevUser && this.user)
      if(this.prevUser.name == this.user.name)
        if(this.prevOrder)
          if(this.prevOrder.length > 0)
            for (let i = 0; i < this.prevOrder.length; i++)
              this.order.push(this.prevOrder[i]);

        console.log('provo a fare emit',this.order);
        this.$emit('add',this.order);
      },
    },
}
</script>

<style lang="scss" scoped>
@import '../../sass/front.scss';
.focus-new-cart{
  background-color: $light-color;
  height: 300px;
  width: 400px;
  z-index: 9999;
  top: 50%;
  left: 50%;
  position: fixed;
  transform: translate(-50%, -50%);
  border-radius: 5%;

 .btn-price{
    width: 45%;
    margin-bottom: 15px;
    color: $light-color;
    background-color: $third-color;
    border: 1px solid $third-color;
    &:hover{
      background-color: #8f3d82;
      border: 1px solid #8f3d82;
    }
  }

  p{
    font-size: 1.2em;
  }
}

.focus-cards{
  background-color: $light-color;
  max-height: 950px;
  width: 560px;
  z-index: 9999;
  top: 50%;
  left: 50%;
  position: fixed;
  transform: translate(-50%, -50%);
  border-radius: 5%;

  .img-class{
    width: 560px;
    height: 315px;
    object-fit: cover;
    border-top-left-radius: 25px;
    border-top-right-radius: 25px;  
    }



  .btn-add-remove{
    margin-bottom: 25px;
      .btn-three {
	color: $third-color;
	transition: all 0.5s;
	position: relative;
  font-size: 25px;

    &:before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      background-color: rgba(255,255,255,0.1);
      transition: all 0.3s;
    }
    &:hover:before{
      opacity: 0 ;
      transform: scale(0.5,0.5);
    }
    &:after{
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 1;
      opacity: 0;
      transition: all 0.3s;
      border: 2px solid $third-color;
      transform: scale(1.2,1.2);
    }
    &:hover::after{
      opacity: 1;
      transform: scale(1,1);
    }
    }
  }

  .btn-price{
    width: 100%;
    margin-bottom: 15px;
    color: $light-color;
    background-color: $third-color;
    border: 1px solid $third-color;
    &:hover{
      background-color: #8f3d82;
      border: 1px solid #8f3d82 ;
    }
  }
}

</style>