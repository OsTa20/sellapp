let update = document.getElementById('update');
let menu = document.getElementById('menu');
let menudiv = document.getElementById('menudiv');
let blackdiv = document.getElementById('blackdiv');
//let prodpa = document.getElementById('prodpa');
//let myprodpa = document.getElementById('myprodpa');
//let al_sla = document.getElementById('al_sla');
let container = document.querySelector('.container');

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

let addprodect = document.getElementById('addprodect');
let addprodectdiv = document.getElementById('addprodectdiv');
addprodect.onclick = function(){
  this.style.display = 'none';
  blackdiv.style.display = 'block';
  addprodectdiv.style.display = 'block';
}

let cancel = document.querySelector('#addprodectdiv #cancel');
cancel.onclick = function(){
  addprodectdiv.style.display = 'none';
  blackdiv.style.display = 'none';
  addprodect.style.display = 'block';
}
let save = document.querySelector('#addprodectdiv #save');
let savein = document.querySelector('#addprodectdiv #savein');
let imageFile = document.getElementById('imageFile');
save.onclick = function(){
  if(imageFile.value != ''){
    savein.click();
  }
  else {
    alert('يرجى إضافة صورة للمنتج');
  }
}
let pro_icondiv = document.getElementById('pro_icondiv');
pro_icondiv.onclick = function(){
  imageFile.click();
}
document.querySelector('input[type="file"]').addEventListener('change', function() {
  if (this.files && this.files[0]) {
    var img = document.querySelector('#addprodectdiv img');
    img.onload = () => {
      URL.revokeObjectURL(img.src); 
    }
    img.src = URL.createObjectURL(this.files[0]); 
  }
});

/*
myprodpa.onclick = function(){
  addprodect.style.display = 'block';
  container.style.display = 'block';
  prodpa.style.background = 'none';
  al_sla.style = 'background-color: none';
  myprodpa.style.background = 'blue';
}
prodpa.onclick = function(){
  addprodect.style.display = 'none';
  container.style.display = 'none';
  myprodpa.style.background = 'none';
  al_sla.style = 'background-color: none';
  prodpa.style.background = 'blue';
}
al_sla.onclick = function(){
  myprodpa.style.background = 'none';
  prodpa.style.background = 'none';
  al_sla.style.backgroundColor = 'blue';
}
*/