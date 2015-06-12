<?php include '../../_includes/header.php' ?>

<h1>JavaScript Client</h1>
<p>The Paho JavaScript Client is a browser-based library that uses WebSockets to connect to an MQTT server. 
A simple utility to demonstrate it is included, and available 
<a href="http://www.eclipse.org/paho/clients/js/utility/index.html">online</a>.</p>

<h2 id="source">Source</h2>
<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.javascript.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.javascript.git/</a></p>

<h2 id="download">Download</h2>
<p>A zip file containing the full and a minified version of the Javascript client can be downloaded from the
<a href="https://projects.eclipse.org/projects/technology.paho/downloads">Paho downloads page</a>.

<p>Alternatively the JavaScript client can be downloaded directly from the project's git repository <a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.javascript.git/plain/src/mqttws31.js">git.eclipse.org/c/paho/org.eclipse.paho.mqtt.javascript.git/plain/src/mqttws31.js</a>.</p>

<p>Please do <b>not</b> link directly to this url from your application.</p>

<h2 id="build-from-source">Building from source</h2>
<p>The project includes a maven-based build that produces a minified version of the client, runs unit tests and generates the documentation.</p>
<p>To run the build, without the tests:</p>
<pre>git clone http://git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.javascript.git
cd org.eclipse.paho.mqtt.javascript.git
mvn
</pre>
<p>The output of the build is copied to the <code>target</code> directory.</p>

<h2 id="documentation">Documentation</h2>
<p>Reference documentation is online at: <a href="http://www.eclipse.org/paho/files/jsdoc/index.html">http://www.eclipse.org/paho/files/jsdoc/index.html</a>

<h3 id="getting-started">Getting Started</h3>
<p>The client connects to a broker using a WebSocket connection. This requires the use of a broker that supports
WebSockets natively, or the use of a gateway that can forward between WebSockets and TCP.</p>

<p>Here is a very simple example for using the client within a webpage:<p>
<pre>// Create a client instance
client = new Paho.MQTT.Client(location.hostname, Number(location.port), "clientId");

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
  message = new Paho.MQTT.Message("Hello");
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

