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

		<label>Don't have an account?</label> <a href="../view/registresion.php">Sign-up</a>
	</fieldset>

</form>
</body>
</html>