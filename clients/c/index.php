<?php include '../../_includes/header.php' ?>

<h1>MQTT C Client for Posix and Windows</h1>

<p>The Paho MQTT C Client is a fully fledged MQTT client written in ANSI standard C.  It avoids C++ in order to be 
as portable as possible.  A <a href="../cpp">C++ layer</a> over this library is also available in Paho.</p>

<p>In fact there are two C APIs.  "Synchronous" and "asynchronous" for which the API calls start with MQTTClient and MQTTAsync 
respectively.  The synchronous API is intended to be simpler and more helpful.  To this end, some of the calls will block until
the operation has completed, which makes programming easier.  In contrast, no calls ever block in the asynchronous API.  All notifications of API call results are made by callbacks.  This makes the API suitable for use in windowed environments like iOS for instance, where the application is not the main thread of control.
</p>

<h2 id="source">Source</h2>

<p>Source tarballs are available. <a href="http://www.eclipse.org/downloads/download.php?file=/paho/1.0/eclipse-paho-mqtt-c-src-1.0.0.tar.gz">1.0</a>.

<p>Source can also be obtained directly from the repository <a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.c.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.c.git/</a></p>

<h2 id="download">Download</h2>

<p>Pre-built release 1.0 binaries for <a href="http://www.eclipse.org/downloads/download.php?file=/paho/1.0/eclipse-paho-mqtt-c-unix-1.0.0.tar.gz">Linux</a>, <a href="http://www.eclipse.org/downloads/download.php?file=/paho/1.0/eclipse-paho-mqtt-c-windows-1.0.0.zip">Windows</a> and <a href="http://www.eclipse.org/downloads/download.php?file=/paho/1.0/eclipse-paho-mqtt-c-mac-1.0.0.tar.gz">Mac</a> are available.</p>

<p>The Windows binaries are built with Visual Studio 2013.  If you do not have this installed, you will need to install the <a href="http://www.microsoft.com/en-us/download/details.aspx?id=40784">Visual C++ Redistributable Packages for Visual Studio 2013</a></p>.

<p>Development builds can also be downloaded <a href="http://build.eclipse.org/technology/paho/C/">here</a>.</p>

<h2 id="build-from-source">Building from source</h2>

<h3>Linux</h3>

<p>The C client is built for Linux/Unix/Mac with make and gcc. To build:</p>

<pre>
git clone http://git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.c.git
cd org.eclipse.paho.mqtt.c.git
make
</pre>

<p>To install:</p>

<pre>
sudo make install
</pre>

<h3>Windows</h3>

<p>The Windows build uses Visual Studio or Visual C++.  Free Express versions are available.  To build:</p>

<pre>
git clone http://git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.c.git
cd org.eclipse.paho.mqtt.c.git
msbuild "Windows Build\Paho C MQTT APIs.sln" /p:Configuration=Release
</pre>

<p>To set the path to find msbuild, you can run utility program vcvars32.bat, which is found in a location something like:</p>

<pre>
C:\Program Files (x86)\Microsoft Visual Studio 12.0\VC\bin
</pre>

<h2 id="documentation">Documentation</h2>

Reference documentation is online at: http://www.eclipse.org/paho/files/mqttdoc/Cclient/index.html.

<h3 id="getting-started">Getting Started</h3>

<p>These C clients connect to a broker using a TCP/IP connection using Posix or Windows networking, threading and memory allocation calls. They cannot be used with other networking APIs.  For that, look at the Embdedded C client.</p>

<p>Here is a simple example of publishing with the C client synchronous API:<p>

<pre>
#include "stdio.h"
#include "stdlib.h"
#include "string.h"
#include "MQTTClient.h"

#define ADDRESS     "tcp://localhost:1883"
#define CLIENTID    "ExampleClientPub"
#define TOPIC       "MQTT Examples"
#define PAYLOAD     "Hello World!"
#define QOS         1
#define TIMEOUT     10000L

int main(int argc, char* argv[])
{
    MQTTClient client;
    MQTTClient_connectOptions conn_opts = MQTTClient_connectOptions_initializer;
    MQTTClient_message pubmsg = MQTTClient_message_initializer;
    MQTTClient_deliveryToken token;
    int rc;

    MQTTClient_create(&client, ADDRESS, CLIENTID,
        MQTTCLIENT_PERSISTENCE_NONE, NULL);
    conn_opts.keepAliveInterval = 20;
    conn_opts.cleansession = 1;

    if ((rc = MQTTClient_connect(client, &conn_opts)) != MQTTCLIENT_SUCCESS)
    {
        printf("Failed to connect, return code %d\n", rc);
        exit(-1);
    }
    pubmsg.payload = PAYLOAD;
    pubmsg.payloadlen = strlen(PAYLOAD);
    pubmsg.qos = QOS;
    pubmsg.retained = 0;
    MQTTClient_publishMessage(client, TOPIC, &pubmsg, &token);
    printf("Waiting for up to %d seconds for publication of %s\n"
            "on topic %s for client with ClientID: %s\n",
            (int)(TIMEOUT/1000), PAYLOAD, TOPIC, CLIENTID);
    rc = MQTTClient_waitForCompletion(client, token, TIMEOUT);
    printf("Message with delivery token %d delivered\n", token);
    MQTTClient_disconnect(client, 10000);
    MQTTClient_destroy(&client);
    return rc;
}
</pre>
<?php include '../../_includes/footer.php' ?>

