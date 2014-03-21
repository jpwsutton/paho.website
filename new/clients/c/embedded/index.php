<?php include '../../../_includes/header.php' ?>

<h1>Embedded MQTT C Client</h1>

<p>The "full" Paho MQTT C client library was written with Linux and Windows in mind.  It assumes the existence of
Posix or Windows libraries for networking (sockets), threads and memory allocation. This library was designed for
environments with these characteristics:
</p>

<ul>
<li>very limited resources - pick and choose the components needed</li>
<li>not reliant on any particular libraries for sockets, threads or memory allocations</li>
<li>ANSI standard C for maximum portability, at least at the lowest level</li>
</ul>

<p>
environments such as <a href="http://mbed.org">mbed</a> and <a href="http://freertos.org">FreeRTOS</a>.
</p>

<h2 id="source">Source</h2>
<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.embedded-c.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.embedded-c.git/</a></p>

<h2 id="download">Download</h2>

<p>There are no downloads yet, and may never be, because the code is intended to be used in the smallest
pieces needed.</p>

<h2 id="build-from-source">Building from source</h2>

<h3>Gcc</h3>

<p>Samples and tests can be built with "build" shell scripts in their respective directories</p>

<h2 id="documentation">Documentation</h2>

<p><a href="http://modelbasedtesting.co.uk/?p=69">New “Embedded” Paho MQTT C Client</a></p>

<p><a href="http://modelbasedtesting.co.uk/?p=79">Receiving messages with the Paho embedded C client</a></p>

<h3 id="getting-started">Getting Started</h3>

<p>Here is the core of a simple publishing program:<p>

<pre>
MQTTPacket_connectData data = MQTTPacket_connectData_initializer;
int rc = 0;
char buf[200];
MQTTString topicString;
char* payload = "mypayload";
int payloadlen = strlen(payload);int buflen = sizeof(buf);

data.clientID.cstring = "me";
data.keepAliveInterval = 20;
data.cleansession = 1;
len = MQTTSerialize_connect(buf, buflen, &data); /* 1 */

topicString.cstring = "mytopic";
len += MQTTSerialize_publish(buf + len, buflen - len, 0, 0, 0, 0, topicString, payload, payloadlen); /* 2 */

len += MQTTSerialize_disconnect(buf + len, buflen - len); /* 3 */

rc = Socket_new("127.0.0.1", 1883, &mysock);
rc = write(mysock, buf, len);
rc = close(mysock);
</pre>
<?php include '../../../_includes/footer.php' ?>

