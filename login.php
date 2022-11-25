<head>
<title>Barber Coloni</title>
</head>

<body>
<?php
include ("header.php");
?>
<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
	if(!empty($_POST['Email']))
	{
		$e = mysqli_real_escape_string($connect,$_POST['Email']);
	}
	else 
	{
		$e = FALSE;
		echo'<p class = "error"> You forget to enter your Email.</p>';
	}
		if (!empty($_POST['Password']))
		{
			$p = mysqli_real_escape_string($connect,$_POST['Password']);
		} 
		else 
		{
			$p = FALSE;
			echo '<p class = "error"> You forgot to enter your Password.</p';
		}

	if ($e && $p) 
	{
		$q= "SELECT ID,UserName,Email,Password FROM register WHERE (Email= '$e' AND
			Password = '$p')";

		$result= mysqli_query($connect,$q);

		if(@mysqli_num_rows($result)==1)
		{
				session_start();
				$_SESSION = mysqli_fetch_array($result,MYSQLI_ASSOC);
				header ('Location: homeCustomer.html');

				exit();

				mysqli_free_result ($result);
				mysqli_close ($connect);
		}
		else 
		{
			echo '<p class ="error"> The Email and password entered do not match 
				<br> Perhaps you need to register, just click the Register button</p>';
		}
	}
	else
	{
		echo'<p class = "error">Please try again.</p>';
	}
	mysqli_close($connect);
}//end of submit conditional

?>

</form>
<p align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dont have an account?
<a href="register.html">Sign up</a>
<p align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Go to
<a href="login.html">LogIn</a>

</p>
</div>
</div>
</body>
</html>