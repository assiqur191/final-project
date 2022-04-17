<?php
	session_start();

	if(isset($_SESSION['id'])){
		header("LOCATION: ../view/WelcomePage.php");
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>
    <link rel="stylesheet" href="../view/css/login.css" type="text/css">
    <script defer src="../controller/javascript/LoginScript .js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>
<body>
<form name="form2" id="form2" action="../controller/loginAction.php" method="post" novalidate>
	<fieldset>
		<legend><h2>Login Form</h2></legend>

		<table>

			<tr height="40px">

                    <td width="100px">
                        <label for="username">User Name*:</label>
                    </td>
                    <td>
                        <input type="text" name="username" id="username" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>">
                    </td>
            </tr>

            <tr height="40px">

                    <td width="100px">
                        <label for="pass">Password*:</label>
                    </td>
                    <td>
                        <input type="text" name="pass" id="pass" value="<?php if(isset($_COOKIE["pass"])) { echo $_COOKIE["pass"]; } ?>">
                    </td>
            </tr>
        </table>

        <input type="checkbox" name="rememberMe" id="rememberMe"><label>Remember me</label>

        <br><br>

		<!-- <a href="../view/ForgottenPassword.php">Forgotten Password?</a> -->

		<br><br>

		<input type="submit" name="login">

		<br><br>
        <span id="error_message" class="text-danger"></span>  
                     <span id="success_message" class="text-success"></span>

		<label>Don't have an account?</label> <a href="../view/registresion.php">Sign-up</a>
	</fieldset>

</form>
</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#submit').click(function(){  
           var username = $('#username').val();  
           var pass = $('#pass').val();  
           if(username == '' || pass == '')  
           {  
                $('#error_message').html("All Fields are required");  
           }  
           else  
           {  
                $('#error_message').html('');  
                $.ajax({  
                     url:"login.php",  
                     method:"POST",  
                     data:{username:username,pass:pass},  
                     success:function(data){  
                          $("form2").trigger("reset");  
                          $('#success_message').fadeIn().html(data);  
                          setTimeout(function(){  
                               $('#success_message').fadeOut("Slow");  
                          }, 2000);  
                     }  
                });  
           }  
      });  
 });  
 </script>