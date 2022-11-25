<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="include.css" />
</head>

<body>

<?php include ("header.php");?>

<?php
//make the query
$q = "SELECT ID,UserName,Email,PhoneNumber, Date, Time, Barbers, Services FROM booking ORDER BY UserName";

//run the query
$result = @mysqli_query($connect,$q);

//if it run without a problem, display the records
if($result)
{
	//table heading
	echo '<table border = "2">
		<tr><td><b>Edit</b></td>
		    <td><b>Delete</b></td>
			<td><b>ID</b></td>
		    <td><b>UserName</b></td>
			<td><b>Email</b></td>
			<td><b>Phone Number</b></td>
			<td><b>Date</b></td>
			<td><b>Time</b></td>
			<td><b>Barbers</b></td>
			<td><b>Services</b></td></tr>';

			//fetch and print all the records
			while($row =mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				echo '<tr>
				<td><a href  ="edit_booking.php?id='.$row['ID'].'">Edit</a></td>
				<td><a href  ="delete_booking.php?id='.$row['ID'].'">Delete</a></td>
				<td>'.$row['ID']. '</td>
				<td>'.$row['UserName']. '</td>
				<td>'.$row['Email']. '</td>
				<td>'.$row['PhoneNumber']. '</td>
				<td>'.$row['Date']. '</td>
				<td>'.$row['Time']. '</td>
				<td>'.$row['Barbers']. '</td>
				<td>'.$row['Services']. '</td>
				</tr>';
			}
			
			echo'</table>';
			
			mysqli_free_result ($result);
			
			
}
else
	{
		//error message
		echo'<p class = "error" > The current user could not be retrieved.We apologize for any inconvinience </p>';

		//debugging message
		echo'<p>'.mysqli_error($connect).'<br><br/>Query: '.$q.'</p>';
	}//end of it(result)
		
//close database connection
mysqli_close($connect);
?>
<a href="homeAdmin.html" class="btn-action">Back To Home</a>
</div>
</div>
</body>
</html>