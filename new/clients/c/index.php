<?php include '../../_includes/header.php' ?>

<h1>MQTT C Client for Posix and Windows</h1>

<p>The Paho MQTT C Client is a fully fledged MQTT client written in ANSI standard C.  It avoids C++ in order to be 
as portable as possible.  A <a href="../cpp">C++ layer</a> over this library is also available in Paho.</p>

<h2 id="source">Source</h2>
<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.c.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.c.git/</a></p>

<h2 id="download">Download</h2>

<p>The C client can be downloaded directly from the project's git repository <a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.javascript.git/plain/src/mqttws31.js">here</a>.</p>

<h2 id="build-from-source">Building from source</h2>

<h3>Linux</h3>

<p>The C client is built for Linux/Unix/Mac with make and gcc.</p>

<p>To run the build, without the tests:</p>
<pre>git clone http://git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.javascript.git
cd org.eclipse.paho.mqtt.javascript.git
mvn
</pre>
<p>The output of the build is copied to the <code>target</code> directory.</p>

<h3>Windows</h3>

<p>

<h2 id="documentation">Documentation</h2>

The reference documentation is online at: http://www.eclipse.org/paho/files/mqttdoc/Cclient/index.html

<h3 id="getting-started">Getting Started</h3>

<p>The client connects to a broker using a WebSocket connection. This requires the use of a broker that supports
WebSockets natively, or the use of a gateway that can forward between WebSockets and TCP.</p>

<p>Here is a very simple example for using the client within a webpage:<p>
<pre>// Create a client instance
client = new Messaging.Client(location.hostname, Number(location.port), "clientId");

// set callback handlers
client.onConnectionLost = onConnectionLost;
client.onMessageArrived = onMessageArrived;

// connect the client
client.connect({onSuccess:onConnect});


// called when the client connects
function onConnect() {
  // Once a connection has been made, make a subscription and send a message.
  console.log("onConnect");
  client.subscribe("/World");
  message = new Messaging.Message("Hello");
  message.destinationName = "/World";
  client.send(message); 
}

// called when the client loses its connection
function onConnectionLost(responseObject) {
  if (responseObject.errorCode !== 0) {
    console.log("onConnectionLost:"+responseObject.errorMessage);
  }
}

// called when a message arrives
function onMessageArrived(message) {
  console.log("onMessageArrived:"+message.payloadString);
}
</pre>
<?php include '../../_includes/footer.php' ?>

