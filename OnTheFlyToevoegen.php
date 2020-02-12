<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="StyleOnTheFly.css">
		<title> Vliegtuigen </title>
	</head>
	<body>
        <form method="POST">
		<nav>
            <ul>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyHome.php" style="color: #d65a12; text-decoration: none;" > HOME <a/></li>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyPlaning.php" style="color: #d65a12; text-decoration: none;"> Planing <a/></li>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyVligtuigen.php" style="color: #d65a12; text-decoration: none;"> Vlietuigen <a/></li>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyToegoegen.php" style="color: #d65a12; text-decoration: none;"> Toevoegen <a/></li>
                <li><a href="http://localhost/Vliegtuig/OnTheFlyLogin.php" style="color: #d65a12; text-decoration: none;"> Login <a/></li>
            </ul>
		</nav>
		
		<h1> toevoegen</h1><br/>
		<h3>Naam:<input name="vnummer" type="name"><br/>	
			Soort:<input name="type" type="text" /><br/>
			status van vliegtuig:<select name="vstatus">
						<option value=" "> </option>
						<option value=" "> </option>
						<option value=" "> </option>
						<option value=" "> </option>
						<option value=" "> </option>
					</select><br/>
			Gedrag:<input name=" " type=" "/><br/>
		
		<h3><input type = "submit" name = "btnOpslaan" value = "Toevoegen" /></h3>
		</form>
		
		<?php
		$host = "localhost";
        $dbname = "onthefly";
        $username = "root";
        $password = "";

        $con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
			,$username, $password);
		
		#$vnummer = $_POST["vnummer"];
		#$vstatus = $_POST["vstatus"];
		#$  = $_POST[" "];
		#$  = $_POST[" "];
		#$  = $_POST[" "];
		#$vid = 0;
		
		#if (isset($_POST["btnOpslaan"])){
			#$query = "SELECT max(vid) as maxid FROM vliegtuigen";
			#$stm = $con->prepare($query);
			#if ($stm->execute()) {
				#$vliegtuigen = $stm->fetch(PDO::FETCH_OBJ);
				#$vid = $vliegtuigen->maxid + 1;
			#}
					
			#$query = "INSERT INTO vliegtuigen(vnummer, vstatus,  ,  ,  ) VALUES".
						#"('$vnummer', '$vstatus', '$ ', '$ ', '$ ')";
			#$stm = $con->prepare($query);
			#if($stm->execute()){
				#echo "Statment correct uitvoerd";
				
			#}else echo "Query mislukt!";
				
			#$query = "SELECT * FROM planing WHERE  = '$ '";
			#$stm = $con->prepare($query);
			#if ($stm->execute()) {
				#$  = $stm->fetch(PDO::FETCH_OBJ);
				#$query = "INSERT INTO   ( ,  ,  ) VALUES" . "($ , $ -> , '$ ')";
				#$stm = $con->prepare($query);
				#if ($stm->execute()) {
					#echo "Statment verblijf correct uitvoerd";
				#}else echo "Query mislukt!";
			#}
		#}
		
		?>
	</body>
</html>