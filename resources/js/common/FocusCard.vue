<template>
  <div class="card-container">
      <div  class="focus-card">
        {{plate.name}}
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
.focus-card{
    position: absolute;
    bottom:100px;
    left:100px;
    background: red;
    height: 200px;
    width: 200x;
}
</style>