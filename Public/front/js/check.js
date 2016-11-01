 window.onload = function(){
  document.getElementById("username").value="";
  document.getElementById("password").value="";
  document.getElementById("phone").value="";
 

 var a, b, c,d; 
 var diva = document.getElementById("diva");
 var divb = document.getElementById("divb");
 var divc = document.getElementById("divc");
 var divd = document.getElementById("divd");
 /*姓名字符长度验证*/
 function checkNameLength(){
    var username = document.getElementById("username").value.length;
    if(username == 0){
      a = 0;
      diva.className = "";
      diva.innerHTML = "请输入姓名";
    }else{
      a = 1;
    }
 }
 document.getElementById("username").addEventListener("blur",checkNameLength,false);

 /*密码字符长度验证*/
 function checkPasswordLength(){
    var password = document.getElementById("password").value.length;
    if(password == 0){
      b = 0;
      divc.className = "";
      divc.innerHTML = "请输入密码";
    }else{
      b = 1;
    }
 }
 document.getElementById("password").addEventListener("blur",checkPasswordLength,false);

/*确认密码*/
function passwordSure(){
  var passwordagain = document.getElementById("passwordagain").value;
  if(passwordagain == document.getElementById("password").value){
    c = 1;
  }else{
    c = 0;
    divd.className = "";
    divd.innerHTML = "请输入正确";
  }
}

/*手机号验证*/
 function checkPhone(){
    var phone = document.getElementById("phone").value;
    var phoneRegExp = /^1[3|5|7|8]\d{9}$/;
    if( phoneRegExp.test(phone)){
      c = 1;
    }else{
      c = 0;
      divb.className = "";
      divb.innerHTML = "请输入正确的手机号";
    }
 }
 document.getElementById("phone").addEventListener("blur",checkPhone,false);

/*提交*/
 function submitFun(){
  if(a != 1){
    alert("请检查姓名是否正确");
    return false;
  }else if(b != 1){
    alert("请检查密码是否正确");
    return false;
  }else if(c != 1){
    alert("请再次确认密码是否正确");
    return false;
  }else if(d != 1){
    alert("请检查手机号是否正确");
    return false;
  }else if(a == 1 && b == 1 && c ==1 && d ==1){
    alert("注册成功");
    return true;
  }
 }
document.getElementById("button1").addEventListener("click",submitFun,false);

 } 