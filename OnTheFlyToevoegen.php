<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="StyleOnTheFly.css">
		<title> Toevoegen </title>
	</head>
	<body>
        <form method="POST">
		<nav>
            <ul>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyHome.php" style="color: #d65a12; text-decoration: none;" > HOME <a/></li>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyPlaning.php" style="color: #d65a12; text-decoration: none;"> Planing <a/></li>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyVligtuigen.php" style="color: #d65a12; text-decoration: none;"> Vlietuigen <a/></li>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyToevoegen.php" style="color: #d65a12; text-decoration: none;"> Toevoegen <a/></li>
            </ul>
		</nav>
		<br/>
		<div class = 'ToBx'>
			<h1> Vliegtuig toevoegen</h1>
			<h3><input name="nummer" type="name" value="Vliegtuig nummer"><br/>	
				<input name="vtype" type="text" value="Type"/><br/>
				<input name="vmaatschappij" type="text" value="Vliegtuig maatschappij"/><br/>		
				<select name="vstatus">
							<option value=" ">Vliegtuig status</option>
							<option value="normaal">normaal</option>
							<option value="grounded">grounded</option>
							<option value="in reparatie">in reparatie</option>
							<option value="verloren">verloren</option>
						</select><br/>
			
			<h3><input type = "submit" name = "btnVliegtuig" value = "Vliegtuig Toevoegen" class='submitBx' /></h3>
			<br/>
			<h1> Vlucht toevoegen</h1>
			<h3><input name="vlnummer" type="name" value="Vlucht nummer"/><br/>	
				<input name="vertrek" type="text" value="Vertrek"/><br/>
				<input name="aankomst" type="text" value="Aankomst"/><br/>
				<input name="datum" type="date" value=" "/><br/>					
				<input name="bestemming" type="text" value="Bestemming"/><br/>
				<select name="pstatus">
							<option value=" ">Vlucht status</option>
							<option value="normaal">normaal</option>
							<option value="geannuleerd">geannuleert</option>
							<option value="vertraagt">vertraagt</option>
						</select><br/>
				<input name="vnummer" type="name" value="Vliegtuig nummer"><br/>
			<h3><input type = "submit" name = "btnVlucht" value = "Vlucht Toevoegen" class='submitBx' /></h3>
		
		<?php
		$host = "localhost";
        $dbname = "onthefly";
        $username = "root";
        $password = "";

        $con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
			,$username, $password);
			
		
		if (isset($_POST["btnVliegtuig"])){
		
			$nummer = $_POST["nummer"];
			$vtype  = $_POST["vtype"];
			$vmaatschappij = $_POST["vmaatschappij"];
			$vstatus = $_POST["vstatus"];
				
			$query = "INSERT INTO vliegtuigen(vnummer, vtype,  vmaatschappij, vstatus) VALUES".
						"('$nummer', '$vtype', '$vmaatschappij', '$vstatus')";
			$stm = $con->prepare($query);
			if($stm->execute()){
				echo "Vliegtuig is Toevoegd";
				
			}else echo "!ERROR!";
		}
		
		if (isset($_POST["btnVlucht"])){
			
			$vlnummer = $_POST["vlnummer"];
			$vertrek  = $_POST["vertrek"];
			$aankomst = $_POST["aankomst"];
			$datum = $_POST["datum"];
			$bestemming = $_POST["bestemming"];
			$pstatus = $_POST["pstatus"];
			$vnummer = $_POST["vnummer"];
			$pid = 0;
			
			$query = "SELECT max(pid) as maxid FROM planning";
			$stm = $con->prepare($query);
			if ($stm->execute()) {
				$planning = $stm->fetch(PDO::FETCH_OBJ);
				$pid = $planning->maxid + 1;
			}
			
			$query = "SELECT * FROM vliegtuigen WHERE vnummer = '$vnummer'";
			$stm = $con->prepare($query);
			if ($stm->execute()) {
				$vnummer = $stm->fetch(PDO::FETCH_OBJ);
				$query = "INSERT INTO planning(pid, vid, vlnummer, vertrek,  aankomst, datum, bestemming, pstatus) VALUES" .
					"($pid, $vnummer->vid, '$vlnummer', '$vertrek', '$aankomst', '$datum', '$bestemming', '$pstatus')";
				$stm = $con->prepare($query);
				if($stm->execute()){
					echo "Vlucht is toegevoegd";
					
				}else echo "Query mislukt!";
			}else echo "verkeerde Vliegtuig nummer!";
		}
		
		?>
		</div>
		<div class = 'VBx' >
		<?php
		echo "<h3><table style='border: solid 3px purple; background-color: skyblue;'>";
		echo "<tr><th>Vliegtuig nummer</th></tr></h3>";
		
		class TableRows extends RecursiveIteratorIterator {
			
			function __construct($it) {
				parent::__construct($it, self::LEAVES_ONLY);
			}

			function current() {
				return "<td style='width: 175px; border: solid 2px purple; background-color:lightskyblue ;'>" . parent::current(). "</td>";
			}

			function beginChildren() {
				echo "<tr>";
			}

			function endChildren() {
				echo "</tr>" . "\n";
			}
		}
					
		$query = "SELECT vliegtuigen.vnummer FROM vliegtuigen ";
		$stm = $con->prepare($query);
					
		if ($stm->execute()){
			$result = $stm->setFetchMode(PDO::FETCH_ASSOC);
			foreach(new TableRows(new RecursiveArrayIterator($stm->fetchAll())) as $k=>$v) {
				echo $v;
			}
		}
		?>
		</div>
		</form>
	</body>
</html>