<template>
  <div class="container">
    <div class="not-found">
      <div class="image-error"></div>
      <div class="text">
        <h1>Pagina Non Trovata</h1>
        <p>La pagina che stai cercando non esiste</p>
        <router-link class="back" :to="{ name: 'main'}">Torna alla Home </router-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name:"NotFound"
}
</script>

<style lang="scss" scoped>

.not-found{
    background: url('https://deliveroo.it/assets/images/error-pages/background-7edaa013aceff22965bdb7fbf274b4a2.svg');
    text-align: center;
    padding: 137px 16px 32px;
    position: relative;
    height: 300px;

      h1{
        font-size: 40px;
      }
}

.image-error{
    background: url('https://deliveroo.it/assets/images/error-pages/roo-5c784b3ea96399e6269af8a11ec6349c.svg');
    position: absolute;
    width: 200px;
    height: 145px;
    left: 450px;
    top: 200px;
}

.text{
    position: absolute;
    top: 390px;
    left: 390px;
    text-align: center;

  p{
    margin-bottom: 50px;
  }

  .back{
    background-color: #00ccbb;
    color: white;
    font-size: 15px;
    padding: 9px;
    border-radius: 10px;

    &:hover{
      text-decoration: none;
    }
  }
}
</style>