<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="styleOnTheFly.css">
		<title> Delete van Vliegtuig </title>
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
			
		$vid = $_GET['vid'];
			
		if(isset($_POST["btnJa"])) {

			$query = "DELETE FROM vliegtuigen WHERE vid = '$vid'";
			$stm = $con->prepare($query);
			if ($stm->execute()) {
			
				$query = "DELETE FROM planning WHERE vid = '$vid'";
				$stm = $con->prepare($query);
				if ($stm->execute()) {
					header("Location: OnTheFlyVligtuigen.php");
				}
				
			}		
		}elseif(isset($_POST['btnNee'])){
			header("Location: OnTheFlyVligtuigen.php");
			}
			
		?>
	</body>
</html>