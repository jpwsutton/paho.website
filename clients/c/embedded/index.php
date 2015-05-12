<?php include '../../../_includes/header.php' ?>

<h1>Embedded MQTT C/C++ Client Libraries</h1>

<p>The "full" Paho MQTT C client library was written with Linux and Windows in mind.  It assumes the existence of
Posix or Windows libraries for networking (sockets), threads and memory allocation. The embedded libraries are intended to have these characteristics:
</p>

<ul>
<li>use very limited resources - pick and choose the components needed</li>
<li>not reliant on any particular libraries for networking, threading or memory management</li>
<li>ANSI standard C for maximum portability, at the lowest level</li>
<li>optional higher layer(s) in C and/or C++.</li>
</ul>

<p>The libraries can be used on desktop operating systems, but are primarily aimed for environments such as <a href="http://mbed.org">mbed</a>, <a href="http://www.arduino.cc/">Arduino</a> and <a href="http://freertos.org">FreeRTOS</a>.
</p>

<p>Currently, the libraries that exist are:
<ul>
<li>MQTTPacket.  This is the lowest level library, the simplest and smallest, but hardest to use.  It simply deals with serialization and deserialization of MQTT packets.  Serialization means taking application data and converting it to a form ready for sending across the network.  Deserialization means taking the data read from the network and extracting the data.
</li>
<li>MQTTClient.  This is a C++ library first written for mbed, but now ported to other platforms.  Although it uses C++, it still avoids dynamic memory allocations, and has replaceable classes for OS and network dependent functions.  Use of the STL is also avoided.  It is based on, and requires, MQTTPacket.
</li>
<li>MQTTClient-C.  A C version of MQTTClient, for environments where C++ is not the norm, such as FreeRTOS.  Also built on top of MQTTPacket.
</li>
</ul>
</p>

<h2 id="source">Source</h2>
<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.embedded-c.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.embedded-c.git/</a></p>

<h2 id="download">Downloads</h2>

<p>In many or most cases, you will want to get the source from Paho and use it directly.  For some platforms, there are other ways of getting the client libraries, as outlined below.
</p>

<h3>Arduino</h3>

<p>A prebuilt Arduino port of MQTTClient is available from the <a href="https://projects.eclipse.org/projects/technology.paho/downloads">Paho downloads page</a>. To use download and in the Arduino IDE use Sketch -> Import Library... -> Add Library... with the downloaded client zip file.  An example Arduino sketch demonstrating the client is included.</p>

<h3>mbed</h3>

<p>The Paho client libraries MQTTPacket and MQTTClient are available on the mbed platform for import into your applications in the <a href="https://developer.mbed.org/teams/mqtt/">MQTT team area</a>.

<h2 id="build-from-source">Building from source</h2>

<h3>Gcc</h3>

<p>Samples and tests can be built with "build" shell scripts in their respective directories.  Makefiles are being worked on.</p>

<h2 id="documentation">Documentation</h2>

<p>MQTTPacket: <a href="http://modelbasedtesting.co.uk/?p=69">New “Embedded” Paho MQTT C Client</a></p>

<p>MQTTPacket: <a href="http://modelbasedtesting.co.uk/?p=79">Receiving messages with the Paho embedded C client</a></p>

<p>MQTTClient: <a href="http://modelbasedtesting.co.uk/?p=171">Paho embedded C++ client on mbed and for Arduino</a></p>

<p>MQTTClient: <a href="http://modelbasedtesting.co.uk/?p=181">Using TLS with the the Paho embedded C++ client</a></p>

<p>MQTTClient: <a href="http://modelbasedtesting.co.uk/?p=131">Porting the Paho synchronous embedded C++ client</a></p>

<h3 id="getting-started">Getting Started</h3>

<h4>MQTTClient</h3>

<p>Here is a simple publishing and subscribing program for the MQTTClient library on Linux:</p>

<pre>
#define MQTTCLIENT_QOS2 1

#include "MQTTClient.h"

#define DEFAULT_STACK_SIZE -1

#include "linux.cpp"

int arrivedcount = 0;

void messageArrived(MQTT::MessageData& md)
{
    MQTT::Message &message = md.message;

	printf("Message %d arrived: qos %d, retained %d, dup %d, packetid %d\n", 
		++arrivedcount, message.qos, message.retained, message.dup, message.id);
    printf("Payload %.*s\n", (int)message.payloadlen, (char*)message.payload);
}


int main(int argc, char* argv[])
{   
    IPStack ipstack = IPStack();
    float version = 0.3;
    const char* topic = "mbed-sample";
    
    printf("Version is %f\n", version);
              
    MQTT::Client<IPStack, Countdown> client = MQTT::Client<IPStack, Countdown>(ipstack);
    
    const char* hostname = "iot.eclipse.org";
    int port = 1883;
    printf("Connecting to %s:%d\n", hostname, port);
    int rc = ipstack.connect(hostname, port);
	if (rc != 0)
	    printf("rc from TCP connect is %d\n", rc);
 
	printf("MQTT connecting\n");
    MQTTPacket_connectData data = MQTTPacket_connectData_initializer;       
    data.MQTTVersion = 3;
    data.clientID.cstring = (char*)"mbed-icraggs";
    rc = client.connect(data);
	if (rc != 0)
	    printf("rc from MQTT connect is %d\n", rc);
	printf("MQTT connected\n");
    
    rc = client.subscribe(topic, MQTT::QOS2, messageArrived);   
    if (rc != 0)
        printf("rc from MQTT subscribe is %d\n", rc);

    MQTT::Message message;

    // QoS 0
    char buf[100];
    sprintf(buf, "Hello World!  QoS 0 message from app version %f", version);
    message.qos = MQTT::QOS0;
    message.retained = false;
    message.dup = false;
    message.payload = (void*)buf;
    message.payloadlen = strlen(buf)+1;
    rc = client.publish(topic, message);
	if (rc != 0)
		printf("Error %d from sending QoS 0 message\n", rc);
    else while (arrivedcount == 0)
        client.yield(100);
        
    rc = client.unsubscribe(topic);
    if (rc != 0)
        printf("rc from unsubscribe was %d\n", rc);
    
    rc = client.disconnect();
    if (rc != 0)
        printf("rc from disconnect was %d\n", rc);
    
    ipstack.disconnect();
    
    return 0;
}
</pre>

<h4>MQTTPacket</h3>

<p>Here is the core of a simple publishing program for the MQTTPacket library:</p>

<pre>
MQTTPacket_connectData data = MQTTPacket_connectData_initializer;
int rc = 0;
char buf[200];
MQTTString topicString = MQTTString_initializer;
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

