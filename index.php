<!DOCTYPE HTML>
<html>
<head>
        <title>Registrace</title>
</head>
<body>
        <u><h1>Registrace</h1></u>
        <form method="post">
                <b>JmĂ©no: </b> <input type="text" name="jmeno" /><br>
                <b>Heslo: </b> <input type="password" name="heslo" /><br>
                <b>Heslo znova: </b> <input type="password" name="pheslo" /><br>
                <input type="submit" value="Registrovat" name="s" />
        </form>
<?php
if(isset($_POST["s"])){
        if(!isset($_POST["jmeno"]) || $_POST["jmeno"]=="" ||
           !isset($_POST["heslo"]) || $_POST["heslo"]=="" ||
           !isset($_POST["pheslo"]) || $_POST["pheslo"]=="" ) {
                echo "<b>Zadejte jmĂ©no a heslo</b>";
                die();
        }
        if(!preg_match("/^[a-ĹľA-Ĺ˝]+$/",$_POST["jmeno"])){
                echo "<b>JmĂ©no mĹŻĹľe obsahovat jen pĂ­smena!</b>";
                die();
        }
        if(!preg_match("/^[a-ĹľA-Ĺ˝0-9]+$/",$_POST["heslo"]) && strlen($_POST["heslo"])>=5){
                echo "<b>Heslo musĂ­ bĂ˝t delĹˇĂ­ neĹľ 5 znakĹŻ a jen malĂˇ a velkĂˇ pĂ­smena a ÄŤĂ­slice jsou povolena!</b>";
                die();
        }
        if($_POST["heslo"]!==$_POST["pheslo"]){
                echo "<b>Hesla se neshodujĂ­</b>";
                die();
        }
        echo "<h2>Funguje ty hade!</h2>";

}

?>
</body>
</head>
