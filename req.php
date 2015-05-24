<?php
	require_once 'dbnav/mainpg.php';
	require_once 'dbnav/subpg.php';
	require_once 'dbnav/res.php';
	require_once 'dbsearch/search.php';
	if($_REQUEST["id"]=="main"){
		$pg = new mainpage($_REQUEST["pg"],$_REQUEST["count"]);
		$json = $pg->getPage();
		echo $json;

	} elseif ($_REQUEST["id"]=="sub") {
		$pg = new subjectpage($_REQUEST["pg"],$_REQUEST["count"],$_REQUEST["semID"]);
		$json = $pg->getPage();
		echo $json;
	} elseif ($_REQUEST["id"]=="res"){
		$pg = new resourcepage($_REQUEST["pg"],$_REQUEST["count"],$_REQUEST["subID"]);
		$json = $pg->getPage();
		echo $json;
	} else {
		$pg = new search(0,0,$_REQUEST["key"]);
		$json = $pg->getResult();
		echo $json;
	}
?>