<template>
  <div class="home-top">
    <input v-model="inputText" type="text" placeholder="indirizzo">
    <div v-if="inputText && inputText.length > 0">
        <button> 
            <a :href="`/main/${inputText}`">Cerca</a>
        </button>
    </div>

    <div v-else>
        <button disabled> 
            Cerca
        </button>
    </div>
</div>
</template>

<script>
export default {
    name:"HomeTop",
    data(){
        return{
            inputText: "",
        }
    },
}
</script>

<style lang="scss" scoped>

</style>