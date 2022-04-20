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
          <div v-show="inputText != null && inputText != '' " class="input-toggle">
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
          <a class="nav-link" href="#">
            <i class="fa-solid fa-basket-shopping"></i> 
            <span class="price"> 0.00 </span> €
          </a>
        </li>
        <li class="nav-item">
          <a href="/admin/recap" class="nav-link"> 
            <i class="fa-solid fa-house"></i> Registrati o Accedi
          </a>
        </li>
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
      usersArr: []
    }
  },
  methods: {
    search(e){
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
        this.typesArr.push (...response.data);
        console.log(this.typesArr);
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
  }
}
</script>

<style lang="scss" scoped>
.navbar-light .navbar-toggler {
    margin: 0 20px;
}

.main-nav{

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
    height: 0px;
    // animation: toggle 500ms linear forwards;
    left: 0;
    position: absolute;
    width: 100%;
    background-color: #EFF0F2;
}
@keyframes toggle {
  to {min-height: 10px;
    height: unset;
  }
}
</style>