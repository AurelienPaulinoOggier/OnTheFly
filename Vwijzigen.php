<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="styleOnTheFly.css">
		<title> Wijzigen van Vliegtuig </title>
	</head>
	<body>
	
	<?php
		$host = "localhost";
        $dbname = "onthefly";
        $username = "root";
        $password = "";

        $con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
			,$username, $password);
		
		$vid = $_GET['vid'];
		
		if(isset($_POST{'btnTerug'})){
			Header("location: OnTheFlyVligtuigen.php");
		}	
		
		if(isset($_POST['btnWijzigen']))
		{
			$vnummer = $_POST['vnummer'];
			$vtype = $_POST['vtype'];
			$vmaatschappij = $_POST['vmaatschappij'];
			$vstatus = $_POST['vstatus'];
			
			$query = "UPDATE vliegtuigen SET vnummer = '$vnummer', vtype = '$vtype', vmaatschappij = '$vmaatschappij', vstatus = '$vstatus'
						WHERE vid = '$vid'";
			$stm = $con->prepare($query);
			if($stm->execute())
			{
				Header("location: OnTheFlyVligtuigen.php");
			}
			
		}
		
		$query = "SELECT * FROM vliegtuigen WHERE vid = $vid";
		$stm = $con->prepare($query);
		if($stm->execute())
		{
			$res = $stm->fetch(PDO::FETCH_OBJ);
			?>
			<form method="POST">
			<div class = 'ToBx' style='margin-top:10%;'>
				<h1> Vliegtuig </h1><br/>
				<input type="text" style='margin-left:10%;' name="vnummer" value="<?php echo $res->vnummer; ?>" /><br/>
				<input type="text" style='margin-left:10%;' name="vtype" value="<?php echo $res->vtype; ?>" /><br/>
				<input type="text" style='margin-left:10%;' name="vmaatschappij" value="<?php echo $res->vmaatschappij; ?>" /><br/>
				<select name="vstatus" style='margin-left:10%;'>
							<option value="<?php echo $res->vstatus; ?>"><?php echo $res->vstatus; ?></option>
							<option value="normaal">normaal</option>
							<option value="grounded">grounded</option>
							<option value="in reparatie">in reparatie</option>
							<option value="verloren">verloren</option>
						</select><br/>
				<input type="submit" name="btnWijzigen" value="Wijzigen" style='margin-top:7%; margin-left:15%; width:200px;'/>
				<input type = "submit" name="btnTerug" value="terug" style='margin-top:3%; margin-left:15%; width:200px;'/>
			<div/>
			</form>
			<?php
			
		}else "werkt niet?!?"
		
		?>
	</body>
</html>