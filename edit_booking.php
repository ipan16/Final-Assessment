<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarBer Coloni</title>

</head>

<?php include ("header.php");?>

<h2 class="text-center">Edit a booking record</h2>

<?php

if ((isset ($_GET['id'])) && (is_numeric($_GET['id'])))
{
	$id = $_GET['id'];
}
elseif ((isset ($_POST['id'])) && (is_numeric($_POST['id'])))
{
	$id = $_POST['id'];
}
else 
{
	echo '<p class = "error">This page has been accessed in error. </p>';
	exit();
}
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$error = array();
    //look for UserName
	    if (empty ($_POST['UserName']))
	    {
		$error[] = 'You forgot to enter your UserName.';
	    }
		else
		{
			$un = mysqli_real_escape_string ($connect, trim($_POST['UserName']));
		}
		
		//check for a Email	
		if (empty($_POST['Email']))
		{
			$error[] = 'You forgot to enter your Email.';	
		}
		else 
		{
			$e= mysqli_real_escape_string($connect, trim ($_POST['Email']));
		}
	
		//check for a PhoneNumber
		if (empty($_POST['PhoneNumber']))
		{	
			$error = 'You forgot to enter your PhoneNumber.';
		}
		else 
		{
			$pn = mysqli_real_escape_string ($connect, trim ($_POST['PhoneNumber']));
		}
		
		//check for a Date	
		if (empty($_POST['Date']))
		{
			$error = 'You forgot to enter your Date.';
		}
		else
		{
			$d = mysqli_real_escape_string ($connect, trim ($_POST['Date']));
		}
		
		//check for a Time	
		if (empty($_POST['Time']))
		{
			$error = 'You forgot to enter your Time.';
		}
		else
		{
			$t = mysqli_real_escape_string ($connect, trim ($_POST['Time']));
		}
		
		//check for a Barbers	
		if (empty($_POST['Barbers']))
		{
			$error = 'You forgot to enter your Barbers.';
		}
		else
		{
			$b = mysqli_real_escape_string ($connect, trim ($_POST['Barbers']));
		}
		
		//check for a Services	
		if (empty($_POST['Services']))
		{
			$error = 'You forgot to enter your Services.';
		}
		else
		{
			$m = mysqli_real_escape_string ($connect, trim ($_POST['Services']));
		}

	if(empty($error))
	{
		$q = "SELECT ID FROM booking WHERE PhoneNumber='$pn' AND ID != $id";
		$result =@mysqli_query($connect,$q);

		if(mysqli_num_rows($result) == 0)
		{
			$q = "UPDATE booking SET UserName='$un' , Email='$e' , PhoneNumber='$pn', Date='$d' , Time='$t' , Barbers='$b' , Services='$s'
			WHERE ID='$id' LIMIT 10";

        $result =@mysqli_query($connect,$q);
		
		if(mysqli_affected_rows($connect)== 1)
			{
              echo '<h3>The user has been edited</h3>'; 
              header('Location:booking-view.php');
			}
		else
		{
			echo '<p class="error">The user has not be edited due to the system error.We apologize for
			any convinience</p>';
			echo'<p>' .mysqli_error($connect). '<br/> query: '.$q.'</p>';
		}
	}
	else
	{
		echo'<p class="error">The no ic has already been registered</p>';
	}
}
	else
	{
		echo '<p class="error"> The following error (s) occurred: </br>';
		foreach ($error as $msg)
		{
			echo " -msg<br/> /n";
		}
		echo'</p><p>Please try again.</p>';
	}
}
$q= "SELECT UserName,Email,PhoneNumber,Date, Time, Barbers, Services FROM booking WHERE ID=$id";
$result = @mysqli_query($connect,$q);

if(mysqli_num_rows($result) == 1)
{
	$row = mysqli_fetch_array ($result,MYSQLI_NUM);

	echo'<form action ="edit_booking.php" method="post">

	<fieldset>
	<p><br><label class = "order-label" for="UserName"> Name: </label>
	<input id="UserName" type="text" name= "UserName" size="30" maxlength="30" class="input-responsive" value="'.$row[0].'"></p>

	<p><br><label class = "order-label" for="Email"> Username: </label>
	<input id="Email" type="text" name= "Email" size="30" maxlength="30" class="input-responsive" value="'.$row[1].'"></p>

	<p><br><label class = "order-label" for="PhoneNumber"> Phone Number: </label>
	<input id="PhoneNumber" type="text" name= "PhoneNumber" size="30" maxlength="30" class="input-responsive" value="'.$row[2].'"></p>

	<p><br><label class = "order-label" for="Date"> Date: </label>
	<input id="Date" type="text" name= "Date" size="30" maxlength="30" class="input-responsive" value="'.$row[3].'"></p>
	
	<p><br><label class = "order-label" for="Time"> Time: </label>
	<input id="Time" type="text" name= "Time" size="30" maxlength="30" class="input-responsive" value="'.$row[4].'"></p>
	
	<p><br><label class = "order-label" for="Barbers"> Barbers: </label>
	<input id="Barbers" type="text" name= "Barbers" size="30" maxlength="30" class="input-responsive" value="'.$row[5].'"></p>
	
	<p><br><label class = "order-label" for="Services"> Services: </label>
	<input id="Services" type="text" name= "Services" size="30" maxlength="30" class="input-responsive" value="'.$row[6].'"></p>

	<br><p><input id = "submit" type = "submit" name="submit" value="Edit" class="btn btn-primary"></p>
	<br><input type="hidden" name="id" value="'.$id.'"/>
    
    </fieldset>
	</form>';
}
else
{
	echo '<p class="error">This page has been acessed in error.</p>';
}

mysqli_close($connect);
?>