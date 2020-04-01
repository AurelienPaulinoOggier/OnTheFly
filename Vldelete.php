<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="styleOnTheFly.css">
		<title> Delete van Vlucht </title>
    </head>   
	<body>
		<form method="POST">
		
			<div class = 'ToBx' style='margin-top:10%;'>
				<h1> Weet u zeker  </h1><br/> 
				<h3><input type = "submit" name = "btnJa" value = "Ja" class='btnDelete' />
				<input type = "submit" name = "btnNee" value = "Nee" class='btnDelete' /></h3>
			<div/>
		</form>
		
		<?php
		$host = "localhost";
		$dbname = "onthefly";
		$username = "root";
		$password = "";

		$con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
					,$username, $password);
			
		$pid = $_GET['pid'];
			
		if(isset($_POST["btnJa"])) {

			$query = "DELETE FROM planning WHERE pid = '$pid'";
			$stm = $con->prepare($query);
			if ($stm->execute()) {
				header("Location: OnTheFlyVligtuigen.php");	
			}		
		}elseif(isset($_POST['btnNee'])){
			header("Location: OnTheFlyVligtuigen.php");
			}
			
		?>
	</body>
</html>