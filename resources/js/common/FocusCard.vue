<template>
  <div class="position-relative w-100">
      <div class="focus-cards">

        <div class="container">
          <div class="row flex-column">
            <div class="col p-0">
              
              <div>
                <img class="img-fluid img-class" v-if="plate.img" :src="`../storage/${plate.img}`">
                <img class="img-fluid img-class" v-else src="https://consumer-component-library.roocdn.com/25.27.6/static/images/placeholder.svg">
              </div>

            </div>
            <div class="col">
               <div>
                <h4>{{plate.name}}</h4>
              </div>
              <div>
                <p>{{plate.ingredients}}</p>
              </div>
            </div>
            <div class="col">
              <div class="row flex-column">
                <div class="col">
                  <button type="button" class="btn btn-primary">-</button>
                  
                  <button type="button" class="btn btn-primary">+</button>
                </div>
                <div class="col">
                  <button type="button" class="btn btn-primary">{{plate.price}}€</button>
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
    props:{
        plate: Object
    }
}
</script>

<style lang="scss" scoped>

.focus-cards{
  position: fixed;
  top: 500px;
  left: 500px;
  background-color: red;
  height: 600px;
  width: 560px;

  .img-class{
    width: 560px;
    height: 315px;
    object-fit: cover;
  }

}

</style>