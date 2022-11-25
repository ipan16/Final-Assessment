<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Booking Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/booking.css">
    </head>
    <body>
        
<?php 
    // call file to connect to server 
  include ("header.php"); ?>       
 <?php


//This query inserts a record in the booking  
//has form been submitted? 
if ($_SERVER ['REQUEST_METHOD'] == 'POST') {
$error = array (); //initialize an error array

// check for a UserName 
if (empty($_POST['UserName'])) {
    $error [] = 'You forgot to enter your UserName.';
}
else {
    $un = mysqli_real_escape_string ($connect, trim ($_POST ['UserName']));
}

// check for a Email 
if (empty($_POST['Email'])) {
    $error [] = 'You forgot to enter your Email.';
}
else {
    $e = mysqli_real_escape_string ($connect, trim ($_POST ['Email']));
}

// check for a PhoneNumber 
if (empty($_POST['PhoneNumber'])) {
    $error [] = 'You forgot to enter PhoneNumber.';
}
else {
    $pn = mysqli_real_escape_string ($connect, trim ($_POST ['PhoneNumber']));
}



// check for a Date 
if (empty($_POST['Date'])) {
    $error [] = 'You forgot to enter your Date.';
}
else {
    $d = mysqli_real_escape_string ($connect, trim ($_POST ['Date']));
}


// check for a Time 
if (empty($_POST['Time'])) {
    $error [] = 'You forgot to enter your Time.';
}
else {
    $t = mysqli_real_escape_string ($connect, trim ($_POST ['Time']));
}


// check for a Barbers 
if (empty($_POST['Barbers'])) {
    $error [] = 'You forgot to enter your Barbers.';
}
else {
    $b = mysqli_real_escape_string ($connect, trim ($_POST ['Barbers']));
}


// check for a Services 
if (empty($_POST['Services'])) {
    $error [] = 'You forgot to enter your Services.';
}
else {
    $s = mysqli_real_escape_string ($connect, trim ($_POST ['Services']));
}
 
 
    //make the query: 
    $q = "Insert INTO booking ( UserName, Email, PhoneNumber,  Date, Time, Barbers, Services) VALUES ( '$un', '$e', '$pn', '$d', '$t', '$b', '$s')"; 
    $result = @mysqli_query($connect, $q); // run the query 
    if ($result){ 
 
     //if it runs 

header('Location: http://localhost/BarberColoni/');
    exit(); 
    } else { //if it did not run 
    //message 
        echo '<h1>System error</h1>';
//debugging message 
echo '<p>' .mysqli_error($connect).'<br><br>Query: '.$q. '</p>'; 
}//end of it (result) 
mysqli_close($connect); //close the database connecttion. 
exit();

}
?>
 <section class = "banner">
            <h2>BOOK YOUR HAIRCUT NOW</h2>
            <form action="booking.php" method="post">
            <div class = "card-container">
                <div class = "about-img">
                    <!-- image here -->
                </div>

                <div class = "card-content">
                    <h3>Booking Form</h3>
                    <form>
                        <div class = "form-row">
 	<input class="w3-input w3-padding-16" type="Date" placeholder="Date" required name="Date" value="2020-11-16T20:00"
	"<?php if (isset($_POST['Date'])) echo $_POST ['Date']; ?>" required>
	<input type = "text" placeholder="Full Name" name="UserName" 
                            value="<?php if (isset($_POST['UserName'])) echo $_POST ['UserName']; ?>">
                        </div>

                        <div class = "form-row">
                            <input type = "text" placeholder="Email" name="Email" 
                            value="<?php if (isset($_POST['Email'])) echo $_POST ['Email']; ?>">
                            <input type = "text" placeholder="Phone Number" name="PhoneNumber"
                            value="<?php if (isset($_POST['PhoneNumber'])) echo $_POST ['PhoneNumber']; ?>">
                        </div>
						
						<div class = "form-row">
						<select name = "Time" name="Time"
						value="<?php if (isset($_POST['Time'])) echo $_POST ['Time']; ?>">
                                <option value = "Time-select">Select Time</option>
                                <option value = "12: 00 PM">12: 00 PM</option>
                                <option value = "01: 00 PM">01: 00 PM</option>
								<option value = "02: 00 PM">02: 00 PM</option>
                                <option value = "03: 00 PM">03: 00 PM</option>
                                <option value = "04: 00 PM">04: 00 PM</option>
                                <option value = "05: 00 PM">05: 00 PM</option>
                                <option value = "06: 00 PM">06: 00 PM</option>
                                <option value = "07: 00 PM">07: 00 PM</option>
								<option value = "08: 00 PM">08: 00 PM</option>
								<option value = "09: 00 PM">09: 00 PM</option>
								<option value = "10: 00 PM">10: 00 PM</option>
                            </select>
							</div>
							
							<div class = "form-row">
						<select type = "text" placeholder="Barbers" name="Barbers"
						value="<?php if (isset($_POST['Barbers'])) echo $_POST ['Barbers']; ?>">
                                <option value = "Barbers-select">Barbers</option>
                                <option value = "Hatta">Hatta</option>
                                <option value = "Aiman">Aiman</option>
								<option value = "Firdaus">Firdaus</option>
                            </select>
							</div>

                        <div class = "form-row">
						<select type = "text" placeholder="Services" name="Services"
						value="<?php if (isset($_POST['Services'])) echo $_POST ['Services']; ?>">
                                <option value = "Services-select">Services</option>
                                <option value = "Adult Haircuts">Adult Haircuts</option>
                                <option value = "Senior Cetizen(60 Years Old And Above)">Senior Cetizen(60 Years Old And Above)</option>
								<option value = "Kid Haircut(Below 12 Years Old)">Kid Haircut(Below 12 Years Old)</option>
								</select>
							</div>
                            <input type = "submit" value = "BOOK NOW">
							<a href="homecustomer.html" class="btn-action">Back To Home</a>
                    </form>
                </div>
            </div>
        </section>
        
    </body>
</html>