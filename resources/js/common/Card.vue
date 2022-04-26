<template>
      <div class="card d-flex flex-column">
          <div class="bg_image">
              <img v-if="user.img" :src="`../storage/${user.img}`">
              <img v-else :src="require(`../../../public/img/${user.id}.jpg`)">
          </div>
          <div class="card_name d-flex">
            {{user.activity}}
          </div>
          <div class="card_mail">
              {{user.email}}
          </div>
          <div class="types">
              <span v-for="(type,index) in user.types" :key="'type'+index" class="type">{{type.name}} <span v-if="index != user.types.length - 1"> · </span></span>
          </div>
      </div>
</template>

<script>
export default {
    name:"Card",
    props:{
        user: Object,
        types : Array
    }
}
</script>

<style lang="scss" scoped>
@import "../../sass/variables.scss";

    .card{
        text-decoration: none;
        color: $dark-color;
        width: 100%;
        height: 100%;
        border-radius: 15px;
        &:hover{
            text-decoration: none;
        }
        .bg_image{
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            
            img{
                width: 100%;
                //border-radius: 15px 15px 0px 0px;
            }
        }

        .card_name{
            text-transform: uppercase;
            font-weight:bold ;
        }
        .card_name{
            width: auto;
            word-wrap: none;
        };

    }
</style>