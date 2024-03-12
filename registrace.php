<!DOCTYPE HTML>
<html>
<head>
	<title>Registrace</title>
</head>
<body>
	<?php echo file_get_contents("zahlavi.html"); ?>
	<u><h1>Registrace</h1></u>
	<p>Jméno může obsahovat jen velká a malá písmena?
		Heslo může bosahovat velká i malá písmena, číslice a musí být alespoň 5 znaků dlouhlé
		</p>
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
	$jm=trim(htmlspecialchars($_POST["jmeno"]));
	$he=trim(htmlspecialchars($_POST["heslo"]));
	$phe=trim(htmlspecialchars($_POST["pheslo"]));

	if($jm=="" || $he=="" || $phe=="" ) {
	   	echo "<b>Zadejte jméno a heslo</b>";
		die();
	}
	if(!preg_match("/^([a-zA-ZÁČĎÉĚÍŇÓŘŠŤÚŮÝŽáčďéěíňóřšťúůýž])+$/",$jm)){
		echo "<b>Jméno může obsahovat jen písmena!</b>";
		die();
	}
	if(!preg_match("/^([a-zA-ZÁČĎÉĚÍŇÓŘŠŤÚŮÝŽáčďéěíňóřšťúůýž0-9])+$/",$he) || mb_strlen($he)<5){
		echo "<b>Heslo musí být delší než 5 znaků a jen malá a velká písmena a číslice jsou povolena!</b>";
		die();
	}
	if($he!==$phe){
		echo "<b>Hesla se neshodují</b>";
		die();
	}
	if(!kontrolujUnikatnost(ctiDb("ucty.txt"),$jm)){
		echo "<b>Uživatelský účet s tímto jménem již existuje</b>";
		die();
	}

	file_put_contents("ucty.txt","$jm|$he\n",FILE_APPEND);
	header("location: .");
}

?>
</body>
</head>
