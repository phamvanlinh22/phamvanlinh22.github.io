

<?php
  include 'include/header.php';
  ?>
<link rel="stylesheet" type="text/css" href="admin2/CodeSeven-toastr-50092cc/build/toastr.min.css">
<link rel="stylesheet" type="text/css" href="css/dangnhap.css">
    <div class="nd-container">
<?php

?>
    	<div id="formdn">
    		<div id="tt-dn"> Lấy lại mật khẩu </div>
        <!-- <form action="" method="post"> -->
          		<div id="dn-input">
          			<i id="lg1" class="fas fa-user"></i>   
          			<div class="textbox1">		
          			<input id="txt-dn" type="text" placeholder="Tên tài khoản của bạn" name="user" value="">
          			</div>
      					
      				<i id="lg2" class="fas fa-lock"></i>  
          			<div class="textbox2">
          			<input id="pass" class="passUser" type="password" placeholder="Mật khẩu mới" name="password" value="">
                <span id="showpw" onmousedown="showPassword()" style="cursor: pointer;margin-left: -30px;font-size: 15px;">
      <i class="fas fa-eye"></i></span>

              

          			</div>
          		</div>
             
              <input id='bt-dn' style="margin-top: 50px;" onclick="doiMK()" type="submit" name="submit" value="Xác nhận">
        <!-- </form> -->
        <div class="getCode" onclick="getCode()">Lấy mã</div>


         <div class="code">
           <input id="pass" class="maxn" style="padding-left: 6px;"  type="text" placeholder="Mã xác nhận.." name="password" value="">
         </div>
      <i class="fas fa-key" style="position: relative; top: -34px;width: 50px;height: 32px; background-color: #ccc; text-align: center; line-height: 32px; border-top-left-radius: 5px; border-bottom-left-radius: 5px;border:1px solid gray;"></i>
    	</div>


    </div>
