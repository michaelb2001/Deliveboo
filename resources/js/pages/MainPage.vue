<template>
  <div class="container">
      <div class="cards">
        <div v-for="(user,index) in usersArr" :key="index" class="card">
          <router-link class="" :to="{name : 'CardUser' , params:{activity:user.activity,user:user} }">
             <Card :user="user"/>
          </router-link>
        </div>
      </div>
  </div>
</template>

<script>
import Card from "../common/Card.vue";

export default {
    name:"MainPage",
    data(){
      return{
        urlAllUsers : '/api/users',
        usersArr: [],

        urlAllTypes : '/api/allTypes',
        typesArr : []
      }
    },
    created(){
      axios.get(this.urlAllUsers)
        .then((response) => {
      // handle success
        this.usersArr.push (...response.data);
        console.log(this.usersArr);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      });

    axios.get(this.urlAllTypes)
        .then((response) => {
      // handle success
        this.typesArr.push (...response.data);
        console.log(this.typesArr);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      });
    },

    components:{
      Card
    }

}
</script>

<style lang="scss" scoped>

</style>