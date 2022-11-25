<html>
<head>
<style>
	body {
		font-family: Verdana, sans-serif;
	}
</style>
</head>
<body>
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "barbercoloni";
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error)
	{
		die("Connection failed: " . $conn->connect_error);
	}

	$insert = "INSERT INTO register(UserName, Email, Password, UserType, UserStatus)
			VALUES('".$UserName."', '".$Email."' , '".$Password."', 'Guest', 'Active')";
	
	if ($conn->query($insert) === TRUE)
	{
		echo "You have successfully registered!";
	}
	else
	{
		echo "Error: " . $insert . "<br>" . $conn->error;
	}

	$conn->close();	
?>
<br>
<a href="login.html"><u>Go to Login Page</u><a>
<br><br>
<a href="Home.html"><u>Back to Home Page</u><a>
</body>
</html>