<script src="admin2/CodeSeven-toastr-50092cc/build/toastr.min.js"></script>
<script type="text/javascript">
      toastr.options = {
      "closeButton": false,
      "debug": false,
      "newestOnTop": false,
      "progressBar": false,
      "positionClass": "toast-top-right",
      "preventDuplicates": false,
      "onclick": null,
      "showDuration": "300",
      "hideDuration": "1000",
      "timeOut": "5000",
      "extendedTimeOut": "1000",
      "showEasing": "swing",
      "hideEasing": "linear",
      "showMethod": "fadeIn",
      "hideMethod": "fadeOut"
    }

      function doiMK(){
        user=$('#txt-dn').val();
        new_pass=$('.passUser').val();
        code2=$('.maxn').val();
        format = /[ !@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/;
        // alert(user+"-"+new_pass+"-"+code2);
        if(user==""){
            toastr["error"]("Chưa nhập tên tài khoản","Error !",);
        }
        else if(new_pass==""){
            toastr["error"]("Chưa nhập mật khẩu mới","Error !",);
        }
        else if(new_pass.length<6 ||new_pass.length>30){
            toastr["error"]("Mật khẩu phải từ 6 đến 30 kí tự","Error !",);
        }
        else if(format.test(new_pass)==1){
            toastr["error"]("Mật khẩu không có chứa kí tự đặc biệt","Error !",);
        }
        else if(code2==""){
            toastr["error"]("Chưa nhập mã xác nhận","Error !",);
        }
        else if(code2!=otp){
            toastr["error"]("Mã xác nhận không đúng","Error !",);
        }
        if(code2==otp){
          $.ajax({
              url:"forgotPass.php",
              method:'post',
              data:{ user :user,new_pass:new_pass},
              dataType:"JSON",
              success: function(data){
                   if(data.dmk==1)
                      toastr["success"]("Đổi mật khẩu thành công, hãy thử đăng nhập lại","Success !",); 
                   else
                      toastr["error"]("Không thành công","Error !",); 
                  }
             })
        }
      }

      function showPassword() {
        // var x = document.getElementsByClassName("passUser");
        var x = document.getElementById("pass");
        var y = document.getElementById("showpw");
        if (x.type === "password") {
          x.type = "text";
          y.innerHTML='<i class="fas fa-eye-slash"></i>';
        } else {
          x.type = "password";
          y.innerHTML='<i class="fas fa-eye"></i>';
        }
      }

      var kt=0;
      var user="";
      var otp="*&*&*#@";
      function getCode(){
        user=$('#txt-dn').val();
        if(user==""){
            toastr["error"]("Chưa nhập tên tài khoản","Error !",);
        }
        else{
        $.ajax({
              url:"forgotPass.php",
              method:'post',
              data:{ getcode :user },
              dataType:"JSON",
              success: function(data){
                  if(data.gmail==""){
                      toastr["error"]("Tên đăng nhập không tồn tại","error !",); 
                   
                      $kt=0;
                   }
                   // if(data.gmail!=""){
                   //    toastr["success"]("Mã xác nhận đã được gửi qua mail :"+data.gmail,"Success !",); 
                   //    otp=data.code;
                   //    $kt=0;
                   // }
                   // else if(data.rs==0){
                   //    toastr["error"]("Gmail ("+data.gmail+") không tồn tại","Error !",); 
                   //    $kt=1;
                   // }
                   else {
                      toastr["success"]("Mã xác nhận đã được gửi qua mail của bạn ("+data.gmail+")","Success !",); 
                      otp=data.code;
                      $kt=0;
                   }
                }
             })
        }
      }

</script>
<style type="text/css">
  .code{
    width: 285px;
    height: 32px;
    margin-left: 45px;
    margin-top: -11px;
    border:1px solid gray;
    border-radius: 5px;
  }
  .toast{
    font-family: "Segoe UI", Helvetica, Arial, sans-serif ;
  }
  .getCode{
    padding: 5px;
    /*border:1px solid black !important;*/
    font-weight: 500;
    position: relative;
    color: white;
    cursor: pointer;
    left: 350px;
    top:-79px;
    border-radius: 5px;
    background-color: #383737;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
    text-align: center;
    width: 60px;
  }
  .tc{
    color: green;
    margin-top: 5px;
    margin-left: 85px;
    margin-bottom: -10px;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
  }
  .quenmk:hover{
    color: #15EA10 !important;
  }
  .nd-container{
    height: 500px !important;
  }
  .tc>a{
    font-style: italic;
    color: #02B0DB;
  }
  #pass{
    margin-left: 10px;
  width: 260px;
  line-height: 30px;
  font-size: 17px;
  border:none;
  outline: none;
  background: none;
  }
  .tb{
    color:red;
     margin-top: 5px;
     font-weight: bold;
     font-size: 13px;
     margin-left: 85px;
    margin-bottom: -10px;
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
  }
  a{
    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
  }
  .empty1{
    margin-left: 103px;
  }
  .empty2{
    margin-left: 105px;
  }
  .dnnd{
    margin-left: 40px;
  }
  #lg1{
    top:91px;
  }
  .textbox1{
    top:91px;
  }
  #lg2{
    top:140px;
  }
  .textbox2{
    top:140px;
  }
  #bt-dn{
    position: relative;
    top: 110px;
    left: 130px;
    padding-right: 5px;
    font-weight: normal;
    height: 35px;
    border: 1px solid;
    background-color: #ccc;
    cursor: pointer;
    border-radius: 5px;
    font-size: 18px;
  }
  .dktk{
    margin-top: 120px;
    font-size: 17px;
    font-weight: normal;

    font-family: "Segoe UI", Helvetica, Arial, sans-serif;
  }
  .dktk>a{
    color: #04C9E6;
    font-style: italic;
    /*text-decoration: underline;*/
  }
</style>
<?php
  include 'include/footer.php';
  ?>