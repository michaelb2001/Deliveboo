<template>
    <div>
        <Header :tot="tot" :user="user"/>
        <Main  @add="add"/>
       <!-- <Footer /> -->
    </div>

</template>

<script>
import Header from './components/Header.vue';
import Main from './components/Main.vue';
import Footer from './components/Footer.vue';
export default{
    name: 'App',
    data(){
        return{
            tot: null,
            user: null,
        }
    },
    components: {
        Header, 
        Main, 
        Footer,    
    },
    methods:{
        add(tot,user){        
            this.tot = tot;
            this.user = user;
        },
    },
}
</script>

<style lang="scss" scoped>
</style>