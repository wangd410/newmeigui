 window.onload = function() {
     document.getElementById("usernameq").value = "";
     document.getElementById("passwoqrd").value = "";
     document.getElementById("phonqe").value = "";
     document.getElementById("passwordaqgain").value = "";

     var diva = document.getElementById("diva");
     var divb = document.getElementById("divb");
     var divc = document.getElementById("divc");
     var divd = document.getElementById("divd");
     /*姓名字符长度验证*/
     function checkNameLength() {
         var username = document.getElementById("usernameq").value.length;
         if (username == 0) {
             diva.className = "";
             diva.innerHTML = "请输入姓名";
         } else {
             diva.innerHTML = "";
         }
     }

     document.getElementById("usernameq").addEventListener("blur", checkNameLength, false);

     /*密码字符长度验证*/
     function checkPasswordLength() {
         var password = document.getElementById("passwoqrd").value.length;
         if (password == 0) {
             divc.innerHTML = "请输入密码";
         } else {
             divc.innerHTML = "";
         }
     }

     document.getElementById("passwoqrd").addEventListener("blur", checkPasswordLength, false);


     /*手机号验证*/
     function checkPhone() {
         var phone = document.getElementById("phonqe").value;
         var phoneRegExp = /^1[3|5|7|8]\d{9}$/;
         if (phoneRegExp.test(phone)) {
             divb.innerHTML = "";
         } else {
             divb.innerHTML = "请输入正确的手机号";
         }
     }

     document.getElementById("phonqe").addEventListener("blur", checkPhone, false);

 }
