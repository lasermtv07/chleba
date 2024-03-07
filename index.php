<!DOCTYPE HTML>
<html>
<head>
	<title>Přihlášení</title>
</head>
<body>
	<?php echo file_get_contents("zahlavi.html"); ?>
	<u><h1>Přihlášení</h1></u>
	<form method="post">
	<table>
		<tr><td>Jméno: </td><td><input type="text" name="jmeno" /></td></tr>
		<tr><td>Heslo: </td><td><input type="password" name="heslo" /></td></tr>
	</table>
	<input type="submit" name="s" value="Přihlásit" />
	</form>
<?php
include "udb.php";
if(isset($_POST["s"])){
	$d=ctiDb("ucty.txt");
	if(kontrolujUnikatnost($d,$_POST["jmeno"])){
		echo "<b>Účet s takovým jménem neexistuje";
		die();
	}
	if(ctiDb("ucty.txt")[$_POST["jmeno"]]===$_POST["heslo"]){
		header("location: https://http.cat/");
	}
	else{
		echo "<b>Špatně zadané heslo</b>";
	}
}

?>

