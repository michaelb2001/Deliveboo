<template>
<nav class="main-nav navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="nav-box w-100 d-flex">
      <a class="logo navbar-brand" href="/">
        <img class="logo" src="https://consumer-component-library.roocdn.com/25.27.6/static/images/logo-teal.svg" alt="">
      </a>

      <div class="input-box d-flex justify-content-center align-items-center">
        <i class="fa-solid fa-magnifying-glass"></i>
        <div class="input-form">
          <input @keyup="search()" v-model="inputText" class="form-control" type="text" placeholder="Ristoranti, Tipologie" aria-label="Search">
          
          <div v-show="load" class="input-toggle">
            <div class="users">
              <div @click="clean()" class="user" v-for="(user,index) in usersArr"  :key="'userSearched'+index">
                <router-link class="link-card" :to="{name : 'CardUser' , params:{activity:user.activity,user:user} }">
                  <div class="image">
                    <img v-if="user.img" :src="`../storage/${user.img}`">
                    <img v-else :src="require(`../../../public/img/${user.id}.jpg`)">
                  </div>
                  <div class="name">
                    {{user.activity}}
                  </div>
                </router-link>
              </div>
            </div>
          </div>

      </div>
      </div>
    <!--<router-link class="title" :to="{name : 'home'}">Isntagram</router-link>-->

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>

    <div class="nav-item-box collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="d-flex justify-content-center navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a href="/admin/recap" class="nav-link"> 
            <i class="fa-solid fa-house"></i> Registrati o Accedi
          </a>
        </li>

        <li class="nav-item">

          <a v-if="!user" class="nav-link" href="">
            <i class="fa-solid fa-basket-shopping"></i> 
            <span class="price"> 0.00 </span> €
          </a>

          <router-link v-else class="nav-link" :to="{name : 'CardUser' , params:{activity:user.activity,user:user} }">
           <i class="fa-solid fa-basket-shopping"></i> 
            <span class="price"> {{(tot.toFixed(2))}} </span> €
            </router-link>
        </li>

        <!-- Visualizza ordini -->
        <!--<li>
          <button @click="open()" class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">IL MIO ORDINE</button>
          <div class="d-none offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
              <div class="text-center mt-3">
                <h5 id="offcanvasRightLabel ">IL MIO ORDINE</h5>
              </div>
              <div class="d-flex justify-content-around">
                <p>Margherita (esempio)</p>
                
                <div class="col btn-add-remove d-flex align-items-center">
                  <div @click="(quantity - 1 >= 1 ) ? quantity-- : null" class="btn btn-three">
                    <span>-</span>
                  </div>

                  <div class="quantity">
                    {{quantity}}
                  </div>

                  <div @click="quantity++" class="btn btn-three">
                    <span>+</span>
                  </div>
                </div>

                <span>4,50 €</span>
              </div>
              <div class="box-btn-close text-center p-3">
                <button type="button" class="btn-close btn-close-option text-reset" data-bs-dismiss="offcanvas" aria-label="Close">Chiudi</button>
              </div>
              
            </div>
            <div class="offcanvas-body">
              
            </div>
          </div>
        </li>-->
        
      </ul>
    </div>
  </div>
</nav>
</template>

<script>
export default {
  name: 'Header',
  data(){
    return{
      inputText: "",
      urlTypes : '/api/searcht/',
      urlUsers : '/api/searchu/',
      typesArr: [],
      usersArr: [],
      load: false,
      quantity: 1,
    }
  },
  props:{
    tot: Number,
    user: Object,
  },
  methods: {
    clean(){
      this.usersArr = [],
      this.inputText = "";
    },
    search(){
      this.searchT();
      this.searchU();
    },
    searchT(){
      let adaptText = this.inputText.replace(/\s+/g, '');
      adaptText = adaptText.toLowerCase();
      if(adaptText == ''){
        return 0;
      }
      axios.get(this.urlTypes+adaptText)
        .then((response) => {
      // handle success
        this.usersArr = [];
        this.typesArr.push (...response.data);
        this.load = true;
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      });
    },
    searchU(){
      let adaptText = this.inputText.replace(/\s+/g, '');
      adaptText = adaptText.toLowerCase();
      if(adaptText == ''){
        return 0;
      }
      axios.get(this.urlUsers+adaptText)
        .then((response) => {
      // handle success
        this.usersArr.push (...response.data);
        console.log(this.usersArr);
      })
      .catch(function (error) {
        // handle error
        console.log(error);
      });
    },
    open(){
    document.getElementById("offcanvasRight").classList.remove("d-none");
    }
  }

}
</script>

