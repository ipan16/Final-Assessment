<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="include.css" />
</head>

<body>

<?php include ("header.php");?>

<?php
//make the query
$q = "SELECT ID,CustName,Email,PhoneNumber,Password FROM customers ORDER BY ID";

//run the query
$result = @mysqli_query($connect,$q);

//if it run without a problem, display the records
if($result)
{
	//table heading
	echo '<table border = "2">
		<tr><td><b>Edit</b></td>
		    <td><b>Delete</b></td>
		    <td><b>ID Customers</b></td>
			<td><b>Customers Names</b></td>
			<td><b>Email</b></td>
			<td><b>Phone Number</b></td>
			<td><b>Password</b></td></tr>';

			//fetch and print all the records
			while($row =mysqli_fetch_array($result,MYSQLI_ASSOC))
			{
				echo '<tr>
				<td><a href  ="edit_customers.php?id='.$row['ID'].'">Edit</a></td>
				<td><a href  ="delete_customers.php?id='.$row['ID'].'">Delete</a></td>
				<td>'.$row['ID']. '</td>
				<td>'.$row['CustName']. '</td>
				<td>'.$row['Email']. '</td>
				<td>'.$row['PhoneNumber']. '</td>
				<td>'.$row['Password']. '</td>
				</tr>';
			}
			
			echo'</table>';
			
			mysqli_free_result ($result);
}
else
	{
		//error message
		echo'<p class = "error" > The current student could not be retrieved.We apologize for any inconvinience </p>';

		//debugging message
		echo'<p>'.mysqli_error($connect).'<br><br/>Query: '.$q.'</p>';
	}//end of it(result)
		
//close database connection
mysqli_close($connect);
?>
</div>
</div>
</body>
</html>