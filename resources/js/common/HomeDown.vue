<template>
  <div class="home-down">
    <h1>La selezione di Deliveboo</h1>
    <div class="selection row row-cols-2">
        <div class="container-info col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
            <div class="comfort-food d-flex justify-content-center align-items-center">
                <h1>Comfort food</h1>
            </div>
            <div class="text-info">
                <p>I grandi classici che scaldano il cuore, perfetti in ogni momento.</p>
                <p><a href="">Scopri Comfort food</a></p>
            </div>
        </div>
        <div class="container-info col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="dessert d-flex justify-content-center align-items-center">
                <h1>Dolci e dessert</h1>
            </div>
            <div class="text-info">
                <p>Dolci piaceri per rendere la giornata ancora più gustosa.</p>
                <p><a href="">Scopri Dolci e dessert</a></p>
            </div>
        </div>
        <div class="container-info col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
            <div class="share d-flex justify-content-center align-items-center">
                <h1>Perfetti da condividere</h1>
            </div>
            <div class="text-info">
                <p>Serve una scusa per stare insieme? Ordina dai ristoranti che trasformeranno la tua serata in una vera festa</p>
                <p><a href="">Scopri Perfetti da condividere</a></p>
            </div>
        </div>
        <div class="container-info col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
            <div class="exclusive d-flex justify-content-center align-items-center">
                <h1>Esclusiva Deliveboo</h1>
            </div>
            <div class="text-info">
                <p>I più famosi, i più buoni, i preferiti. Quelli che trovi solo su Deliveboo.</p>
                <p><a href="">Scopri Esclusiva Deliveboo</a></p>
            </div>
        </div>
    </div> 
</div>
        
</template>

<script>
export default {
    name:"HomeDown",
}
</script>

<style lang="scss" scoped>

.home-down{
    width: 82%;
    margin: auto;
    margin-top: 30px;
}

.home-down, .selection{
    font-family: plex-sans, "Helvetica Neue", Helvetica, Arial, "Microsoft YaHei", "Hiragino Sans GB", sans-serif;
}

h1{
    font-family: sans-serif;
    font-weight: bold;
    margin-bottom: 20px;
}

.selection{
    display: flex;
    flex-wrap: wrap;

    .comfort-food{
        //width: 100%;
        height: 150px;
        background: url('https://f.roocdn.com/images/menu_tags/288/menu-tag-image.jpg?width=430&height=150&auto=webp&format=jpg&fit=crop&v=1648802301');
        background-repeat: no-repeat;
        background-size: cover;
    }
    .dessert{
        //width: 40vw;
        height: 150px;
        background: url('https://f.roocdn.com/images/menu_tags/328/menu-tag-image.jpg?width=660&height=150&auto=webp&format=jpg&fit=crop&v=1548761261');
        background-repeat: no-repeat;
        background-size: cover;
    }
    .share{
        //width: 40vw;
        height: 150px;
        background: url('https://f.roocdn.com/images/menu_tags/291/menu-tag-image.jpg?width=660&height=150&auto=webp&format=jpg&fit=crop&v=1547125828');
        background-repeat: no-repeat;
        background-size: cover;
    }
    .exclusive{
        //width: 100%;
        height: 150px;
        background: url('https://f.roocdn.com/images/menu_tags/293/menu-tag-image.jpg?width=430&height=150&auto=webp&format=jpg&fit=crop&v=1547125827');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .comfort-food, .dessert, .share, .exclusive h1{
        color: white;
    }

    .comfort-food, .dessert, .share, .exclusive{
        display: flex;
        justify-content: center;
        align-items: center;

        h1{
            font-family: sans-serif;
            font-weight: bold;
        }
    }

    .text-info{
        margin-top: 20px;
        margin-bottom: 30px;
    }

    .text-info a{
        color: #00B8A9;
        text-decoration: none;
    }

    .text-info p{
        color: black;
        margin-top: 0;
        font-size: 16px;
        line-height: 20px;
    }

}

.container-info{
    display: flex;
    flex-direction: column;
}

p{
    margin:6px 0px;
    white-space: 5px;
}

/*transform: skewY(-6deg);*/
</style>