<style lang="scss" scoped>
@import '../../sass/front.scss';

.offcanvas{
  position:absolute;
  top:75px;
  right:0px;
  height:90vh;
  min-width: 16%;
  box-shadow: 0 8px 32px 0 rgb(31 38 135 / 20%);
  border-radius: 5px;
  z-index:1500;
  background: $light-color;
}

.navbar-light .navbar-toggler {
    margin: 0 20px;
}

.main-nav{
  border-bottom: 1px solid $grey-color;

  .nav-item-box{
    width: 60%;

    .show ul{
      width: 100%;
    }

    &.show ul{
      margin-top: 20px;
    }

    .nav-item{
      margin: 0 15px;
      padding: 2px 10px;
      border: 1px solid rgba(0,0,0,.04);
      border-radius: 5px;
      cursor: pointer;
      color: black;

      &:hover{
        border: 1px solid #d1d4d4;
      }

      .fa-solid{
        color: #00ccbb;
      }
    }
  }

  .input-box{
    color: #495057;
    background: rgba(0,0,0,.04);
    width: 75%;
    position: relative;
    border-radius: 5px;

    .fa-magnifying-glass{
      z-index: 1;
      color: #bfbfbf;
      font-size: 1.3em;
      position: absolute;
      top: 14px;
      left: 14px;
    }

    .input-form{
      width: 100%;
      position: relative;

      input{
        width: 100%;
        padding: 24px 10px 24px 50px;
        border: unset;
        background-color: unset;

        &:focus{
          color: #495057;
          background-color: white;
          outline: 2px solid black;
          box-shadow: unset;
        }
      }
    }
  }

  a.logo{
    width: 120px;
    overflow: hidden;
    margin-right: 50px;

    img{
      width: 100%;
    }
  }
}

@media screen and (max-width: 500px) {
  .input-box{
    width: 90%!important;
  }

  a.logo{
      width: 60%!important;
      margin: unset!important;
  }

  .nav-box{
    flex-direction: column;
    justify-content: center;
    align-items: center;

    button{
      margin: 10px 20px!important;
      width: 60%;
    }
  }
}

.input-toggle{
  min-height: 0;
    //height: 0px;
    // animation: toggle 500ms linear forwards;
    left: 0;
    top: 50px;
    position: absolute;
    z-index: 999;
    width: 100%;
    padding: 0 15px;
    background-color: white;
    //background-color: #EFF0F2;
    
    .user{
      height: 70px;
      margin: 10px 0;
    }

    .link-card{
      text-decoration: none;
      display: flex;
      align-items: center;
      height: 100%;

      &:hover{
        background-color: #EFF0F2;
      }

      .image{
        height: 70px;
        border-radius: 8px;
        width: 70px;
        display: flex;
        justify-content: center;
        overflow: hidden;

        img{
          min-width: 100%;
          min-height: 100%;
          flex-shrink: 0;
        }
      }

      .name{
        margin: 0 15px;
        font-weight: bold;
        color: black;
        font-size: 1.2em;
      }
    }
}
@keyframes toggle {
  to {min-height: 10px;
    height: unset;
  }
}

.box-btn-close{
  color: $light-color;

  .btn-close-option{
    width: 100%;
    margin-bottom: 15px;
    background-color: $third-color;
    border: 1px solid $third-color;
    border-radius: 5px;

    &:hover{
      background-color: #8f3d82;
      border: 1px solid #8f3d82 ;
    }
}
}

.btn-add-remove{
  margin-bottom: 25px;
  .btn-three {
    color: $third-color;
    transition: all 0.5s;
    position: relative;
    font-size: 25px;

      &:before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        background-color: rgba(255,255,255,0.1);
        transition: all 0.3s;
      }
      &:hover:before{
        opacity: 0 ;
        transform: scale(0.5,0.5);
      }
      &:after{
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        opacity: 0;
        transition: all 0.3s;
        border: 2px solid $third-color;
        transform: scale(1.2,1.2);
      }
      &:hover::after{
        opacity: 1;
        transform: scale(1,1);
      }
  }
}


</style>