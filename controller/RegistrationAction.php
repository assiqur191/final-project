<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>

</head>

<body>
<?php
// var_dump(realpath($_SERVER["DOCUMENT_ROOT"] . '\final-project\model\UserModel.php'));

// var_dump(realpath(dirname(__FILE__)) . '../model/UserModel' );
$path = realpath($_SERVER["DOCUMENT_ROOT"] . '\final-project\model\UserModel.php');
require_once $path;



 
$firstnameErr = $lastnameErr = $genderErr = $dobErr = $religionErr = $presentAddressErr = $emailErr = $personalWebsiteLinkErr = $userNameErr = $passErr = $confirmPassErr = $matchErr = "";


$firfstname = $lastname = $gender = $dob = $religion = $presentAddress = $permanentAddress = $phone = $email = $personalWebsiteLink = $userName = $pass = $confirmPass = $id = "";

$isChecked = false;
$isValid = true;
$flag = false;

if ($_SERVER['REQUEST_METHOD'] === "POST")
 {
	//  $errorEmtpy = false;
	//  $errorfirstname = false;
	//  $errorlastname = false;
	//  $errorgender = false;
	//  $errordob = false;
	//  $errorphone = false;
	//  $erroremail = false;
	//  $errorusername = false;
	//  $errorpass = false; 
	//  $errorconfirmpass = true;

	// CHECK THE FORM VALUES
	// foreach ($_POST as $key => $value) {
    //     echo "<tr>";
    //     echo "<td>";
    //     echo $key;
    //     echo "</td>";
    //     echo "<td>";
    //     echo $value;
    //     echo "</td>";
    //     echo "</tr>";
    // }
	function test($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);

		return $data;
	}
	
	var_dump("I AM IN HERE");	
	$firstname = test($_POST['firstname']);
	$lastname = test($_POST['lastname']);

	if (isset($_POST['gender'])) {
		$gender = test($_POST['gender']);
	}
	else {
		$gender = NULL;
	}

	$dob = test($_POST['dob']);
	
	$phone = test($_POST['phone']);
	$email = test($_POST['email']);
	$userName = test($_POST['username']);
	$pass = test($_POST['pass']);
	$confirmPass = test($_POST['confirmPass']);

	$today = date("Y-m-d");
	$diff = date_diff(date_create($dob), date_create($today));
	$diff = (int)$diff->format('%y');

	$isChecked = true;
	if (empty($firstname) || empty($lastname) || empty($dob) || empty($phone) || empty($userName) || empty($pass) ){
		echo "<span class = 'form-error'> fill all the field ! </span>";
		$errorEmtpy= true;
	}

	if (empty($firstname)) {
		$isValid = false;
		echo "<b>Error: Please enter your first name</b>";
		echo "<br><br>";
		$errorfirstname = true;
	}
	if (empty($lastname)) {
		$isValid = false;
		echo "<b>Error: Please enter your last name</b>";
		echo "<br><br>";
		$errorlastname = true;
	}
	if (empty($gender)) {
		$isValid = false;
		echo "<b>Error: Please select a gender</b>";
		echo "<br><br>";
		$errorgender = true;
	}
	if (empty($dob)) {
		$isValid = false;
		echo "<b>Error: Please insert your birth date</b>";
		echo "<br><br>";
		$errordob = true;
	}
	else if ($diff < 18) {
		$isValid = false;
		echo "<b>Error: You are not old enough</b>";
		echo "<br><br>";
	}
	if (!empty($phone) and !preg_match('/^[0][1][0-9]{3}[0-9]{6}/i', $phone)) {
		$isValid = false;
		echo "<b>Error: Invalid phone number</b>";
		;
		echo "<br><br>";
	}
	if (empty($email)) {
		$isValid = false;
		echo "<b>Error: Please enter your email address</b>";
		echo "<br><br>";
		
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$isValid = false;
		echo "<b>Error: Please check your email again</b>";
		echo "<br><br>";
		$erroremail = true;
	}
	if (empty($userName)) {
		$isValid = false;
		echo "<b>Error: Please enter your user name</b>";
		echo "<br><br>";
		$errorusername = true;
	}
	if (empty($pass)) {
		$isValid = false;
		echo "<b>Error: Please enter your password</b>";
		echo "<br><br>";
		$errorpass = true;
	}
	if (empty($confirmPass)) {
		$isValid = false;
		echo "<b>Error: Please enter your password for confirmation</b>";
		echo "<br><br>";
		$errorconfirmpass = true;
	}
	else if ($pass !== $confirmPass) {
		$isValid = false;
		echo "<b>Error: Password didn't match</b>";
		echo "<br><br>";
	}
	if($isValid)
	{
		$userObj = new UserModel;

		$insertUser = $userObj->insertUser($firstname, $lastname,$gender,$dob, $phone,$email,$userName,$pass);
		echo "WE are here ". $insertUser;
		if ($insertUser == 1)
		{
			// $path2 = realpath($_SERVER["DOCUMENT_ROOT"] . '\final-project\view\login.php');
			// header('Location:'.$path2);
			header('Location: ../view/login.php');
		}
		else{
			header('Location: ../view/error.php');
		}
	}
	else
	{
		header('Location: ../view/error.php');
	}

	 
	
	

 }

    




?>
<!-- <script>
	$("#firstname, #lastname, gender, #dob, #phone, #email, #username, #pass, #confirmpass  ").removeClass("input-error");
    var errorEmtpy = "<?php echo $errorEmtpy ?>";
	var errorfirstname = "<?php echo $errorfirstname ?>";
	var errorlastname = "<?php echo $errorlastname ?>";
	var errorgender = "<?php echo $errorgender ?>";
	var errordob = "<?php echo $errordob ?>";
	var erroremail = "<?php echo $erroremail ?>";
    var errorusername = "<?php echo $errorusername ?>";
	var errorpass = "<?php echo $errorpass ?>";
	var errorconfirmpass = "<?php echo $errorconfirmpass ?>";

	if (errorEmtpy ==true ){
		$("#firstname, #lastname, gender, #dob, #phone, #email, #username, #pass, #confirmpass  ").addClass("form-inputerror");

	}
	if (errorfirstname ==true ){
		$("#firstname").addClass("form-inputerror");

	}
	// if (errorlastname ==true ){
	// 	$("#lastname").addClass("form-inputerror");

	// }
	// if (errorfirstname ==true ){
	// 	$("#firstname").addClass("form-inputerror");

	// }
	if (errorEmtpy == false && errorusername == false ){
		$("#firstname, #lastname, gender, #dob, #phone, #email, #username, #pass, #confirmpass  ").val("");

	}

</script> -->





	<a href="../view/registration.php" >Go back </a>
	
</body>
</html>