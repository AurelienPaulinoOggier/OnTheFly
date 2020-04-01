<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="StyleOnTheFly.css">
		<title> Planing </title>
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
		<div class = 'ToBx'>
			<input name="datum" type="date" value=" "/><br/>
			<input type = "submit" name = "btnDatum" value = "Vluchten zoeken" class='submitBx' />
		</div>
		</form>
		<?php
		$host = "localhost";
        $dbname = "onthefly";
        $username = "root";
        $password = "";

        $con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
			,$username, $password);
		
		if(isset($_POST['btnDatum']))
		{	
			$datum = $_POST["datum"];
			
			echo "<h3><table style='border: solid 3px purple; background-color: skyblue;'>";
			echo "<tr><th>Vlucht</th><th>Type</th><th>Vertrek</th><th>Retour</th><th>datum</th><th>Bestemming</th><th>Status</th><th>Vliegtuig maatschappij</th><th>Vliegtuig nummer</th></tr></h3>";
			
			class TableRow extends RecursiveIteratorIterator {
				
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
						
			$query = "SELECT planning.vlnummer, vliegtuigen.vtype, planning.vertrek, planning.aankomst, planning.datum, planning.bestemming, planning.pstatus, vliegtuigen.vmaatschappij, vliegtuigen.vnummer
							FROM planning, vliegtuigen WHERE vliegtuigen.vid = planning.vid AND datum = '$datum'";
			$stm = $con->prepare($query);
						
			if ($stm->execute()){
				$result = $stm->setFetchMode(PDO::FETCH_ASSOC);
				foreach(new TableRow(new RecursiveArrayIterator($stm->fetchAll())) as $k=>$v) {
					echo $v;
				}
			}else echo "Er is geen vlucht met deze datum";
		}
		
		echo "<h3><table style='border: solid 3px purple; background-color: skyblue;'>";
		echo "<tr><th>Vlucht</th><th>Type</th><th>Vertrek</th><th>Retour</th><th>datum</th><th>Bestemming</th><th>Status</th><th>Vliegtuig maatschappij</th><th>Vliegtuig nummer</th></tr></h3>";
		
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
					
		$query = "SELECT planning.vlnummer, vliegtuigen.vtype, planning.vertrek, planning.aankomst, planning.datum, planning.bestemming, planning.pstatus, vliegtuigen.vmaatschappij, vliegtuigen.vnummer
							FROM planning, vliegtuigen WHERE vliegtuigen.vid = planning.vid ORDER BY datum DESC";
		$stm = $con->prepare($query);
					
		if ($stm->execute()){
			$result = $stm->setFetchMode(PDO::FETCH_ASSOC);
			foreach(new TableRows(new RecursiveArrayIterator($stm->fetchAll())) as $k=>$v) {
				echo $v;
			}
		}
		
		?>
	</body>
</html>