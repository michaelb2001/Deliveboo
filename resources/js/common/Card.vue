<template>
  <div class="container card-container">
      <div class="row cards">
          <div class="bg_image">
          </div>
          {{user.name}}
      </div>
  </div>
</template>

<script>
export default {
    name:"Card",
    props:{
        user: Object
    }
}
</script>

<style lang="scss" scoped>

</style>