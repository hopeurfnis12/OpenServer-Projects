document.body.innerHTML = document.body.innerHTML + "<h1>Задание №1</h1>";

function symbolSum(s){
    var sum11 = 0;
    for (var i = 0; i < s.length; i++){
        if (s[i] == 'а'){
            sum11+=1;
        }
    }
    return sum11;
}

function getSum1(s){
    document.getElementById('label11').innerHTML = "Символов на букву \"а\" = " + symbolSum(s);
}

var textBox11 = document.createElement('input');
textBox11.id = 'textBox11';
document.body.appendChild(textBox11);

var button11 = document.createElement('button');
button11.setAttribute('onclick', 'getSum1(document.getElementById("textBox11").value)')
button11.innerHTML = "Посчитать";
document.body.appendChild(button11);
document.body.innerHTML = document.body.innerHTML + '<br>';

var label11 = document.createElement('label');
label11.id = 'label11';
label11.innerHTML = "";
document.body.appendChild(label11);



///////////////////////////////////////////
document.body.innerHTML = document.body.innerHTML + "<h1>Задание №2</h1>";

const name = ['Хлеб', 'Доширак', 'Яйцо 10шт.', 'Газировка 2л.'];
var price = [50, 70, 100, 150];
var amount = []; amount.length = name.length;
var checked = []; checked.length = name.length;

function getSum2(a, b, c){
    var sum21 = 0;
    for (var i = 0; i < a.length; i++){
        if (c[i] == true){
            sum21 += a[i] * b[i];
        }
    }
    return sum21;
}

function calc(){
    for (var i = 0; i < name.length; i++){
        if (document.getElementById('cb21' + i).checked == true){
            checked[i] = true;
        }
        else{
            checked[i] = false;
        }
        amount[i] = document.getElementById('it21' + i).value;
    }
    document.getElementById('label22').innerHTML = 'Итого: ' + getSum2(amount, price, checked) + ' руб.';
}

for(var i = 0; i < name.length; i++){
    var pp21 = document.createElement('p');
    pp21.id = 'pp21' + i;
    document.body.appendChild(pp21);

    var cb = document.createElement('input');
    cb.id = 'cb21' + i;
    cb.type = 'checkbox';
    document.getElementById('pp21' + i).appendChild(cb);

    document.getElementById('pp21' + i).innerHTML = document.getElementById('pp21' + i).innerHTML + name[i] + ' ' + price[i] + ' руб. ';

    var input21 = document.createElement('input');
    input21.id = 'it21' + i;
    document.getElementById('pp21' + i).appendChild(input21);

    document.getElementById('pp21' + i).innerHTML = document.getElementById('pp21' + i).innerHTML + 'шт.';
}

var button21 = document.createElement('button');
button21.setAttribute('onclick', 'calc()');
button21.innerHTML = 'Рассчитать';
document.body.appendChild(button21);

document.body.innerHTML = document.body.innerHTML + '<br>';

var label22 = document.createElement('label');
label22.id = 'label22';
label22.innerHTML = '';
document.body.appendChild(label22);



///////////////////////////////////////////
document.body.innerHTML = document.body.innerHTML + "<h1>Задание №3</h1>";
var userNames = [];
var userPasswords = [];

function checkPassword(userName, userPassword){
    for (var i = 0; i < userNames.length; i++){
        if (userName == userNames[i]){
            if (userPassword == userPasswords[i]){
                return alert('Вы авторизовались');
            }
            return alert('Неправильный логин или пароль!');
        } else {
            return alert('Неправильный логин или пароль!');
        }
    }
}

function signUp(userName, userPassword){
    for (var i = 0; i < userNames.length; i++){
        if (userName == userNames[i]){
            return alert('Логин уже занят!'); 
        }
    }
    if (userPassword.length < 6){
        return alert('Пароль должен иметь не менее 6 символов!');
    }
    userNames.push(userName);
    userPasswords.push(userPassword);
    return alert('Вы зарегистрировались');
}

var p31 = document.createElement('p');
p31.id = 'pp31';
p31.innerHTML = 'Логин:';
document.body.appendChild(p31);

var p32 = document.createElement('p');
p32.id = 'pp32';
p32.innerHTML = 'Пароль:';
document.body.appendChild(p32);

var input31 = document.createElement('input');
input31.id = 'it31';
document.getElementById('pp31').appendChild(input31);

var input32 = document.createElement('input');
input32.id = 'it32';
document.getElementById('pp32').appendChild(input32);

var button31 = document.createElement('button');
button31.id = 'bt31';
button31.innerHTML = 'Войти';
button31.setAttribute('onclick', 'checkPassword(document.getElementById("it31").value, document.getElementById("it32").value)');
document.body.appendChild(button31);

var button32 = document.createElement('button');
button32.id = 'bt32';
button32.innerHTML = 'Зарегистрироваться';
button32.setAttribute('onclick', 'signUp(document.getElementById("it31").value, document.getElementById("it32").value)');
document.body.appendChild(button32);



///////////////////////////////////////////
document.body.innerHTML = document.body.innerHTML + "<h1>Задание №4</h1>";

function findAverage(arr){
    var sum41 = 0;
    for (var i = 0; i < arr.cities.length; i++){
        sum41 += arr.cities[i].pop;
    }
    sum41 /= arr.cities.length;
    return sum41;
}

var arr = {
    cities:[
        {name:'Шанхай', pop:23.4},
        {name:'Пекин', pop:21.2},
        {name:'Мумбаи', pop:15.4},
        {name:'Стамбул', pop:15},
        {name:'Карачи', pop:14.9},
        {name:'Гуанчжоу', pop:14},
        {name:'Токио', pop:14},
        {name:'Лагос', pop:13.7}
        
    ]
};

var average = findAverage(arr);

var label41 = document.createElement('label');
label41.innerHTML = 'Среднее значение численности населения города: ' + average + ' млн. человек<br><br><b>Города с населением, превышающие среднее значение:</b>';
document.body.appendChild(label41);

for (var i = 0; i < arr.cities.length; i++){
    if (arr.cities[i].pop > average){
        var p = document.createElement('p');
        p.innerHTML = arr.cities[i].name + ': ' + arr.cities[i].pop + ' млн. человек';
        document.body.appendChild(p);
    }
}

var label42 = document.createElement('label');
label42.innerHTML = '<br><b>Города с населением, не превышающие среднее значение:</b>';
document.body.appendChild(label42);

for (var i = 0; i < arr.cities.length; i++){
    if (arr.cities[i].pop <= average){
        var p = document.createElement('p');
        p.innerHTML = arr.cities[i].name + ': ' + arr.cities[i].pop + ' млн. человек';
        document.body.appendChild(p);
    }
}