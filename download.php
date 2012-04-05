<?php  																														require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/app.class.php");	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/nav.class.php"); 	require_once($_SERVER['DOCUMENT_ROOT'] . "/eclipse.org-common/system/menu.class.php"); 	$App 	= new App();	$Nav	= new Nav();	$Menu 	= new Menu();		include($App->getProjectCommon());    # All on the same line to unclutter the user's desktop'
/*******************************************************************************
 * Copyright (c) 2009 
 * All rights reserved. This program and the accompanying materials
 * are made available under the terms of the Eclipse Public License v1.0
 * which accompanies this distribution, and is available at
 * http://www.eclipse.org/legal/epl-v10.html
 *
 * Contributors:
 *    
 *******************************************************************************/

	$pageTitle 		= "Paho Downloads";

	$html  = <<<EOHTML
<div id="midcolumn">
<h2>$pageTitle</h2>
<p>All downloads are provided under the terms and conditions of the <a href="/legal/epl/notice.php">Eclipse Foundation Software User Agreement</a> unless otherwise specified.</p>
<p>The Paho project is in <a href="http://wiki.eclipse.org/Development_Resources/HOWTO/Incubation_Phase#.281.29_What_Is_Incubation.3F">Incubator Status</a> and is using the <a href="http://wiki.eclipse.org/Development_Resources/HOWTO/Parallel_IP_Process">Eclipse Parallel IP Process</a> </p>

<h3>MQTT Client: Initial Release for C Language</h3>
<p>A stable initial release of a C client implementation of the MQTT Protocol is now available in the 
<a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.c.git/">Git repository: </a> http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.c.git/
<br />

<h3>MQTT Client: Initial Release for Java Language</h3>
<p>A stable initial release of a Java client implementation of the MQTT Protocol is now available in the 
<a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.java.git/">Git repository: </a> http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.java.git/
<br />
<!--
<b>ZIP file: </b><a href="/downloads/download.php?file=/myproject/file.zip">file.zip</a> (10 MiB)</p>
-->
<p> Andy Piper has posted a  
<a
href="http://andypiper.co.uk/2012/03/10/paho-gets-started/">quick start guide for the MQTT C Client
</a></p>

<!--
<h3>Helios - Eclipse 3.6 (unreleased)</h3>
<p><b>Update site:</b> http://download.eclipse.org/myproject/<br />
<b>ZIP file: </b><a href="/downloads/download.php?file=/myproject/file.zip">file.zip</a> (10 MiB)</p>
-->

</div>
	
44 	<div id="rightcolumn">
45 	$incubation
46 	</div>
EOHTML;
	# Generate the web page
	$App->generatePage($theme, $Menu, $Nav, $pageAuthor, $pageKeywords, $pageTitle, $html);
?>