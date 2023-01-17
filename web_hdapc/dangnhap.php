<?php
  include 'include/header.php';
  ?>
<link rel="stylesheet" type="text/css" href="css/dangnhap.css">
    <div class="nd-container">
<?php
    if( isset($_POST['submit'])){
        $dn= $user->login_user($_POST);
    }
?>
    	<div id="formdn">
    		<div id="tt-dn"> Đăng nhập </div>
        <?php 
            if(isset($dn))
              echo $dn;
        ?>
        <form action="" method="post">
          		<div id="dn-input">
          			<i id="lg1" class="fas fa-user"></i>   
          			<div class="textbox1">		
          			<input id="txt-dn" type="text" placeholder="Username" name="user" value="">
          			</div>
      					
      				<i id="lg2" class="fas fa-lock"></i>  
          			<div class="textbox2">
          			<input id="pass" class="passUser" type="password" placeholder="Password" name="password" value="">
                <span id="showpw" onclick="showPassword()" style="cursor: pointer;margin-left: -30px;font-size: 15px;">
      <i class="fas fa-eye"></i></span>
          			</div>
          		</div>
              <input id='bt-dn' type="submit" name="submit" value="Login">
        </form>
        <a class="quenmk" href="getPass.php" style="position: relative;top:85px;font-weight: 600px;color: #1B388C;font-size: 17px;"><i class="fas fa-question-circle" style="color:blue !important;"></i>&#160 Quên mật khẩu ?</a>

      <div class="dktk" style="margin-bottom: 20px;">Bạn chưa có tài khoản ? <a href="dangky.php">Đăng ký ngay</a></div>      
    	</div>

    </div>
<script type="text/javascript">
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
</script>
<style type="text/css">
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
    left: 230px;
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