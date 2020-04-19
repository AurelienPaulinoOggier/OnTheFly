<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="StyleOnTheFly.css">
		<title> Wijzigen </title>
	</head>
	<body>
        <form method="POST">
		<nav>
            <ul>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyHome.php" style="color: #d65a12; text-decoration: none;" > HOME <a/></li>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyPlaning.php" style="color: #d65a12; text-decoration: none;"> Planning <a/></li>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyVligtuigen.php" style="color: #d65a12; text-decoration: none;"> Vlietuigen <a/></li>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyToevoegen.php" style="color: #d65a12; text-decoration: none;"> Toevoegen <a/></li>
            </ul>
		</nav>
		
	</body>
	<?php
#database connectie
	$host = "localhost";
    $dbname = "onthefly";
    $username = "root";
    $password = "";

    $con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
		,$username, $password);

//vliegtuigen
#tabel van vliegtuigen
	echo "<h3><table style='border: solid 3px purple; background-color: skyblue; margin-left:25%;'>";
    echo "<tr><th>Vliegtuig nummer</th><th>Type</th><th>Vliegtuig maatschappij</th><th>Status</th></tr></h3>";
		
	try {		
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
				
		$query = "SELECT * FROM vliegtuigen";
		$stm = $con->prepare($query);
		$stm->execute();

		$res = $stm->fetchAll(PDO::FETCH_OBJ);
		foreach($res as $rij)
		{

			echo "<tr><td>$rij->vnummer</td>
					<td>$rij->vtype</td>
					<td>$rij->vmaatschappij</td>
					<td>$rij->vstatus</td>
					<td><a style='text-decoration: underline;' href='Vwijzigen.php?vid=".$rij->vid."'>Wijzigen</a></td>
					<td><a style='text-decoration: underline;' href='Vdelete.php?vid=".$rij->vid."'>Delete</a></td></tr>";
		}
	}
		
	catch(PDOException $e) {
		echo "Foutmelding: " . $e->getMessage();
	}
	
//planning
#tabel van planning
	echo "<h3><table style='border: solid 3px purple; background-color: skyblue; margin-left:16%;'>";
    echo "<tr><th>Vlucht nummer</th><th>Vertrek</th><th>Aankomst</th><th>Datum</th><th>Bestemming</th><th>Status</th><th>Vliegtuig nummer</th></tr></h3>";
		
	try {		
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
				
		$query = "SELECT * FROM vliegtuigen,planning WHERE vliegtuigen.vid = planning.vid ORDER BY datum DESC";
		$stm = $con->prepare($query);
		$stm->execute();

		$res = $stm->fetchAll(PDO::FETCH_OBJ);
		foreach($res as $rij)
		{

			echo "<tr><td>$rij->vlnummer</td>
					<td>$rij->vertrek</td>
					<td>$rij->aankomst</td>
					<td>$rij->datum</td>
					<td>$rij->bestemming</td>
					<td>$rij->pstatus</td>
					<td>$rij->vnummer</td>
					<td><a style='text-decoration: underline;' href='Vlwijzigen.php?pid=".$rij->pid."'>Wijzigen</a></td>
					<td><a style='text-decoration: underline;' href='Vldelete.php?pid=".$rij->pid."'>Delete</a></td></tr>";
		}
	}
		
	catch(PDOException $e) {
		echo "Foutmelding: " . $e->getMessage();
	}
	?>
</html>