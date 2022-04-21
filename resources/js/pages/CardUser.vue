<template>
  <div v-if="user" class="container">
      <div class="image-info">
          <div class="image">
            <img v-if="user.img" :src="`../storage/${user.img}`">
        </div>
      <div class="info-user">
          <h1>{{user.activity}}</h1>
          <span v-for="(type,index) in user.types" :key="'type'+index" class="type">{{type.name}} <span v-if="index != user.types.length - 1"> · </span></span>
        <p>Chiude alle 22:00·Consegna gratuita·Minimo d'ordine: 8,00 €</p>
      </div>
      
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

.image-info{
    display: flex;
    margin-top: 30px;
    border-bottom: 1px solid lightgray;
    padding: 33px;

    .image{
        margin-right: 30px;
    }

    img{
        width: 380px;
        border-radius: 6px;
    }

    .info-user{
        width: 30%;

        h1{
        font-weight: bold;

        .type{
            margin-bottom: 10px;
        }
    }
}
}


.card-plate-box{
    cursor: pointer;
}
</style>