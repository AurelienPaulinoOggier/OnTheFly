<!DOCTYPE html>
<html>
	<head>
        <link rel="stylesheet" href="StyleOnTheFly.css">
		<title> HOME </title>
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
		</form>
		
		<?php
		$host = "localhost";
        $dbname = "workshop";
        $username = "root";
        $password = "";

        $con = new PDO ("mysql:host=".$host.";dbname=".$dbname.";"
			,$username, $password);

//extra en lesstof
		#if(stm->execute() -- true) {
			#$res = stm->fetshAll(PDO::FETCH_OBJ);
			#foreach($res as $vliegtuig)
			#echo 'localhost/Vliegtuig/OnTheFlyLogin.php?vid=". $vid->vid."'src=.jng
		#}
		#echo $_GET['vid'];
		#$query = "SELECT * FROM vliegtuigen WHERE vid = $airplane";
		#$stm - $con-> prepare($query);
		#if(stm->execute()){
			#$vliegtuig = $stm->fetch(PDO::FETCH_OBJ);
		#}
		#<form method="POST">
		#Naam:<input name="vnummer" type="name" value="<?php echo $vliegtuig->vliegtuig; " ><br/>
		#</form>
		#$vid = $_GET['vid']
		#$query = "UPDATE vliegtuig SET vliegtuig = $vliegtuig WHERE vid = $vid"
		#$stm -> prepare($query);
		#if(stm->execute()){
			#echo "update gelukt";
		#}
        #if(isset($_POST['btnJA'])){
        #if (isset($_POST[]))
			
        #$airplane = $_GET['vid'];
        #$query = "DELETE FROM vliegtuigen WHERE vid = $airplane";
        #$stm - $con-> prepare($query);
        #if(stm->execute()){
            #echo "Record verwijderd"
            #heder(location: locatie.php)
        #}
		#ID: <?= $airplane->vid ? >
		#<input type="text" name="vnummer" value= <?= $airplane->vnummer ? >
        #}elseif(isset($_POST['btnNEE'])){
            #header(location: locatie.php)
        #}

		?>
	</body>
</html>