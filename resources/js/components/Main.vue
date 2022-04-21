<template>
<div class="">
  <router-view :key="$route.path"></router-view>
</div>
</template>

<script>
export default {
  name: 'Main'
}
</script>

<style lang="scss" scoped>

</style>