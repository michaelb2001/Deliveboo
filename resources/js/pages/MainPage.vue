<template>
  <div class="container">
      <div class="address">
        main page
      </div>
  </div>
</template>

<script>
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
    }

}
</script>

<style lang="scss" scoped>

</style>