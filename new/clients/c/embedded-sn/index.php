<?php include '../../../_includes/header.php' ?>

<h1>Embedded MQTT-SN C/C++ Client</h1>

<p>This library is intended to have these characteristics:
</p>

<ul>
<li>use very limited resources - pick and choose the components needed</li>
<li>not reliant on any particular libraries for networking, threading or memory management</li>
<li>ANSI standard C for maximum portability, at the lowest level</li>
<li>optional higher layer(s) in C and/or C++.</li>
</ul>

<p>The library can be used on desktop operating systems, but is primarily aimed for environments such as <a href="http://mbed.org">mbed</a> and <a href="http://freertos.org">FreeRTOS</a>.
</p>

<h2 id="source">Source</h2>
<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt-sn.embedded-c.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt-sn.embedded-c.git/</a></p>

<h2 id="download">Download</h2>

<p>There are no pre-built downloads available. This code is intended to be used in 
the smallest pieces needed for the particular embedded system.</p>

<h2 id="build-from-source">Building from source</h2>

<h3>Gcc</h3>

<p>Samples and tests can be built with "build" shell scripts in their respective directories</p>

<h2 id="documentation">Documentation</h2>

<p>Will be added when ready</p>


<h3 id="getting-started">Getting Started</h3>

<p>Here is the core of a simple publishing program:<p>

<pre>
int sendPacketBuffer(int asocket, char* host, int port, unsigned char* buf, int buflen)
{
	struct sockaddr_in cliaddr;
	int rc = 0;

	memset(&cliaddr, 0, sizeof(cliaddr));
	cliaddr.sin_family = AF_INET;
	cliaddr.sin_addr.s_addr = inet_addr(host);
	cliaddr.sin_port = htons(port);

	if ((rc = sendto(asocket, buf, buflen, 0, (const struct sockaddr*)&cliaddr, sizeof(cliaddr))) == SOCKET_ERROR)
		Socket_error("sendto", asocket);
	else
		rc = 0;
	return rc;
}

int main(int argc, char** argv)
{
	int rc = 0;
	unsigned char buf[200];
	int buflen = sizeof(buf);
	int mysock = 0;
	MQTTSN_topicid topic;
	unsigned char* payload = (unsigned char*)"mypayload";
	int payloadlen = strlen((char*)payload);
	int len = 0, dup = 0, qos = 0, retained = 0, packetid = 0;
	char *host = "127.0.0.1";
	char *topicname = "a long topic name";
	int port = 1883;
	MQTTSNPacket_connectData options = MQTTSNPacket_connectData_initializer;

	printf("Sending to hostname %s port %d\n", host, port);

	mysock = socket(AF_INET, SOCK_DGRAM, 0);
	if (mysock == INVALID_SOCKET)
		rc = Socket_error("socket", mysock);

	options.clientID.cstring = "myclientid";
	len = MQTTSNSerialize_connect(buf, buflen, &options);
	rc = sendPacketBuffer(mysock, host, port, buf, len);

	topic.type = MQTTSN_TOPIC_TYPE_NORMAL;
	topic.data.qos3.longname = topicname;
	topic.data.qos3.longlen = strlen(topicname);
	len = MQTTSNSerialize_publish(buf, buflen - len, dup, qos, retained, packetid,
			topic, payload, payloadlen);
	rc = sendPacketBuffer(mysock, host, port, buf, len);

	rc = shutdown(mysock, SHUT_WR);
	rc = close(mysock);

	return 0;
}
</pre>
<?php include '../../../_includes/footer.php' ?>

