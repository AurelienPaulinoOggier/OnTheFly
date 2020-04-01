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
		
		$pid = $_GET['pid'];
		
		if(isset($_POST{'btnTerug'})){
			Header("location: OnTheFlyVligtuigen.php");
		}	
		
		if(isset($_POST['btnWijzigen']))
		{
			$vlnummer = $_POST['vlnummer'];
			$vertrek = $_POST['vertrek'];
			$aankomst = $_POST['aankomst'];
			$datum = $_POST["datum"];
			$bestemming = $_POST['bestemming'];
			$pstatus = $_POST['pstatus'];
			$vnummer = $_POST['vnummer'];
			
			$query = "UPDATE planning,vliegtuigen SET vlnummer = '$vlnummer', vertrek = '$vertrek', aankomst = '$aankomst', datum = '$datum', bestemming = '$bestemming', pstatus = '$pstatus', vnummer = '$vnummer'
						WHERE pid = '$pid' AND vliegtuigen.vid = planning.vid";
			$stm = $con->prepare($query);
			if($stm->execute())
			{
				Header("location: OnTheFlyVligtuigen.php");
			}
			
		}
		
		$query = "SELECT * FROM planning,vliegtuigen WHERE vliegtuigen.vid = planning.vid AND pid = '$pid'";
		$stm = $con->prepare($query);
		if($stm->execute())
		{
			$res = $stm->fetch(PDO::FETCH_OBJ);
			?>
			<form method="POST">
			<div class = 'ToBx' style='margin-top:10%;'>
				<h1> Vliegtuig </h1><br/>
				<input type="text" style='margin-left:10%;' name="vlnummer" value="<?php echo $res->vlnummer; ?>" /><br/>
				<input type="text" style='margin-left:10%;' name="vertrek" value="<?php echo $res->vertrek; ?>" /><br/>
				<input type="text" style='margin-left:10%;' name="aankomst" value="<?php echo $res->aankomst; ?>" /><br/>
				<input type="date" style='margin-left:10%;' name="datum" value="<?php echo $res->datum; ?>" /><br/>
				<input type="text" style='margin-left:10%;' name="bestemming" value="<?php echo $res->bestemming; ?>" /><br/>
				<select name="pstatus" style='margin-left:10%;'>
							<option value="<?php echo $res->pstatus; ?>"><?php echo $res->pstatus; ?></option>
							<option value="normaal">normaal</option>
							<option value="geannuleerd">geannuleert</option>
							<option value="vertraagt">vertraagt</option>
						</select><br/>
				<input type="text" style='margin-left:10%;' name="vnummer" value="<?php echo $res->vnummer; ?>" /><br/>
				<input type="submit" name="btnWijzigen" value="Wijzigen" style='margin-top:7%; margin-left:15%; width:200px;'/>
				<input type = "submit" name="btnTerug" value="terug" style='margin-top:3%; margin-left:15%; width:200px;'/>
			<div/>
			</form>
			<?php
			
		}else "werkt niet?!?"
		
		?>
	</body>
</html>