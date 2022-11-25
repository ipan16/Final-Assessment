<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barber Coloni</title>


</head>

<?php include ("header.php");?>

<h2>Delete a booking record</h2>

<?php
 
if((isset($_GET['id'])) && (is_numeric($_GET['id'])))
{
	$id = $_GET['id'];
}
elseif ((isset($_POST['id'])) && (is_numeric($_POST['id'])))
{
	$id = $_POST['id'];
}
else
{
	echo '<p class = "error">This page has been accessed in error.</p>';
	exit();
}

	if ($_SERVER['REQUEST_METHOD'] =='POST')
	{
		if($_POST['sure'] == 'Yes')
		{
			$q = "DELETE FROM booking WHERE ID = $id LIMIT 1";
			$result = @mysqli_query($connect,$q);
			
			if(mysqli_affected_rows($connect) == 1)
			{
				echo '<h3>The record has been deleted.</h3>';
				header ('Location:booking-view.php');		
			}
			else 
			{
				echo '<p class = "error"> The record could not be deleted.
				<br>Probaly because it deos not exist or due to system error';
				
				echo '<p>' .mysqli_error($connect). '<br/>Query:'.$q.'</p>';
				
			}
		}
		else
		{
			echo '<h3>The user has NOT been deleted.</h3>';
			header('Location:booking-view.php');
		}
	}
		else
		{
			$q = "SELECT UserName FROM booking WHERE ID = $id";
			$result = @mysqli_query($connect, $q);
			
			if (mysqli_num_rows($result) == 1)
			{
				$row = mysqli_fetch_array($result, MYSQLI_NUM);
				echo "<h3>Are you sure want to permanetly delete $row[0]?</h3>";
				echo '<form action= "delete_booking.php" method="post">
				<input id="submit-no" type="submit" name="sure" value="Yes" class="btn btn-primary">
				<input id="submit-no" type="submit" name="sure" value="No" class="btn btn-primary">
				<input type="hidden" name="id" value="'.$id.'">
				</form>';
			}
			else
			{
				echo '<p class="error"> This page has been accessed in error.</p>';
				echo '<p>&nbsp;</p>';
			}
		}
		mysqli_close($connect);
	
?>