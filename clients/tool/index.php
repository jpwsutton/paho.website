<?php include '../../_includes/header.php' ?>

<h1>Graphical MQTT Client Tools</h1>

<p>Here are the GUI tools currently available in Paho.
<ul>
<li>RCP application.  Can run standalone or in the Eclipse IDE.</li>
<li>Eclipse plugin.  Not all the features of the Java API are included.</li>
<li>Java Swing application (IA92 replacement).  Not all the current features of the Java API are included</li>
</ul>
</p>

<h2 id="rcp_application">MQTT RCP Application</h2>

<p>It has the following features:
<ul>
<li>Able to run the tool as a standalone RCP application or install it into existing Eclipse IDE as an Eclipse plugin.</li>
<li>Able to connect to multiple MQTT servers with multiple connections, and the connections are saved for later use.</li>
<li>Publish message, subscribe and unsubscribe multiple topics at one time.</li>
<li>Display history events: connect, disconnect, publish, subscribe, received messages and last received messages etc.</li>
<li>General options: keepAlive, connection timeout, username & password and persistence etc.</li>
<li>SSL settings: keystore and truststore.</li>
<li>High availability options: support multiple server URIs.</li>
<li>Last will and Testament options.</li>
<li>Relative bigger in size comparing to Swing based tool, around 25MB.</li>
<li>Able to run on Linux, Windows and Mac OS</li>
</ul>
</p>

<h3>Downloads</h3>

<ul>
<li><a href="http://repo.eclipse.org/content/repositories/paho-releases/org/eclipse/paho/org.eclipse.paho.ui.app/1.0.0/org.eclipse.paho.ui.app-1.0.0-linux.gtk.x86.tar.gz">Linux 32-bit</a></li>
<li><a href="http://repo.eclipse.org/content/repositories/paho-releases/org/eclipse/paho/org.eclipse.paho.ui.app/1.0.0/org.eclipse.paho.ui.app-1.0.0-linux.gtk.x86_64.tar.gz">Linux 64-bit</a></li>
<li><a href="http://repo.eclipse.org/content/repositories/paho-releases/org/eclipse/paho/org.eclipse.paho.ui.app/1.0.0/org.eclipse.paho.ui.app-1.0.0-macosx.cocoa.x86_64.tar.gz">Mac OS/X</a></li>
<li><a href="http://repo.eclipse.org/content/repositories/paho-releases/org/eclipse/paho/org.eclipse.paho.ui.app/1.0.0/org.eclipse.paho.ui.app-1.0.0-win32.win32.x86.zip">Windows 32-bit</a></li>
<li><a href="http://repo.eclipse.org/content/repositories/paho-releases/org/eclipse/paho/org.eclipse.paho.ui.app/1.0.0/org.eclipse.paho.ui.app-1.0.0-win32.win32.x86_64.zip">Windows 64-bit</a></li>
</ul>


<h3 id="eclipse_plugin">MQTT Eclipse Plugin</h3>

<p>The original Eclipse plugin.</p>

<p><a href="https://www.eclipse.org/downloads/download.php?file=/paho/releases/1.0.0/Java/plugins/org.eclipse.paho.client.eclipse.view_1.0.0.jar">Download</a>.
</p>


<h2 id="swing_based_tool">Java Swing Application (IA92 replacement)</h2>

<p>It has the following features:
<ul>
<li>Able to connect to a single MQTT Server.</li>
<li>Publish message, subscribe and unsubscribe</li>
<li>Display history events: connect, disconnect, publish, subscribe, received messages etc.</li>
<li>General options: keepAlive, connection timeout, and persistence etc.</li>
<li>Last will and Testament options.</li>
<li>Smaller in size, around 200KB.</li>
<li>Able to run on any platform where Java is supported.</li>
</ul>
</p>

<p><a href="https://www.eclipse.org/downloads/download.php?file=/paho/1.0/org.eclipse.paho.mqtt.utility-1.0.0.jar">Jar download</a>.
</p>

 
<?php include '../../_includes/footer.php' ?>

