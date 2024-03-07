<?php
//funkce precte strukturovany soubor a vrati pole
function ctiDb($f){
	$soubor=file_get_contents($f);
	$ucty=explode("\n",$soubor);
	$v=[];
	foreach($ucty as $i){
		$t=explode("|",$i);
		if($i!="") $v[$t[0]]=$t[1];
	}
	return $v;
}
//zkontroluje jestli je jmeno uz registrovane
function kontrolujUnikatnost($d,$v){
		return !array_key_exists($v,$d);
}
	?>
