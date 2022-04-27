document.writeln(`<img style="display:none;" id='sushiMovente' src="https://img.ilgcdn.com/sites/default/files/styles/xl/public/foto/2022/03/03/1646293625-dinosauro.jpg?_=1646293625" alt="">`);
const cambiaStyle = document.getElementById('sushiMovente');
cambiaStyle.style.width ="60px";
cambiaStyle.style.position ="fixed";
cambiaStyle.style.top ="0";
cambiaStyle.style.left ="0";
cambiaStyle.style.display ="block";
cambiaStyle.style.zIndex ="10000000";

let maxW = document.documentElement.clientWidth - 60;
let minW = 0;
let maxH = document.documentElement.clientHeight - 40;
let minH = 0;
let tempo = 4000;
const sushino = setInterval(() => {
    lanciasushi();
}, tempo);

window.addEventListener("resize", function(){
    maxW = document.documentElement.clientWidth - 60;
    minW = 0;
    maxH = document.documentElement.clientHeight - 40;
    minH = 0;
    lanciasushi();
});

let lastPosX = 0;
let lastPosY = 0;
let randomX = 0;
let randomY = 0;
let privilegiaPositivi = true;
let positivi = 0;
function lanciasushi(){
    console.log(maxW,maxH);// qua leggo la cosa giù decrementata
    //e a volte il dinosauro supera la with
    const elemento = document.getElementById('sushiMovente');
    //(maxW - 60)
    //(maxH - 40)
    randomX += Math.floor(Math.random()*401-200);
    randomY += Math.floor(Math.random()*401-200);

    if(randomX < minW + 150 )
        privilegiaPositivi = true;
    if(randomX > maxW - 150 )
        privilegiaPositivi = false;

    if(privilegiaPositivi){
        if(randomX < lastPosX){
            console.log('privilegio i positivi');
            while(randomX < lastPosX || randomY < lastPosY){
                randomX += 20;
                randomY += 10;
            }
        } 
    } else {
        if(randomX > lastPosX){
            console.log('privilegio i negativi');
            while(randomX > lastPosX || randomY > lastPosY){
                randomX -= 20;
                randomY -= 10;
            }
        } 
    }

    if(randomX < minW){
        randomX = minW + 100;
        console.log('randomX < minW')
    }
    if(randomX > maxW){
        randomX = maxW - 100;
        console.log('randomX > maxW')
    }
    if(randomY < minH){
        randomY = minH + 100;
        console.log('randomY < minH')
    }
    if(randomY > maxH){
        randomY = maxH - 100;
        console.log('randomY > maxH')
    }

    let time = (Math.abs(randomX - lastPosX) + Math.abs(randomY - lastPosY))/100;
    time = time.toFixed(1);
    if(time > 3.5)
        time = 3.5;
    if(randomX > (maxW/2) + 100)
        document.getElementById('sushiMovente').style.transform ="rotateY(180deg)";
    if(randomX < (maxW/2) - 100)
        document.getElementById('sushiMovente').style.transform ="rotateY(0deg)";
    document.getElementById('sushiMovente').style.transition =`top ${time}s, left ${time}s`;
    console.log('time',time)
    console.log(randomX,randomY,lastPosX,lastPosY);
    lastPosX =randomX;
    lastPosY =randomY;
    elemento.style.left = `${randomX}px`;
    elemento.style.top = `${randomY}px`;
}

//0.5 ogni 100px
