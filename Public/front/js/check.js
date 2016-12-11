 window.onload = function() {
     document.getElementById("usernameq").value = "";
     document.getElementById("usernameq_a").value = "";
     document.getElementById("passwoqrd").value = "";
     document.getElementById("phonqe").value = "";
     document.getElementById("passwordaqgain").value = "";

     var diva = document.getElementById("diva");
     var divb = document.getElementById("divb");
     var divc = document.getElementById("divc");
     var divd = document.getElementById("divd");
     var dive = document.getElementById("dive");
     /*姓名字符长度验证*/
     function checkNameLength() {
         var username = document.getElementById("usernameq").value.length;
         if (username == 0) {
             diva.className = "";
             diva.innerHTML = "请输入昵称";
         } else {
             diva.innerHTML = "";
         }
     }

     document.getElementById("usernameq").addEventListener("blur", checkNameLength, false);

     /*用户名字符长度验证*/
     function checkNameLength_a() {
         var username = document.getElementById("usernameq_a").value.length;
         if (username == 0) {
             dive.className = "";
             dive.innerHTML = "请输入用户名";
         } else {
             dive.innerHTML = "";
         }
     }

     document.getElementById("usernameq_a").addEventListener("blur", checkNameLength_a, false);

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
         var phoneRegExp = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
         if (phoneRegExp.test(phone)) {
             divb.innerHTML = "";
         } else {
             divb.innerHTML = "请输入正确的邮箱地址";
         }
     }

     document.getElementById("phonqe").addEventListener("blur", checkPhone, false);

 }
