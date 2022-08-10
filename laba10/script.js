//Шаблон игры "Найди одинаковые картинки"

var arr = []; //массив случайных чисел для генерации картинок
var trabl = 0; //счетчик открытых квадратов
var finish = 0; //подсчет выигрышей
var span = document.getElementById("span");
var bool = true;
//кликаем на квадратик
function ClickBox(elem, i) {
	var box = document.getElementById(elem.id);
	//var box2 = document.getElementByClassName("div1");
	var c = arr[i-1] + 1;
	box.style.backgroundImage = 'url("images/img' + c + '.jpg")';
	
	if(trabl == 0) trabl = elem;
	else 
	{
		var tr = document.getElementById(trabl.id);
		if(tr.style.backgroundImage == box.style.backgroundImage){ 
			setTimeout(DeleteBox, 300, elem);
		}
		else{
			trabl = elem;
			setTimeout(CloseBox, 300);
		}
	}
}

//закрашиваем угаданные квадраты желтым цветом
function DeleteBox(el){
	var box1 = document.getElementById(el.id);
	var box2 = document.getElementById(trabl.id);
	box1.style.background = 'green';
	box2.style.background = 'green';
	trabl=0;
	finish++;
	
	if(finish == 8) {
  	bool = false;
		var m = document.getElementById('main');
		m.style.filter = 'blur(10px)';
  	m.style.pointerEvents = 'none';
  	document.getElementById('sbmt').hidden = false;
  	document.getElementById('sbmt').style.pointerEvents = "none";
  	document.getElementById('sbmt').innerHTML = "Поздравляем!<br>Чтобы начать сначала, обновите страницу";
	}
	return trabl;
}

//закрываем квадраты
function CloseBox(){
    var chDiv = document.getElementsByClassName("div1");
	for(var i=0; i<chDiv.length; i++)
	{
		if(getComputedStyle(chDiv[i], '').backgroundColor == 'rgba(0, 0, 0, 0)')
			chDiv[i].style.backgroundImage = 'url("images/rub.jpg")';
	}
	trabl=0;
	return trabl;
}

//возвращаем случайное число
function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

//возвращаем количество одинаковых чисел
function ReturnTr(tr){
	var t=0;
	for(var i=0; i<arr.length; i++)
	{
		if (tr == arr[i]) t++;
	}
	return t;
}

//заполняем массив arr случайными числами
function Start(elem) {
	for(var i=0; i<16; i++)
	{
		var tr = getRandomInt(0, 7);
		
		if (ReturnTr(tr) < 2) arr[i] = tr;
		else i--;
	}
  document.getElementById('sbmt').hidden = true;
  var m = document.getElementById('main');
  m.style.filter = 'blur(0px)';
  m.style.pointerEvents = 'auto';
  findTIME();
}


function trim(string) {
	return string.replace (/\s+/g, " ").replace(/(^\s*)|(\s*)$/g, '');
}
 var init=0;
 var startDate;
 var clocktimer;

function startTIME() {
	if(bool == true){
	  var thisDate = new Date();
	  var t = thisDate.getTime() - startDate.getTime();
	  var ms = t%1000; t-=ms; ms=Math.floor(ms/10);
	  t = Math.floor (t/1000);
	  var s = t%60; t-=s;
	  t = Math.floor (t/60);
	  var m = t%60; t-=m;
	  t = Math.floor (t/60);
	  if (m<10) m='0'+m;
	  if (s<10) s='0'+s;
	  if (ms<10) ms='0'+ms;
	  if (init==1) document.clockform.clock.value = m + ':' + s + '.' + ms;
	  clocktimer = setTimeout("startTIME()",10);
	}
}


function findTIME() {
  if (init==0) {
   startDate = new Date();
   startTIME();
   init=1;
  } 
  else {
   var str = trim(document.clockform.label.value);
   document.getElementById('marker').innerHTML = (str==''?'':str+': ') + 
    document.clockform.clock.value + '<br>' + document.getElementById('marker').innerHTML;
   clearFields();
  }
 }