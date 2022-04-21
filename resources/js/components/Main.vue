<template>
<div class="">
  <router-view @add="add" :key="$route.path"></router-view>
</div>
</template>

<script>
export default {
  name: 'Main',
  methods:{
    add(tot,user){        
        this.$emit('add',tot , user);
    },
  },
}
</script>

<style lang="scss" scoped>

</style>