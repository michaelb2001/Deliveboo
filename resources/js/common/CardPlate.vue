<template>
  <div class="card-container">
      <div class="card-plate">
          {{plate.name}}
        {{plate.price}}
      </div>
  </div>
</template>

<script>
export default {
    name:"CardPlate",
    props:{
        plate: Object
    }
}
</script>

<style lang="scss" scoped>

</style>