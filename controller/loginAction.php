<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Action</title>
</head>
<body>
<?php
var_dump(realpath($_SERVER["DOCUMENT_ROOT"] . '\final-project\model\LoginModel.php'));

var_dump(realpath(dirname(__FILE__)) . '../model/LoginModel.php' );
$path = realpath($_SERVER["DOCUMENT_ROOT"] . '\final-project\model\LoginModel.php');
require_once $path;


	$flag = true;


	if ($_SERVER['REQUEST_METHOD'] === "POST") 
	{
		function test($data)
		{
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		foreach ($_POST as $key => $value) 
		{
			echo "<tr>";
			echo "<td>";
			echo $key;
			echo "</td>";
			echo "<td>";
			echo $value;
			echo "</td>";
			echo "</tr>";
		}
		$userName = test($_POST['username']);
		$pass = test($_POST['pass']);

		if(!empty($_POST["rememberMe"])) 
		{
			setcookie ("username",$userName,time()+ (60 * 10), "/"); //10mins
			setcookie ("pass",$pass,time()+ (60 * 10), "/");
		} else
		 {
			setcookie("username","");
			setcookie("pass","");
		}

		if (empty($userName) or empty($pass)) 
		{
			$flag = false;
			echo "<h2>Please fill up the form properly</h2>";
			echo '<a href = "../view/login.php">Go Back</a>';
		}
		else
		{
			$userObj3 =new LoginModel;
			$validateLogin = $userObj3-> validateLogin($userName,$pass);
			echo $validateLogin;
			
			if($validateLogin == 1)
			{
				echo "Validation done";
				$_SESSION['username'] = $userName;
				$_SESSION['password'] = $password;
				header('Location: ../view/WelcomePage.php');
				// header('Location: ../view/WelcomePage.php');

				// $fr = fread($handle, $size);
				
				

				// for ($i=0; $i <count($arr1) ; $i++)
				//  { 
				// 	if($userName === $arr1[$i]->username and $pass === $arr1[$i]->password)
				// 	{
				// 		$flag = true;
				// 		// $_SESSION['id'] = $arr1[$i]->id;
				// 		// $_SESSION['firstname'] = $arr1[$i]->firstname;
				// 		// $_SESSION['lastname'] = $arr1[$i]->lastname;
				// 		// $_SESSION['gender'] = $arr1[$i]->gender;
				// 		// $_SESSION['dob'] = $arr1[$i]->dob;
				// 		// $_SESSION['phone'] = $arr1[$i]->phone;
				// 		// $_SESSION['email'] = $arr1[$i]->email;
				// 		$_SESSION['username'] = $arr1[$i]->userName;
				// 		$_SESSION['password'] = $arr1[$i]->password;
				// 		// $_SESSION['confirmPassword'] = $arr1[$i]->confirmPass;
						
				// 		header('Location: ../view/WelcomePage.php');
				// 	}
				// }
				// if ($flag === false)
				//     {
				// 		echo "<h3>invalid user name or password</h3>";;
				// 		echo '<a href="../view/login.php">Go Back</a>';
					
			    //     }
			}
			else
			{
				echo "<h3>Please create an account first</h3>";
				echo "To create an account " . '<a href="../view/registresion.php">Click here</a>';
			}
			
		}
		
		
	}



?>


</body>
</html> 