<!DOCTYPE HTML>
<html>
<head>
	<title>Registrace</title>
</head>
<body>
	<u><h1>Registrace</h1></u>
	<form method="post">
		<b>Jméno: </b> <input type="text" name="jmeno" /><br>
		<b>Heslo: </b> <input type="password" name="heslo" /><br>
		<b>Heslo znova: </b> <input type="password" name="pheslo" /><br>
		<input type="submit" value="Registrovat" name="s" />
	</form>
<?php
if(isset($_POST["s"])){
	if(!isset($_POST["jmeno"]) || $_POST["jmeno"]=="" ||
	   !isset($_POST["heslo"]) || $_POST["heslo"]=="" ||
	   !isset($_POST["pheslo"]) || $_POST["pheslo"]=="" ) {
	   	echo "<b>Zadejte jméno a heslo</b>";
		die();
	}
	if(!preg_match("/^[a-žA-Ž]+$/",$_POST["jmeno"])){
		echo "<b>Jméno může obsahovat jen písmena!</b>";
		die();
	}
	if(!preg_match("/^[a-žA-Ž0-9]+$/",$_POST["heslo"]) && strlen($_POST["heslo"])>=5){
		echo "<b>Heslo musí být delší než 5 znaků a jen malá a velká písmena a číslice jsou povolena!</b>";
		die();
	}
	if($_POST["heslo"]!==$_POST["pheslo"]){
		echo "<b>Hesla se neshodují</b>";
		die();
	}
	echo "<h2>Funguje ty hade!</h2>";
	
}

?>
</body>
</head>
