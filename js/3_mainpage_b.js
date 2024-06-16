let update = document.getElementById('update');
let menu = document.getElementById('menu');
let menudiv = document.getElementById('menudiv');
let blackdiv = document.getElementById('blackdiv');

update.onclick = function(){
  window.location.reload();
}

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