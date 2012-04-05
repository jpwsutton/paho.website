<?php

	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php");
	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php");

	$App 	= new App();
	$Nav	= new Nav();
	$Menu 	= new Menu();
	include($App->getProjectCommon());

	$pageTitle 		= "Paho Developers";
	
	// 	# Added this line per Bug 357115 – Setting up banner for emf query2 project website
	$App->AddExtraHtmlHeader("<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\"/>");

	$html  = '<div id="midcolumn">';
	$html = file_get_contents('_index.html');

	# Generate the web page
	$App->generatePage($theme, $Menu, null, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>