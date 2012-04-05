1 	<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'
/*******************************************************************************
 * Copyright (c) 2012 
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *    
 *******************************************************************************/

$pageTitle 		= "Paho Support";

$mailingList  = "paho-dev";
  

$html  = <<<EOHTML
<div id="midcolumn">
<h2>$pageTitle</h2>

<h3 id="mail">Mailing List</h3>
<p>
  If you have a question that the existing documentation does not answer, feel free to contact our
  <a href="http://dev.eclipse.org/mailman/listinfo/$mailingList">user mailing list</a>.
</p>
<p>
  Before posting your question, please also 
  <a href="http://dev.eclipse.org/mhonarc/lists/$mailingList/">search the mailing list archive</a>
  to see whether your question has been brought up before and was already answered.
</p>

<h3 id="issues">Issue Tracker</h3>
<p>
  If you encountered a bug or have a feature request, please fill a sufficiently detailed issue in our
  <a href="https://bugs.eclipse.org/bugs/enter_bug.cgi?product=Paho">issue tracker</a>.
  Ideally, your description and attached logs should enable us to reproduce your issue.
</p>
<p>
  Please also take the time to check whether your issue has already been filled by someone else. 
</p>
</div>

<div id="rightcolumn">
$incubation
</div>
EOHTML;

# Generate the web page
$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>
