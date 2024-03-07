<!DOCTYPE HTML>
<html>
<head>
	<title>Registrace</title>
</head>
<body>
	<?php echo file_get_contents("zahlavi.html"); ?>
	<u><h1>Registrace</h1></u>
	<form method="post">
		<table>
		<tr><td><b>Jméno: </b></td><td> <input type="text" name="jmeno" /></td></tr>
		<tr><td><b>Heslo: </b></td><td> <input type="password" name="heslo" /></td></tr>
		<tr><td><b>Heslo znova: </b></td><td><input type="password" name="pheslo" /></td></tr>
		</table>
		<input type="submit" value="Registrovat" name="s" />
	</form>
<?php
include 'udb.php';
if(isset($_POST["s"])){
	if(!isset($_POST["jmeno"]) || $_POST["jmeno"]=="" ||
	   !isset($_POST["heslo"]) || $_POST["heslo"]=="" ||
	   !isset($_POST["pheslo"]) || $_POST["pheslo"]=="" ) {
	   	echo "<b>Zadejte jméno a heslo</b>";
		die();
	}
	if(!preg_match("/^([a-zA-ZÁČĎÉĚÍŇÓŘŠŤÚŮÝŽáčďéěíňóřšťúůýž])+$/",$_POST["jmeno"])){
		echo "<b>Jméno může obsahovat jen písmena!</b>";
		die();
	}
	if(!preg_match("/^([a-zA-ZÁČĎÉĚÍŇÓŘŠŤÚŮÝŽáčďéěíňóřšťúůýž0-9])+$/",$_POST["heslo"]) && mb_strlen($_POST["heslo"])>=5){
		echo "<b>Heslo musí být delší než 5 znaků a jen malá a velká písmena a číslice jsou povolena!</b>";
		die();
	}
	if($_POST["heslo"]!==$_POST["pheslo"]){
		echo "<b>Hesla se neshodují</b>";
		die();
	}
	if(!kontrolujUnikatnost(ctiDb("ucty.txt"),$_POST["jmeno"])){
		echo "<b>Uživatelský účet s tímto jménem již existuje</b>";
		unset($_POST);
		die();
	}
	$jm=$_POST["jmeno"];
	$he=$_POST["heslo"];
	file_put_contents("ucty.txt","$jm|$he\n",FILE_APPEND);
	header("location: .");
}

?>
</body>
</head>
