<?php include '../../_includes/header.php' ?>

<h1>MQTT C++ Client for Posix and Windows</h1>

<p>This C++ client provides an interface which is intended to mirror the Java API as closely as possible.  It requires  
the <a href="../c">Paho MQTT C client</a> library.</p>

<h2 id="source">Source</h2>
<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.cpp.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.cpp.git/</a></p>

<h2 id="download">Download</h2>

<p>Builds will be able to be downloaded <a href="http://build.eclipse.org/technology/paho">here</a>.</p>

<h2 id="build-from-source">Building from source</h2>

<h3>Linux</h3>

<p>The C++ client is built for Linux/Unix/Mac with make and gcc. Because it uses the latest C++ constructs, it
requires gcc 4.8.1 or later.  To build:</p>

<pre>
git clone http://git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.cpp.git
cd org.eclipse.paho.mqtt.cpp.git
make
</pre>

<h2 id="documentation">Documentation</h2>

<p>Reference documentation is <a href="http://www.eclipse.org/paho/files/cppdoc/index.html">online</a>.</p>

<h3 id="getting-started">Getting Started</h3>

<p>These C++ clients connect to a broker using a TCP/IP connection using Posix or Windows networking, threading and memory allocation calls. They cannot be used with other networking APIs.  For that, look at the Embdedded C/C++ client.</p>

<p>Here is a simple example of publishing with the C++ client synchronous API:<p>

<pre>
int main(int argc, char* argv[])
{
	sample_mem_persistence persist;
	mqtt::client client(ADDRESS, CLIENTID, &persist);
	
	callback cb;
	client.set_callback(cb);

	mqtt::connect_options connOpts;
	connOpts.set_keep_alive_interval(20);
	connOpts.set_clean_session(true);

	try {
		std::cout << "Connecting..." << std::flush;
		client.connect(connOpts);
		std::cout << "OK" << std::endl;

		// First use a message pointer.

		std::cout << "Sending message..." << std::flush;
		mqtt::message_ptr pubmsg = std::make_shared<mqtt::message>(PAYLOAD1);
		pubmsg->set_qos(QOS);
		client.publish(TOPIC, pubmsg);
		std::cout << "OK" << std::endl;

		// Now try with itemized publish.

		std::cout << "Sending next message..." << std::flush;
		client.publish(TOPIC, PAYLOAD2, strlen(PAYLOAD2)+1, 0, false);
		std::cout << "OK" << std::endl;

		// Now try with a listener, but no token

		std::cout << "Sending final message..." << std::flush;
		pubmsg = std::make_shared<mqtt::message>(PAYLOAD3);
		pubmsg->set_qos(QOS);
		client.publish(TOPIC, pubmsg);
		std::cout << "OK" << std::endl;

		// Disconnect
		std::cout << "Disconnecting..." << std::flush;
		client.disconnect();
		std::cout << "OK" << std::endl;
	}
	catch (const mqtt::persistence_exception& exc) {
		std::cerr << "Persistence Error: " << exc.what() << " ["
			<< exc.get_reason_code() << "]" << std::endl;
		return 1;
	}
	catch (const mqtt::exception& exc) {
		std::cerr << "Error: " << exc.what() << " ["
			<< exc.get_reason_code() << "]" << std::endl;
		return 1;
	}

 	return 0;
}
</pre>
<?php include '../../_includes/footer.php' ?>

