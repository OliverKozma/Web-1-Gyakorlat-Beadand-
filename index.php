<?php
	include('./includes/config.inc.php');

	$oldal = isset($_GET['oldal']) ? $_GET['oldal'] : $_SERVER['QUERY_STRING'];

	if (isset($oldalak[$oldal]) && file_exists("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php")) {
		$keres = $oldalak[$oldal];
	}
	else if ($oldal == "" || $oldal == "/") {
		$keres = $oldalak['/'];
	}
	else { 
		$keres = $hiba_oldal;
		header("HTTP/1.0 404 Not Found");
	}

	$logika = "./logicals/{$keres['fajl']}.php";
	if (file_exists($logika)) {
		include($logika);
	}

	include('./templates/index.tpl.php'); 
?>