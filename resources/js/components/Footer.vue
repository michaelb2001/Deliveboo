<template>
<div class="footer-container">
  <div class="discover-deliveboo">
    <ul><span>Scopri Deliveboo</span>
      <li><a href="">Investitori</a></li>
      <li><a href="">Chi siamo</a></li>
      <li><a href="">Ristoranti</a></li>
      <li><a href="">Altro</a></li>
      <li><a href="">Pressroom</a></li>
      <li><a href="">Il nostro blog</a></li>
      <li><a href="">Programmazione</a></li>
      <li><a href="">Design</a></li>
      <li><a href="">Lavora con noi</a></li>
      <li><a href="">Diventa nostro partner</a></li>
    </ul>
    <div class="icons">
    <i class="fab fa-facebook"></i>
    <i class="fab fa-twitter"></i>
    <i class="fab fa-instagram"></i>
  </div>
  </div>
  <div class="legal-notices">
    <ul><span>Note legali</span>
      <li><a href="">Termini & Condizioni</a></li>
      <li><a href="">Informativa sulla privacy</a></li>
      <li><a href="">Cookies</a></li>
    </ul>
  </div>
  <div class="help">
    <ul><span>Aiuto</span>
      <li><a href="">Contatti</a></li>
      <li><a href="">FAQ</a></li>
      <li><a href="">Tipi di cucina</a></li>
    </ul>
  </div>
  <div class="take-deliveboo">
    <ul><span>Porta Deliveboo con te</span></ul>
  </div>
</div>
</template>

<script>
export default {
  name: 'Footer'
}
</script>

<style lang="scss" scoped>

.footer-container{
  height: 380px;
  background-color: #2E3333;
  color: white;
  display: flex;
  justify-content: center;
  padding: 25px;

  ul{
    list-style-type: none;
    font-weight: bolder;
    margin-right: 25px;
  }

  a{
    color: white;

    &:hover{
      text-decoration: none;
      color: #00B8A9;
    }
  }

  span{
    line-height: 40px;
  }
}

.discover-deliveboo, .legal-notices, .help, .take-deliveboo{
  background-color: #434848;
  margin-right: 15px;
  padding: 10px;
}

.icons{
  margin-top: 50px;
  height: 24px;
  widows: 24px;

  i{
    margin-right: 10px;
  }
}

.take-deliveboo{
  // background: url('https://consumer-component-library.roocdn.com/25.27.9/static/images/app-store-badges-it.svg');
  background-repeat: no-repeat;
  background-size: cover;
}
</style>