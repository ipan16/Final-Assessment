<?php

	// create connection 
	$connect = mysqli_connect("localhost","root","","BarberColoni");
	
	//check connecttion
	if (!$connect)
		
		{
			die('Error:'. mysql_connect_error());
		}

	//echo "connected successfully";
?>