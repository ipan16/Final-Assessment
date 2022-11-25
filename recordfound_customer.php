<html>
<body>

<?php include("header.php");?>

<h2>Search result</h2>

<?php

$id = $_POST['ID'];
$id = mysqli_real_escape_string($connect, $id);

$q = "SELECT ID, UserName, Email, PhoneNumber, Date, Time, Barbers, Services FROM booking WHERE 
ID = '$id' ORDER BY ID";

$result = @mysqli_query ($connect, $q);

if($result)
{
	echo '<table border="2">
	<td><b>ID</b></td>
		    <td><b>UserName</b></td>
			<td><b>Email</b></td>
			<td><b>Phone Number</b></td>
			<td><b>Date</b></td>
			<td><b>Time</b></td>
			<td><b>Barbers</b></td>
			<td><b>Services</b></td>
	</tr>';
	
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		echo '<tr>
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
	echo '</table>';
	mysqli_free_result($result);
}
	
else 
{
	echo '<p class ="error"> If no record is shown, this is because you had an incorrect 
			missing entry in search form.<br>Click the back button on the browser and try again.</p>';
	
	echo '<p>' .mysqli_error($connect). '<br><br/>/>Query:'. $q. '</p>';
}
mysqli_close($connect);
?>
</body>

</html>