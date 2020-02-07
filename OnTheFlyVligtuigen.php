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
		</form>
		
		<?php
		$host = "localhost";
        $dbname = "workshop";
        $username = "root";
        $password = "";

        $con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
			,$username, $password);
		
		
		
		?>
	</body>
</html>