let menu = document.getElementById('menu');
let menudiv = document.getElementById('menudiv');
let blackdiv = document.getElementById('blackdiv');
let changepass = document.getElementById('changepass');

let menuvar = false;
menu.onclick = function(){
  if(menuvar == false){
    menu.textContent = '><';
    menudiv.style = "right:0";
    blackdiv.style.display = 'block';
    menuvar = true;
  }
  else {
    menu.textContent = '|||';
    menudiv.style = "right:-100%";
    blackdiv.style.display = 'none';
    menuvar = false;
  }
}

blackdiv.onclick = function(){
  if(menuvar == true){
    menudiv.style = "right: -100%";
    menu.textContent = '|||';
    blackdiv.style.display = 'none';
    menuvar = false;
  }
}

changepass.onclick = function(){
  let pass = prompt('هل تريد تغيير كلمة السر\n\nحسنا أدخل الكلمة الجديدة');
  if(pass != ''){
    document.getElementById('chpa_in').value = pass;
    document.getElementById('chpa_su').click();
  }
}