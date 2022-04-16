<?php
$isChecked = true;
	

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
