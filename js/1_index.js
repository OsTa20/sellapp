let logodiv = document.getElementById('logodiv');
let singindiv = document.getElementById('singindiv');
let username = document.getElementById('username');
let userpass = document.getElementById('userpass');
let showpass = document.getElementById('showpass');
let userphon = document.getElementById('userphon');
let ws_la = document.getElementById('ws_la');
let usersel = document.getElementById('usersel');
let userpass2 = document.getElementById('userpass2');
let userphon2 = document.getElementById('userphon2');
let usersel2 = document.getElementById('usersel2');
let logindiv = document.getElementById('logindiv');
let luserpass = document.getElementById('luserpass');
let lshowpass = document.getElementById('lshowpass');
let hshowpass = document.getElementById('hshowpass');
let hasmarkdiv = document.getElementById('hasmarkdiv');
let profildiv = document.getElementById('profildiv');
let imageFile = document.getElementById('imageFile');
let noacc_of = document.getElementById('noacc_of');
let login = document.getElementsByClassName('login');
let createac = document.getElementById('createac');
let createacin = document.getElementById('createacin');
let loginp = document.getElementById('loginp');
let loginin = document.getElementById('loginin');
let createac2 = document.getElementById('createac2');
let createacin2 = document.getElementById('createacin2');
let hasm = document.getElementById('hasm');

let time_tosin = setTimeout(function(){
  logodiv.style = "display:none";
  document.body.style = 'background-color: white';
  if (localStorage.singin == undefined){
     //window.open('http://0.0.0.0:8080/html/privite/mainpage_s.php');
         //// edit
    if(window.navigator.onLine == false){  ////////... edit
      singindiv.style = "display:block";
    }
    else {
      noacc_of.style.display = 'block';
    }
  }
},2000);  //////.....edit

hasm.onclick = function(){
  singindiv.style.display = 'none';
  hasmarkdiv.style.display = 'block';
}

login[0].onclick = function(){
  singindiv.style.display = 'none';
  logindiv.style.display = 'block';
}
login[1].onclick = function(){
  logindiv.style.display = 'none';
  singindiv.style.display = 'block';
}
login[2].onclick = function(){
  hasmarkdiv.style.display = 'none';
  singindiv.style.display = 'block';
}

let showpass_var = false;
showpass.onclick = function(){
  if(showpass_var == false){
    userpass.type = 'text';
    showpass.style = "background-image: url('../img/4_eye.svg');";
    showpass_var = true;
  }
  else {
    userpass.type = 'password';
    showpass.style = "background-image: url('../img/3_eyen.svg');";
    showpass_var = false;
  }
}
let lshowpass_var = false;
lshowpass.onclick = function(){
  if(lshowpass_var == false){
    luserpass.type = 'text';
    lshowpass.style = "background-image: url('../img/4_eye.svg');";
    lshowpass_var = true;
  }
  else {
    luserpass.type = 'password';
    lshowpass.style = "background-image: url('../img/3_eyen.svg');";
    lshowpass_var = false;
  }
}
let hshowpass_var = false;
hshowpass.onclick = function(){
  if(hshowpass_var == false){
    userpass2.type = 'text';
    hshowpass.style = "background-image: url('../img/4_eye.svg');";
    hshowpass_var = true;
  }
  else {
    userpass2.type = 'password';
    hshowpass.style = "background-image: url('../img/3_eyen.svg');";
    hshowpass_var = false;
  }
}

createac.onclick = function(){
  if(username.value.length > 14){
    alert('الاسم كبير جدا');
  }
  else {
      if((username.value != '') && (userpass.value != '') && (userphon.value.length == 1)){  
        //edit
        username.value = username.value.replaceAll(" ",'_');
        if(window.navigator.onLine == false){  ///////////......edit
          createacin.click();
        }
        else {
          alert("تأكد من اتصالك بالانترنت");
        }
      }
      else {
        createacin.click();
      }
  }
}

loginp.onclick = function(){
  loginin.click();
}
createac2.onclick = function(){
  if(imageFile.value != ''){
    if(window.navigator.onLine == false){  ///////////......edit
      createacin2.click();
    }
    else {
      alert("تأكد من اتصالك بالانترنت");
    }
  }
  else {
    alert('الرجاء رفع صورة الغلاف');
  }
}

profildiv.onclick = function(){
  imageFile.click();
}
//  mar-icon
document.querySelector('input[type="file"]').addEventListener('change', function() {
  if (this.files && this.files[0]) {
    var img = document.querySelector('#hasmarkdiv img');
    img.onload = () => {
      URL.revokeObjectURL(img.src); 
    }
    img.src = URL.createObjectURL(this.files[0]); 
  }
});