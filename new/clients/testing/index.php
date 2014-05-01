<?php include '../../_includes/header.php' ?>

<h1>MQTT Conformance/Interoperability Testing</h1>

<p>The aim of this project is to create a means by which it is easy to test both MQTT servers and client libraries, to 
ensure
<ul>
<li>they conform to the MQTT 3.1.1 standard</li>
<li>and hence they can interoperate with each other, with the minimum of misunderstandings.</li>
</ul>
MQTT standardization is taking place under the aegis of <a href="https://www.oasis-open.org/committees/tc_home.php?wg_abbrev=mqtt">OASIS</a>.  The latest versions of the standard can be found in the <a href="https://www.oasis-open.org/committees/documents.php?wg_abbrev=mqtt">documents</a> section.
</p>

<p>The test material is all written in Python version 3 (Python 2.x is not sufficient).  The component of the test material are:
<ul>
<li>an MQTT conformance statements spreadsheet, extracted from the standard</li>
<li>a test broker, against which client tests can be run</li>
<li>a test client, for very basic testing of MQTT server 3.1.1 support</li>
<li>a model-based testing package, which will be used to generate the full tests, in due course</li>
</ul>

<h2 id="source">Source</h2>

<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.testing.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.testing.git/</a></p>

<h2 id="download">Download</h2>

<p>Use git to clone the repository
<pre>
git clone git://git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.testing.git
</pre>
</p>

<h2 id="documentation">Documentation</h2>

More detailed information is available at: https://wiki.eclipse.org/Interop_Testing_Plan.

<h3 id="getting-started">Getting Started</h3>

<p>A test or "model" MQTT server is in the package mqtt/broker. You can run it with the command:

<pre>
python3 startbroker.py
</pre>

and if running successfully, you will see this:

<pre>
INFO 20140203 220904 MQTT 3.1.1 Paho Test Broker
INFO 20140203 220904 Optional behaviour, publish on pubrel: True
INFO 20140203 220904 Optional behaviour, single publish on overlapping topics: True
INFO 20140203 220904 Optional behaviour, drop QoS 0 publications to disconnected clients: True
INFO 20140203 220904 Starting the MQTT server on port 1883
</pre>
</p>

<p>To test an MQTT Client Library, start the test broker, as described above.  Run your test suite against this broker. Note the coverage achieved when you stop the broker. Try and get more coverage!
</p>

<p>The client_test.py program, as described above, is a good basis for the sort of coverage that ought to be achieved.  With client libraries that ensure the data that is sent to the server consists of well-formed MQTT packets, the tests are likely hit the good paths in the broker rather than the exceptions. So you don't need to worry if your exception coverage is low or non-existent.
</p>

<p>To test an MQTT Server, run:

<pre>
python3 client_test.py [hostname:port]
</pre>

as a first test. If hostname:port are not specified, localhost:1883 is assumed. 
</p>

<?php include '../../_includes/footer.php' ?>

