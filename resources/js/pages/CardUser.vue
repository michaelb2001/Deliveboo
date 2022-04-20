<template>
  <div v-if="user" class="container">
      <h1>Nome</h1>
      {{user.activity}}
      <h1>tipi</h1>
      <div v-for="(type,index) in user.types" :key="'type'+index" class="type">
          {{type.name}}
      </div>

    <h1>piatti</h1>
    <div v-for="(plate,index) in user.plates" :key="'plate'+index">
        <div @click="showFocusCard(plate)" class="card-plate-box">
            <CardPlate :plate="plate"/>
        </div>
    </div>

    <FocusCard v-if="focusVisibility" :plate="focusVisibility"/>
  </div>
</template>

<script>
import CardPlate from '../common/CardPlate.vue';
import FocusCard from '../common/FocusCard.vue';

export default {
    name:"MainPage",
    data(){
      return{
          user : null,
          focusVisibility : null,
      }
    },
    components: { 
        FocusCard,
        CardPlate,
    },
    created(){
        if(this.$route.params.user)
            this.user = this.$route.params.user;
        else
            this.getUser();
    },
    methods:{
        showFocusCard(plate){
            this.focusVisibility = plate;
        },
        getUser(){
            console.log('axios');
            axios.get('/api'+this.$route.path)
                .then((response) => {
            // handle success
                this.user = response.data;
                console.log(response.data);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
        }
    },
}
</script>

<style lang="scss" scoped>
.card-plate-box{
    cursor: pointer;
}
</style>