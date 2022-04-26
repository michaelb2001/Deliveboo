<template>
  <div>
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

    <h1>La selezione di Deliveboo</h1>
    <div class="selection">
        <div class="container-info">
            <div class="comfort-food">
                <h1>Comfort food</h1>
            </div>
            <div class="text-info">
                <span>I nostri classici che scaldano il cuore, perfetti in ogni momento.</span>
                <p><a href="">Scopri Comfort food</a></p>
            </div>
        </div>
        <div class="container-info">
            <div class="dessert">
                <h1>Dolci e dessert</h1>
            </div>
            <div class="text-info">
                <p>Dolci piaceri per rendere la giornata ancora più gustosa.</p>
                <p><a href="">Scopri Dolci e dessert</a></p>
            </div>
        </div>
        <div class="container-info">
            <div class="share">
                <h1>Perfetti da condividere</h1>
            </div>
            <div class="text-info">
                <p>Serve una scusa per stare insieme? Ordina dai ristoranti che trasformeranno la tua serata in una vera festa</p>
                <p><a href="">Scopri Perfetti da condividere</a></p>
            </div>
        </div>
        <div class="container-info">
            <div class="exclusive">
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
    name:"Home",
    data(){
        return{
            inputText: "",
        }
    },
}
</script>

<style lang="scss" scoped>

.selection{
    display: flex;
    flex-wrap: wrap;

    .comfort-food{
        width: 100%;
        height: 150px;
        background: url('https://f.roocdn.com/images/menu_tags/288/menu-tag-image.jpg?width=430&height=150&auto=webp&format=jpg&fit=crop&v=1648802301');
        background-repeat: no-repeat;
        background-size: cover;
    }
    .dessert{
        min-width: 700px;
        height: 150px;
        background: url('https://f.roocdn.com/images/menu_tags/328/menu-tag-image.jpg?width=660&height=150&auto=webp&format=jpg&fit=crop&v=1548761261');
        background-repeat: no-repeat;
        background-size: cover;
    }
    .share{
        min-width: 100%;
        height: 150px;
        background: url('https://f.roocdn.com/images/menu_tags/291/menu-tag-image.jpg?width=660&height=150&auto=webp&format=jpg&fit=crop&v=1547125828');
        background-repeat: no-repeat;
        background-size: cover;
    }
    .exclusive{
        width: 100%;
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

    .text-info a{
        color: #00B8A9;
        text-decoration: none;
    }

    .text-info p{
        color: black;
    }

}

.container-info{
    display: flex;
    flex-direction: column;
    margin-right: 20px;
}





/*transform: skewY(-6deg);*/
</style>