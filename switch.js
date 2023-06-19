document.querySelector("#check").addEventListener("click", function(){

const login = document.querySelector("#login");
const reg = document.querySelector("#reg");

var x = login.currentStyle ? login.currentStyle.display: getComputedStyle(login, null).display;

if(x === (login.style.display = 'block')){

    login.style.display = 'none';
    reg.style.display = 'block';
}
else if(x === (login.style.display = 'none')){
    login.style.display = 'block'
    reg.style.display = 'none';
}

});


