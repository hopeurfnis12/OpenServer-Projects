var bg = new Image();
bg.src = "images/bg2.jpg";

var cat = [new Image()];
for(var i=0; i<7; i++)
{
    cat[i].src = "images/cat"+(i+1)+".png";
    cat.push(new Image());
}

var cvs = document.getElementById("canvas");
var ctx = cvs.getContext("2d");

cvs.width  = window.innerWidth;
cvs.height = window.innerHeight;

var i=0;
var posX = 0;

function drawCat() {
    setTimeout(function() {
        //рисуем фон:
        ctx.drawImage(bg, posX, 0, cvs.width, cvs.height);
        ctx.drawImage(bg, cvs.width+posX, 0, cvs.width, cvs.height);
        posX -= 5;
        if(posX <= -cvs.width) posX = 0;

        //рисуем кота:
        ctx.drawImage(cat[i], 450, 280);
        i++;
        if(i == 7) i = 0;

        requestAnimationFrame(drawCat); //устанавливаем цикл на функцию
    }, 80);                           
}

drawCat();