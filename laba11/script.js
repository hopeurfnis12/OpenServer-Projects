var bg = new Image();
bg.src = "images/bg.jpg";

var cat = [new Image()];
for(var i=0; i<7; i++)
{
    cat[i].src = "images/cat"+(i+1)+".png";
    cat.push(new Image());
}

var cvs = document.getElementById("canvas");
cvs.setAttribute('onClick', "checkCoord()");
var ctx = cvs.getContext("2d");

cvs.width  = 1366;
cvs.height = 720;

bg.onload = function(){
    ctx.drawImage(bg,0,0, cvs.width, cvs.height);   
}

var bool = true;
var sizeWave = 20;

var cadr = []; cadr.length = sizeWave;
for (let i = 0; i < cadr.length; i++){
    cadr[i] = 0;
}

var posX = []; posX.length = sizeWave;
for (let i = 0; i < posX.length; i++){
    posX[i] = 100;
}
var posY = []; posY.length = sizeWave;

var freezed = []; freezed.length = sizeWave;
for (let i = 0; i < freezed.length; i++){
    freezed[i] = true;
}

function drawCat(i, posX, posY){
    return ctx.drawImage(cat[i], 0 - posX, posY, 100, 75);
}

function drawCanvas() {
    setTimeout(function() {
        //рисуем фон:
        ctx.drawImage(bg, 0, 0, cvs.width, cvs.height);

        setTimeout(function(){
        var rnd = Math.floor(Math.random() * sizeWave);
        if (freezed[rnd] == true){
            freezed[rnd] = false;
            posY[rnd] = Math.floor(Math.random() * 630 + 50);
        }
    },Math.floor(Math.random() * 17000 + 3000));
        //рисуем кота:
        for (let i = 0; i < sizeWave; i++){
            if (freezed[i] != true){
                posX[i] -= 10;
                if(posX[i] <= -cvs.width){
                    posX[i] = 100;
                    freezed[i] = true;
                    cadr[i] = 0;
                    document.getElementById('hp').value = document.getElementById('hp').value - 1;
                    document.getElementById('hp').innerHTML = ' HP: ' + document.getElementById('hp').value;
                    if (document.getElementById('hp').value < 1){
                        var m = document.getElementById('main');
                        m.style.filter = 'blur(10px)';
                        m.style.pointerEvents = 'none';
                        document.getElementById('sbmt').hidden = false;
                        document.getElementById('sbmt').style.pointerEvents = "none";
                        document.getElementById('sbmt').innerHTML = "Вы проиграли!<br>Чтобы начать сначала, обновите страницу";
                        bool = false;
                    }
                }
                if (freezed[i] != true){ 
                    drawCat(cadr[i], posX[i], posY[i]);
                    cadr[i]++;
                    if(cadr[i] == 7) cadr[i] = 0;
                }
            }
        }
        if(bool == true) requestAnimationFrame(drawCanvas); //устанавливаем цикл на функцию
    }, 80);                           
}


document.write('<br>');
let score = document.createElement('label');
score.id = 'score';
score.value = 0;
score.innerHTML = ' Points: ' + score.value;
document.body.appendChild(score);
document.write('<br>');

let hp = document.createElement('label');
hp.id = 'hp';
hp.value = 5;
hp.innerHTML = ' HP: ' + hp.value;
document.body.appendChild(hp);
function checkCoord(){
    var x = event.clientX;
    var y = event.clientY;

    for (let i = 0; i < sizeWave; i++){
        if ((posX[i] * (-1) + 2) <= x && x <= (posX[i]) * (-1) + 98){
            if (posY[i] + 2 <= y && y <= posY[i] + 73){
                freezed[i] = true;
                posX[i] = 100;
                document.getElementById('score').value = document.getElementById('score').value + 10;
                document.getElementById('score').innerHTML = " Points: " + document.getElementById('score').value;
                break;
            }
        }
    }
}

function Start(elem) {
  document.getElementById('sbmt').hidden = true;
  var m = document.getElementById('main');
  m.style.filter = 'blur(0px)';
  m.style.pointerEvents = 'auto';
  drawCanvas();
}