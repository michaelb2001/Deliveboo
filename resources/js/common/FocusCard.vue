<template>
  <div>
      <div class="focus-cards">

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
                <div class="col btn-add-remove">

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
                  <button @click="add()" type="button" class="btn btn-price">{{plate.price * quantity}}€</button>
                </div>
              </div>
              
            </div>
          </div>
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
      }
    },
    props:{
        plate: Object,
    },
    methods:{
      add(){
        this.order.push({
          plate: this.plate,
          quantity: this.quantity,
        });

        console.log('provo a fare emit',this.order);
        this.$emit('add',this.order);
      },
    },
}
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

.focus-cards{
  background-color: $light-color;
  max-height: 950px;
  width: 560px;
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

  .btn-add-remove{
    margin-bottom: 25px;
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