<?php include '../../_includes/header.php' ?>

<h1>Using the Android MQTT client sample</h1>
<p>You can easily get a sample Android app exchanging messages using an MQTT server. Here we show you how. When you've mastered this, you can get on with including mobile messaging in your own Android applications.</p>


<h2 id="source">Prerequisite</h2>
<p>
<ul>
	<li>Get the right tools.
		<ul>
			<li>Install a <a href="http://www.oracle.com/technetwork/java/javase/downloads/index.html" target="_blank">Java Development Kit (JDK) Version 6 or later</a>.</li>
			<li>Install <a href="http://developer.android.com/sdk/index.html" target="_blank">Android SDK</a>.</li>
			<li>Select and install a set of packages and platforms from the Android SDK. Note: The SDK platform must be Android API level [11－ 19].</li>
			<li>Add the <a href="http://developer.android.com/tools/sdk/eclipse-adt.html" target="_blank">Android Development Tools (ADT)</a> plug-in to Eclipse.</li>
		</ul>
	</li>
	<li>Setup an MQTT Server. It must support the MQTT version 3.1 protocol.</li>
	<li>Clone the source code of <code>org.eclipse.paho.mqtt.java</code> via git. Run maven build: mvn clean install to build <code>org.eclipse.paho.client.mqttv3-{VERSION}.jar</code> and <code>org.eclipse.paho.android.service-{VERSION}.jar</code></li>
</ul>
</p>

<h2 id="building-from-source">Building from source</h2>
<p>The MQTT client sample Java™ app for Android uses a client library from the MQTT SDK, and exchanges messages with an MQTT server.</p>

<p>
<ul>
	<li>Import the <code>org.eclipse.paho.android.service.sample</code> app project into Eclipse.</li>
	<li>Copy the <code>org.eclipse.paho.client.mqttv3-{VERSION}.jar</code> and <code>org.eclipse.paho.android.service-{VERSION}.jar</code> library into the libs folder in the Android project. </li>
	<li>Make sure no compilation errors and then run as Android application. Or install and start the MQTT client sample Java app on an Android device. See the developer.android.com <a class="xref" href="http://developer.android.com/training/basics/firstapp/running-app.html" target="_blank" >Running your app page.</a> </li>
</ul>
</p>

<h2 id="run-app">Run the MQTT Android application</h2>
<p>Use the MQTT Android application to connect to MQTT server, subscribe, and publish to a topic.</p>
<ul>
     <li>Open the MQTT sample application. 
    	<p><img src="img/1.png" alt="" style="width: 293px; height: 44px;" align="middle"></p>
     </li>
     <li>Connect to an MQTT server. 
    	<p><img src="img/2.png" style="width: 266px; height: 255px;" align="middle"></p>
    	<p>
    	  	<ul>
    	      	<li>Click the plus sign (+) to open a new MQTT connection </li>
    	      	<li>Enter any unique identifier into the client ID field. Be patient, the keystrokes can be slow.</li>
				<li>Enter the Server field into the IP address of your MQTT server. E.g. iot.eclipse.org</li>
				<li>Enter the port of the MQTT connection. The default port number for a normal MQTT connection is 1883.</li>
				<li>Click Connect. If the connection is successful, you see a Connecting message.</li>
    	   </ul>
    	</p>
    </li>
    <li>Subscribe to a topic.
    	<p>
    	  	<ul>
    	      	<li>Click the Connected message. The Connection Details window opens with the history listed:
    	      		<p><img src="img/3.png" style="width: 295px; height: 161px;" align="middle"></p>
    	      	</li>
    	      	<li>Click the Subscribe tab, and enter a topic string.
    	      		<p><img src="img/4.png" style="width: 293px; height: 155px;" align="middle"></p>
    	      	</li>
				<li>Click the Subscribe action. A Subscribed message appears for a short time.</li>
				<li>Click the History tab. The history now includes the subscription:
					<p><img src="img/5.png" style="width: 294px; height: 201px;" align="middle"></p>
				</li>
    	   </ul>
    	</p>
    </li>
    <li>Now publish to the same topic.
    	<p>
    	  	<ul>
    	      	<li>Click the Publish tab, and enter the same topic string as you did for subscribing. Enter a message.
    	      		<p><img src="img/6.png" style="width: 295px; height: 319px;" align="middle"></p>
    	      	</li>
    	      	<li>Click the Publish action. Two messages are displayed for a short time, Published followed by Subscribed. 
    	      	    The publication is displayed in the status area (pull the separator bar down to open the status window).
    	      		<p><img src="img/7.png" style="width: 303px; height: 119px;" align="middle"></p>
    	      	</li>
				<li>Click the History tab to view the full history.
					<p><img src="img/8.png" style="width: 294px; height: 321px;" align="middle"></p>
				</li>
    	   </ul>
    	</p>
    </li>
    <li>Disconnect the client instance.
    	<p>
    	  	<ul>
    	      	<li>Click the menu icon in the action bar. The MQTT client sample application adds a Disconnect button to the MQTT Connection Details window.</li>
    	      	<li>Click Disconnect. The connected status changes to disconnected:
    	      		<p><img src="img/9.png" style="width: 296px; height: 201px;"  align="middle"></p>
    	      	</li>
    	   </ul>
    	</p>
    </li>
    <li>Click Back to return to the list of sessions.
    	<p>
    	  	<ul>
    	      	<li>Click the plus sign (+) to start a new session.</li>
    	      	<li>Click the disconnected client to reconnect it.</li>
    	      	<li>Click Back to return to the launchpad.</li>
    	   </ul>
    	</p>
    </li>
   <li>Click the task button to list running apps. Locate the MQTT client app and swipe the icon off the screen to close it.</li>
</ul>

<h2 id="finish">Congratulations!</h2>
<p>If you built the sample app yourself, you are ready to start developing your own Android apps that call MQTT libraries to exchange messages. You can model your Android apps on the classes in this sample.</p>


<?php include '../../_includes/footer.php' ?>t