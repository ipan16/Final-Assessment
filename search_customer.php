<html>
<body>

<?php include ("header.php");?>

<form action= "recordfound_customer.php" method="post">

<h1>Search record customer</h1>
<p><label class="label"</ for = "ID">NO ID:</label>
<input id= "ID" type="text" name="ID" size="30" maxleght="30"
value= "<?php if (isset($_POST['ID'])) echo $_POST ['ID'];?>"/>
</p>

<p><input id="submit" type="submit" name="submit" value="search"/></p>
</form>

</body>
</html>