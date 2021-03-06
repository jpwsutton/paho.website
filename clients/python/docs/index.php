<?php include '../../../_includes/header.php' ?>
<h1 class="title">Python Client - documentation</h1>
<div class="section" id="contents">
<h1>Contents</h1>
<ul>
<li><p class="first"><a class="reference internal" href="#installation">Installation</a></p>
</li>
<li><dl class="first docutils">
<dt><a class="reference internal" href="#usage-and-api">Usage and API</a></dt>
<dd><ul class="first last">
<li><dl class="first docutils">
<dt><a class="reference internal" href="#client">Client</a></dt>
<dd><ul class="first last simple">
<li><a class="reference internal" href="#constructor-reinitialise">Constructor / reinitialise</a></li>
<li><a class="reference internal" href="#option-functions">Option functions</a></li>
<li><a class="reference internal" href="#connect-reconnect-disconnect">Connect / reconnect / disconnect</a></li>
<li><a class="reference internal" href="#network-loop">Network loop</a></li>
<li><a class="reference internal" href="#publishing">Publishing</a></li>
<li><a class="reference internal" href="#subscribe-unsubscribe">Subscribe / Unsubscribe</a></li>
<li><a class="reference internal" href="#callbacks">Callbacks</a></li>
<li><a class="reference internal" href="#external-event-loop-support">External event loop support</a></li>
<li><a class="reference internal" href="#global-helper-functions">Global helper functions</a></li>
</ul>
</dd>
</dl>
</li>
<li><dl class="first docutils">
<dt><a class="reference internal" href="#id17">Publish</a></dt>
<dd><ul class="first last simple">
<li><a class="reference internal" href="#single">Single</a></li>
<li><a class="reference internal" href="#multiple">Multiple</a></li>
</ul>
</dd>
</dl>
</li>
</ul>
</dd>
</dl>
</li>
<li><p class="first"><a class="reference internal" href="#reporting-bugs">Reporting bugs</a></p>
</li>
<li><p class="first"><a class="reference internal" href="#more-information">More information</a></p>
</li>
</ul>
</div>
<div class="section" id="installation">
<h1>Installation</h1>
<p>The latest stable version is available in the Python Package Index (PyPi) and can be installed using</p>
<pre class="literal-block">
pip install paho-mqtt
</pre>
<p>Or with <tt class="docutils literal">virtualenv</tt>:</p>
<pre class="literal-block">
virtualenv paho-mqtt
source paho-mqtt/bin/activate
pip install paho-mqtt
</pre>
<p>To obtain the full code, including examples and tests, you can clone the git repository:</p>
<pre class="literal-block">
git clone git://git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.python.git
</pre>
</div>
<div class="section" id="usage-and-api">
<h1>Usage and API</h1>
<p>Detailed API documentation is available through <strong>pydoc</strong>. Samples are available in the <strong>examples</strong> directory.</p>
<p>The package provides two modules, a full client and a helper for simple publishing.</p>
<div class="section" id="client">
<h2>Client</h2>
<p>You can use the client class as an instance, within a class or by subclassing. The general usage flow is as follows:</p>
<ul class="simple">
<li>Create a client instance</li>
<li>Connect to a broker using one of the <tt class="docutils literal"><span class="pre">connect*()</span></tt> functions</li>
<li>Call one of the <tt class="docutils literal"><span class="pre">loop*()</span></tt> functions to maintain network traffic flow with the broker</li>
<li>Use <tt class="docutils literal">subscribe()</tt> to subscribe to a topic and receive messages</li>
<li>Use <tt class="docutils literal">publish()</tt> to publish messages to the broker</li>
<li>Use <tt class="docutils literal">disconnect()</tt> to disconnect from the broker</li>
</ul>
<p>Callbacks will be called to allow the application to process events as necessary. These callbacks are described below.</p>
<div class="section" id="constructor-reinitialise">
<h3>Constructor / reinitialise</h3>
<div class="section" id="id1">
<h4>Client()</h4>
<pre class="literal-block">
Client(client_id=&quot;&quot;, clean_session=True, userdata=None, protocol=MQTTv31)
</pre>
<p>The <tt class="docutils literal">Client()</tt> constructor takes the following arguments:</p>
<dl class="docutils">
<dt>client_id</dt>
<dd>the unique client id string used when connecting to the broker. If <tt class="docutils literal">client_id</tt> is zero length or <tt class="docutils literal">None</tt>, then one will be randomly generated. In this case the <tt class="docutils literal">clean_session</tt> parameter must be <tt class="docutils literal">True</tt>.</dd>
<dt>clean_session</dt>
<dd><p class="first">a boolean that determines the client type. If <tt class="docutils literal">True</tt>, the broker will remove all information about this client when it disconnects. If <tt class="docutils literal">False</tt>, the client is a durable client and subscription information and queued messages will be retained when the client disconnects.</p>
<p class="last">Note that a client will never discard its own outgoing messages on disconnect. Calling connect() or reconnect() will cause the messages to be resent. Use reinitialise() to reset a client to its original state.</p>
</dd>
<dt>userdata</dt>
<dd>user defined data of any type that is passed as the <tt class="docutils literal">userdata</tt> parameter to callbacks. It may be updated at a later point with the <tt class="docutils literal">user_data_set()</tt> function.</dd>
<dt>protocol</dt>
<dd>the version of the MQTT protocol to use for this client. Can be either <tt class="docutils literal">MQTTv31</tt> or <tt class="docutils literal">MQTTv311</tt></dd>
</dl>
<div class="section" id="example">
<h5>Example</h5>
<pre class="literal-block">
import paho.mqtt.client as mqtt

mqttc = mqtt.Client()
</pre>
</div>
</div>
<div class="section" id="reinitialise">
<h4>reinitialise()</h4>
<pre class="literal-block">
reinitialise(client_id=&quot;&quot;, clean_session=True, userdata=None)
</pre>
<p>The <tt class="docutils literal">reinitialise()</tt> function resets the client to its starting state as if it had just been created. It takes the same arguments as the <tt class="docutils literal">Client()</tt> constructor.</p>
<div class="section" id="id2">
<h5>Example</h5>
<pre class="literal-block">
mqttc.reinitialise()
</pre>
</div>
</div>
</div>
<div class="section" id="option-functions">
<h3>Option functions</h3>
<p>These functions represent options that can be set on the client to modify its behaviour. In the majority of cases this must be done <em>before</em> connecting to a broker.</p>
<div class="section" id="max-inflight-messages-set">
<h4>max_inflight_messages_set()</h4>
<pre class="literal-block">
max_inflight_messages_set(self, inflight)
</pre>
<p>Set the maximum number of messages with QoS&gt;0 that can be part way through their network flow at once.</p>
<p>Defaults to 20. Increasing this value will consume more memory but can increase throughput.</p>
</div>
<div class="section" id="message-retry-set">
<h4>message_retry_set()</h4>
<dl class="docutils">
<dt>::</dt>
<dd>message_retry_set(retry)</dd>
</dl>
<p>Set the time in seconds before a message with QoS&gt;0 is retried, if the broker does not respond.</p>
<p>This is set to 5 seconds by default and should not normally need changing.</p>
</div>
<div class="section" id="tls-set">
<h4>tls_set()</h4>
<pre class="literal-block">
tls_set(ca_certs, certfile=None, keyfile=None, cert_reqs=ssl.CERT_REQUIRED,
    tls_version=ssl.PROTOCOL_TLSv1, ciphers=None)
</pre>
<p>Configure network encryption and authentication options. Enables SSL/TLS support.</p>
<dl class="docutils">
<dt>ca_certs</dt>
<dd>a string path to the Certificate Authority certificate files that are to be treated as trusted by this client. If this is the only option given then the client will operate in a similar manner to a web browser. That is to say it will require the broker to have a certificate signed by the Certificate Authorities in <tt class="docutils literal">ca_certs</tt> and will communicate using TLS v1, but will not attempt any form of authentication. This provides basic network encryption but may not be sufficient depending on how the broker is configured.</dd>
<dt>certfile, keyfile</dt>
<dd>strings pointing to the PEM encoded client certificate and private keys respectively. If these arguments are not <tt class="docutils literal">None</tt> then they will be used as client information for TLS based authentication. Support for this feature is broker dependent. Note that if either of these files in encrypted and needs a password to decrypt it, Python will ask for the password at the command line. It is not currently possible to define a callback to provide the password.</dd>
<dt>cert_reqs</dt>
<dd>defines the certificate requirements that the client imposes on the broker. By default this is <tt class="docutils literal">ssl.CERT_REQUIRED</tt>, which means that the broker must provide a certificate. See the ssl pydoc for more information on this parameter.</dd>
<dt>tls_version</dt>
<dd>specifies the version of the SSL/TLS protocol to be used. By default TLS v1 is used. Previous versions (all versions beginning with SSL) are possible but not recommended due to possible security problems.</dd>
<dt>ciphers</dt>
<dd>a string specifying which encryption ciphers are allowable for this connection, or <tt class="docutils literal">None</tt> to use the defaults. See the ssl pydoc for more information.</dd>
</dl>
<p>Must be called before <tt class="docutils literal"><span class="pre">connect*()</span></tt>.</p>
</div>
<div class="section" id="tls-insecure-set">
<h4>tls_insecure_set()</h4>
<pre class="literal-block">
tls_insecure_set(value)
</pre>
<p>Configure verification of the server hostname in the server certificate.</p>
<p>If <tt class="docutils literal">value</tt> is set to <tt class="docutils literal">True</tt>, it is impossible to guarantee that the host you are connecting to is not impersonating your server. This can be useful in initial server testing, but makes it possible for a malicious third party to impersonate your server through DNS spoofing, for example.</p>
<p>Do not use this function in a real system. Setting value to True means there is no point using encryption.</p>
<p>Must be called before <tt class="docutils literal">connect*)</tt>.</p>
</div>
<div class="section" id="username-pw-set">
<h4>username_pw_set()</h4>
<pre class="literal-block">
username_pw_set(username, password=None)
</pre>
<p>Set a username and optionally a password for broker authentication. Must be called before <tt class="docutils literal"><span class="pre">connect*()</span></tt>.</p>
</div>
<div class="section" id="user-data-set">
<h4>user_data_set()</h4>
<dl class="docutils">
<dt>::</dt>
<dd>user_data_set(userdata)</dd>
</dl>
<p>Set the private user data that will be passed to callbacks when events are generated. Use this for your own purpose to support your application.</p>
</div>
<div class="section" id="will-set">
<h4>will_set()</h4>
<dl class="docutils">
<dt>::</dt>
<dd>will_set(topic, payload=None, qos=0, retain=False)</dd>
</dl>
<p>Set a Will to be sent to the broker. If the client disconnects without calling <tt class="docutils literal">disconnect()</tt>, the broker will publish the message on its behalf.</p>
<dl class="docutils">
<dt>topic</dt>
<dd>the topic that the will message should be published on.</dd>
<dt>payload</dt>
<dd>the message to send as a will. If not given, or set to <tt class="docutils literal">None</tt> a zero length message will be used as the will. Passing an int or float will result in the payload being converted to a string representing that number. If you wish to send a true int/float, use <tt class="docutils literal">struct.pack()</tt> to create the payload you require.</dd>
<dt>qos</dt>
<dd>the quality of service level to use for the will.</dd>
<dt>retain</dt>
<dd>if set to <tt class="docutils literal">True</tt>, the will message will be set as the &quot;last known good&quot;/retained message for the topic.</dd>
</dl>
<p>Raises a <tt class="docutils literal">ValueError</tt> if <tt class="docutils literal">qos</tt> is not 0, 1 or 2, or if <tt class="docutils literal">topic</tt> is <tt class="docutils literal">None</tt> or has zero string length.</p>
</div>
</div>
<div class="section" id="connect-reconnect-disconnect">
<h3>Connect / reconnect / disconnect</h3>
<div class="section" id="connect">
<h4>connect()</h4>
<pre class="literal-block">
connect(host, port=1883, keepalive=60, bind_address=&quot;&quot;)
</pre>
<p>The <tt class="docutils literal">connect()</tt> function connects the client to a broker. This is a blocking function. It takes the following arguments:</p>
<dl class="docutils">
<dt>host</dt>
<dd>the hostname or IP address of the remote broker</dd>
<dt>port</dt>
<dd>the network port of the server host to connect to. Defaults to 1883. Note that the default port for MQTT over SSL/TLS is 8883 so if you are using <tt class="docutils literal">tls_set()</tt> the port may need providing manually</dd>
<dt>keepalive</dt>
<dd>maximum period in seconds allowed between communications with the broker. If no other messages are being exchanged, this controls the rate at which the client will send ping messages to the broker</dd>
<dt>bind_address</dt>
<dd>the IP address of a local network interface to bind this client to, assuming multiple interfaces exist</dd>
</dl>
<div class="section" id="callback">
<h5>Callback</h5>
<p>When the client receives a CONNACK message from the broker in response to the connect it generates an <tt class="docutils literal">on_connect()</tt> callback.</p>
</div>
<div class="section" id="id3">
<h5>Example</h5>
<pre class="literal-block">
mqttc.connect(&quot;iot.eclipse.org&quot;)
</pre>
</div>
</div>
<div class="section" id="connect-async">
<h4>connect_async()</h4>
<pre class="literal-block">
connect_async(host, port=1883, keepalive=60, bind_address=&quot;&quot;)
</pre>
<p>Identical to <tt class="docutils literal">connect()</tt>, but non-blocking. The connection will not complete until one of the <tt class="docutils literal"><span class="pre">loop*()</span></tt> functions is called.</p>
<div class="section" id="id4">
<h5>Callback</h5>
<p>When the client receives a CONNACK message from the broker in response to the connect it generates an <tt class="docutils literal">on_connect()</tt> callback.</p>
</div>
</div>
<div class="section" id="connect-srv">
<h4>connect_srv()</h4>
<pre class="literal-block">
connect_srv(domain, keepalive=60, bind_address=&quot;&quot;)
</pre>
<p>Connect to a broker using an SRV DNS lookup to obtain the broker address. Takes the following arguments:</p>
<dl class="docutils">
<dt>domain</dt>
<dd>the DNS domain to search for SRV records. If <tt class="docutils literal">None</tt>, try to determine the local domain name.</dd>
</dl>
<p>See <tt class="docutils literal">connect()</tt> for a description of the <tt class="docutils literal">keepalive</tt> and <tt class="docutils literal">bind_address</tt> arguments.</p>
<div class="section" id="id5">
<h5>Callback</h5>
<p>When the client receives a CONNACK message from the broker in response to the connect it generates an <tt class="docutils literal">on_connect()</tt> callback.</p>
</div>
<div class="section" id="id6">
<h5>Example</h5>
<pre class="literal-block">
mqttc.connect_srv(&quot;eclipse.org&quot;)
</pre>
</div>
</div>
<div class="section" id="reconnect">
<h4>reconnect()</h4>
<pre class="literal-block">
reconnect()
</pre>
<p>Reconnect to a broker using the previously provided details. You must have called <tt class="docutils literal"><span class="pre">connect*()</span></tt> before calling this function.</p>
<div class="section" id="id7">
<h5>Callback</h5>
<p>When the client receives a CONNACK message from the broker in response to the connect it generates an <tt class="docutils literal">on_connect()</tt> callback.</p>
</div>
</div>
<div class="section" id="disconnect">
<h4>disconnect()</h4>
<pre class="literal-block">
disconnect()
</pre>
<p>Disconnect from the broker cleanly. Using <tt class="docutils literal">disconnect()</tt> will not result in a will message being sent by the broker.</p>
<div class="section" id="id8">
<h5>Callback</h5>
<p>When the client has sent the disconnect message it generates an <tt class="docutils literal">on_disconnect()</tt> callback.</p>
</div>
</div>
</div>
<div class="section" id="network-loop">
<h3>Network loop</h3>
<p>These functions are the driving force behind the client. If they are not called, incoming network data will not be processed and outgoing network data may not be sent in a timely fashion. There are four options for managing the network loop. Three are described here, the fourth in &quot;External event loop support&quot; below. Do not mix the different loop functions.</p>
<div class="section" id="loop">
<h4>loop()</h4>
<pre class="literal-block">
loop(timeout=1.0, max_packets=1)
</pre>
<p>Call regularly to process network events. This call waits in <tt class="docutils literal">select()</tt> until the network socket is available for reading or writing, if appropriate, then handles the incoming/outgoing data. This function blocks for up to <tt class="docutils literal">timeout</tt> seconds. <tt class="docutils literal">timeout</tt> must not exceed the <tt class="docutils literal">keepalive</tt> value for the client or your client will be regularly disconnected by the broker.</p>
<p>The <tt class="docutils literal">max_packets</tt> argument is obsolete and should be left unset.</p>
<div class="section" id="id9">
<h5>Example</h5>
<pre class="literal-block">
run = True
while run:
    mqttc.loop()
</pre>
</div>
</div>
<div class="section" id="loop-start-loop-stop">
<h4>loop_start() / loop_stop()</h4>
<pre class="literal-block">
loop_start()
loop_stop(force=False)
</pre>
<p>These functions implement a threaded interface to the network loop. Calling <tt class="docutils literal">loop_start()</tt> once, before or after <tt class="docutils literal"><span class="pre">connect*()</span></tt>, runs a thread in the background to call <tt class="docutils literal">loop()</tt> automatically. This frees up the main thread for other work that may be blocking. This call also handles reconnecting to the broker. Call <tt class="docutils literal">loop_stop()</tt> to stop the background thread. The <tt class="docutils literal">force</tt> argument is currently ignored.</p>
<div class="section" id="id10">
<h5>Example</h5>
<pre class="literal-block">
mqttc.connect(&quot;iot.eclipse.org&quot;)
mqttc.loop_start()

while True:
    temperature = sensor.blocking_read()
    mqttc.publish(&quot;paho/temperature&quot;, temperature)
</pre>
</div>
</div>
<div class="section" id="loop-forever">
<h4>loop_forever()</h4>
<pre class="literal-block">
loop_forever(timeout=1.0, max_packets=1)
</pre>
<p>This is a blocking form of the network loop and will not return until the client calls <tt class="docutils literal">disconnect()</tt>. It automatically handles reconnecting.</p>
<p>The <tt class="docutils literal">timeout</tt> and <tt class="docutils literal">max_packets</tt> arguments are obsolete and should be left unset.</p>
</div>
</div>
<div class="section" id="publishing">
<h3>Publishing</h3>
<p>Send a message from the client to the broker.</p>
<div class="section" id="publish">
<h4>publish()</h4>
<pre class="literal-block">
publish(topic, payload=None, qos=0, retain=False)
</pre>
<p>This causes a message to be sent to the broker and subsequently from the broker to any clients subscribing to matching topics. It takes the following arguments:</p>
<dl class="docutils">
<dt>topic</dt>
<dd>the topic that the message should be published on</dd>
<dt>payload</dt>
<dd>the actual message to send. If not given, or set to <tt class="docutils literal">None</tt> a zero length message will be used. Passing an int or float will result in the payload being converted to a string representing that number. If you wish to send a true int/float, use <tt class="docutils literal">struct.pack()</tt> to create the payload you require</dd>
<dt>qos</dt>
<dd>the quality of service level to use</dd>
<dt>retain</dt>
<dd>if set to <tt class="docutils literal">True</tt>, the message will be set as the &quot;last known good&quot;/retained message for the topic.</dd>
</dl>
<p>Returns a tuple <tt class="docutils literal">(result, mid)</tt>, where result is <tt class="docutils literal">MQTT_ERR_SUCCESS</tt> to indicate success or <tt class="docutils literal">MQTT_ERR_NO_CONN</tt> if the client is not currently connected. <tt class="docutils literal">mid</tt> is the message ID for the publish request. The mid value can be used to track the publish request by checking against the mid argument in the <tt class="docutils literal">on_publish()</tt> callback if it is defined.</p>
<p>A <tt class="docutils literal">ValueError</tt> will be raised if topic is <tt class="docutils literal">None</tt>, has zero length or is invalid (contains a wildcard), if <tt class="docutils literal">qos</tt> is not one of 0, 1 or 2, or if the length of the payload is greater than 268435455 bytes.</p>
<div class="section" id="id11">
<h5>Callback</h5>
<p>When the message has been sent to the broker an <tt class="docutils literal">on_publish()</tt> callback will be generated.</p>
</div>
</div>
</div>
<div class="section" id="subscribe-unsubscribe">
<h3>Subscribe / Unsubscribe</h3>
<div class="section" id="subscribe">
<h4>subscribe()</h4>
<pre class="literal-block">
subscribe(topic, qos=0)
</pre>
<p>Subscribe the client to one or more topics.</p>
<p>This function may be called in three different ways:</p>
<div class="section" id="simple-string-and-integer">
<h5>Simple string and integer</h5>
<p>e.g. <tt class="docutils literal"><span class="pre">subscribe(&quot;my/topic&quot;,</span> 2)</tt></p>
<dl class="docutils">
<dt>topic</dt>
<dd>a string specifying the subscription topic to subscribe to.</dd>
<dt>qos</dt>
<dd>the desired quality of service level for the subscription. Defaults to 0.</dd>
</dl>
</div>
<div class="section" id="string-and-integer-tuple">
<h5>String and integer tuple</h5>
<p>e.g. <tt class="docutils literal"><span class="pre">subscribe((&quot;my/topic&quot;,</span> 1))</tt></p>
<dl class="docutils">
<dt>topic</dt>
<dd>a tuple of <tt class="docutils literal">(topic, qos)</tt>. Both topic and qos must be present in the tuple.</dd>
<dt>qos</dt>
<dd>not used.</dd>
</dl>
</div>
<div class="section" id="list-of-string-and-integer-tuples">
<h5>List of string and integer tuples</h5>
<p>e.g. <tt class="docutils literal"><span class="pre">subscribe([(&quot;my/topic&quot;,</span> 0), (&quot;another/topic&quot;, <span class="pre">2)])</span></tt></p>
<p>This allows multiple topic subscriptions in a single SUBSCRIPTION command, which is more efficient than using multiple calls to <tt class="docutils literal">subscribe()</tt>.</p>
<dl class="docutils">
<dt>topic</dt>
<dd>a list of tuple of format <tt class="docutils literal">(topic, qos)</tt>. Both topic and qos must be present in all of the tuples.</dd>
<dt>qos</dt>
<dd>not used.</dd>
</dl>
<p>The function returns a tuple <tt class="docutils literal">(result, mid)</tt>, where <tt class="docutils literal">result</tt> is <tt class="docutils literal">MQTT_ERR_SUCCESS</tt> to indicate success or <tt class="docutils literal">(MQTT_ERR_NO_CONN, None)</tt> if the client is not currently connected.  <tt class="docutils literal">mid</tt> is the message ID for the subscribe request. The mid value can be used to track the subscribe request by checking against the mid argument in the <tt class="docutils literal">on_subscribe()</tt> callback if it is defined.</p>
<p>Raises a <tt class="docutils literal">ValueError</tt> if <tt class="docutils literal">qos</tt> is not 0, 1 or 2, or if topic is <tt class="docutils literal">None</tt> or has zero string length, or if <tt class="docutils literal">topic</tt> is not a string, tuple or list.</p>
</div>
<div class="section" id="id12">
<h5>Callback</h5>
<p>When the broker has acknowledged the subscription, an <tt class="docutils literal">on_subscribe()</tt> callback will be generated.</p>
</div>
</div>
<div class="section" id="unsubscribe">
<h4>unsubscribe()</h4>
<pre class="literal-block">
unsubscribe(topic)
</pre>
<p>Unsubscribe the client from one or more topics.</p>
<dl class="docutils">
<dt>topic</dt>
<dd>a single string, or list of strings that are the subscription topics to unsubscribe from.</dd>
</dl>
<p>Returns a tuple <tt class="docutils literal">(result, mid)</tt>, where <tt class="docutils literal">result</tt> is <tt class="docutils literal">MQTT_ERR_SUCCESS</tt>
to indicate success, or <tt class="docutils literal">(MQTT_ERR_NO_CONN, None)</tt> if the client is not
currently connected. <tt class="docutils literal">mid</tt> is the message ID for the unsubscribe request. The mid value can be used to track the unsubscribe request by checking against the mid
argument in the <tt class="docutils literal">on_unsubscribe()</tt> callback if it is defined.</p>
<p>Raises a <tt class="docutils literal">ValueError</tt> if <tt class="docutils literal">topic</tt> is <tt class="docutils literal">None</tt> or has zero string length, or is not a string or list.</p>
<div class="section" id="id13">
<h5>Callback</h5>
<p>When the broker has acknowledged the unsubscribe, an <tt class="docutils literal">on_unsubscribe()</tt> callback will be generated.</p>
</div>
</div>
</div>
<div class="section" id="callbacks">
<h3>Callbacks</h3>
<div class="section" id="on-connect">
<h4>on_connect()</h4>
<pre class="literal-block">
on_connect(client, userdata, rc)
</pre>
<p>Called when the broker responds to our connection request.</p>
<dl class="docutils">
<dt>client</dt>
<dd>the client instance for this callback</dd>
<dt>userdata</dt>
<dd>the private user data as set in <tt class="docutils literal">Client()</tt> or <tt class="docutils literal">userdata_set()</tt></dd>
<dt>rc</dt>
<dd>the connection result</dd>
</dl>
<p>The value of rc indicates success or not:</p>
<blockquote>
0: Connection successful
1: Connection refused - incorrect protocol version
2: Connection refused - invalid client identifier
3: Connection refused - server unavailable
4: Connection refused - bad username or password
5: Connection refused - not authorised
6-255: Currently unused.</blockquote>
<div class="section" id="id14">
<h5>Example</h5>
<pre class="literal-block">
def on_connect(client, userdata, rc):
    print(&quot;Connection returned result: &quot;+connack_string(rc))

mqttc.on_connect = on_connect
...
</pre>
</div>
</div>
<div class="section" id="on-disconnect">
<h4>on_disconnect()</h4>
<pre class="literal-block">
on_disconnect(client, userdata, rc)
</pre>
<p>Called when the client disconnects from the broker.</p>
<dl class="docutils">
<dt>client</dt>
<dd>the client instance for this callback</dd>
<dt>userdata</dt>
<dd>the private user data as set in <tt class="docutils literal">Client()</tt> or <tt class="docutils literal">userdata_set()</tt></dd>
<dt>rc</dt>
<dd>the disconnection result</dd>
</dl>
<p>The rc parameter indicates the disconnection state. If <tt class="docutils literal">MQTT_ERR_SUCCESS</tt> (0), the callback was called in response to a <tt class="docutils literal">disconnect()</tt> call. If any other value the disconnection was unexpected, such as might be caused by a network error.</p>
<div class="section" id="id15">
<h5>Example</h5>
<pre class="literal-block">
def on_disconnect(client, userdata, rc):
    if rc != 0:
        print(&quot;Unexpected disconnection.&quot;)

mqttc.on_disconnect = on_disconnect
...
</pre>
</div>
</div>
<div class="section" id="on-message">
<h4>on_message()</h4>
<pre class="literal-block">
on_message(client, userdata, message)
</pre>
<p>Called when a message has been received on a topic that the client subscribes to.</p>
<dl class="docutils">
<dt>client</dt>
<dd>the client instance for this callback</dd>
<dt>userdata</dt>
<dd>the private user data as set in <tt class="docutils literal">Client()</tt> or <tt class="docutils literal">userdata_set()</tt></dd>
<dt>message</dt>
<dd>an instance of MQTTMessage. This is a class with members <tt class="docutils literal">topic</tt>, <tt class="docutils literal">payload</tt>, <tt class="docutils literal">qos</tt>, <tt class="docutils literal">retain</tt>.</dd>
</dl>
<div class="section" id="id16">
<h5>Example</h5>
<pre class="literal-block">
def on_message(client, userdata, message):
    print(&quot;Received message '&quot; + str(message.payload) + &quot;' on topic '&quot;
        + message.topic + &quot;' with QoS &quot; + str(message.qos))

mqttc.on_message = on_message
...
</pre>
</div>
</div>
<div class="section" id="on-publish">
<h4>on_publish()</h4>
<pre class="literal-block">
on_publish(client, userdata, mid)
</pre>
<p>Called when a message that was to be sent using the <tt class="docutils literal">publish()</tt> call has completed transmission to the broker. For messages with QoS levels 1 and 2, this means that the appropriate handshakes have completed. For QoS 0, this simply means that the message has left the client. The <tt class="docutils literal">mid</tt> variable matches the mid variable returned from the corresponding <tt class="docutils literal">publish()</tt> call, to allow outgoing messages to be tracked.</p>
<p>This callback is important because even if the publish() call returns success, it does not always mean that the message has been sent.</p>
</div>
<div class="section" id="on-subscribe">
<h4>on_subscribe()</h4>
<pre class="literal-block">
on_subscribe(client, userdata, mid, granted_qos)
</pre>
<p>Called when the broker responds to a subscribe request. The <tt class="docutils literal">mid</tt> variable matches the mid variable returned from the corresponding <tt class="docutils literal">subscribe()</tt> call. The <tt class="docutils literal">granted_qos</tt> variable is a list of integers that give the QoS level the broker has granted for each of the different subscription requests.</p>
</div>
<div class="section" id="on-unsubscribe">
<h4>on_unsubscribe()</h4>
<pre class="literal-block">
on_unsubscribe(client, userdata, mid)
</pre>
<p>Called when the broker responds to an unsubscribe request. The <tt class="docutils literal">mid</tt> variable matches the mid variable returned from the corresponding <tt class="docutils literal">unsubscribe()</tt> call.</p>
</div>
<div class="section" id="on-log">
<h4>on_log()</h4>
<pre class="literal-block">
on_log(client, userdata, level, buf)
</pre>
<p>Called when the client has log information. Define to allow debugging. The <tt class="docutils literal">level</tt> variable gives the severity of the message and will be one of <tt class="docutils literal">MQTT_LOG_INFO</tt>, <tt class="docutils literal">MQTT_LOG_NOTICE</tt>, <tt class="docutils literal">MQTT_LOG_WARNING</tt>, <tt class="docutils literal">MQTT_LOG_ERR</tt>, and <tt class="docutils literal">MQTT_LOG_DEBUG</tt>. The message itself is in <tt class="docutils literal">buf</tt>.</p>
</div>
</div>
<div class="section" id="external-event-loop-support">
<h3>External event loop support</h3>
<div class="section" id="loop-read">
<h4>loop_read()</h4>
<pre class="literal-block">
loop_read(max_packets=1)
</pre>
<p>Call when the socket is ready for reading. <tt class="docutils literal">max_packets</tt> is obsolete and should be left unset.</p>
</div>
<div class="section" id="loop-write">
<h4>loop_write()</h4>
<pre class="literal-block">
loop_write(max_packets=1)
</pre>
<p>Call when the socket is ready for writing. <tt class="docutils literal">max_packets</tt> is obsolete and should be left unset.</p>
</div>
<div class="section" id="loop-misc">
<h4>loop_misc()</h4>
<pre class="literal-block">
loop_misc()
</pre>
<p>Call every few seconds to handle message retrying and pings.</p>
</div>
<div class="section" id="socket">
<h4>socket()</h4>
<pre class="literal-block">
socket()
</pre>
<p>Returns the socket object in use in the client to allow interfacing with other event loops.</p>
</div>
<div class="section" id="want-write">
<h4>want_write()</h4>
<pre class="literal-block">
want_write()
</pre>
<p>Returns true if there is data waiting to be written, to allow interfacing the client with other event loops.</p>
</div>
</div>
<div class="section" id="global-helper-functions">
<h3>Global helper functions</h3>
<p>The client module also offers some global helper functions.</p>
<p><tt class="docutils literal">topic_matches_sub(sub, topic)</tt> can be used to check whether a <tt class="docutils literal">topic</tt> matches a <tt class="docutils literal">subscription</tt>.</p>
<p>For example:</p>
<blockquote>
<p>the topic <tt class="docutils literal">foo/bar</tt> would match the subscription <tt class="docutils literal">foo/#</tt> or <tt class="docutils literal">+/bar</tt></p>
<p>the topic <tt class="docutils literal">non/matching</tt> would not match the subscription <tt class="docutils literal"><span class="pre">non/+/+</span></tt></p>
</blockquote>
<p><tt class="docutils literal">connack_string(connack_code)</tt> returns the error string associated with a CONNACK result.</p>
<p><tt class="docutils literal">error_string(mqtt_errno)</tt> returns the error string associated with a Paho MQTT error number.</p>
</div>
</div>
<div class="section" id="id17">
<h2>Publish</h2>
<p>This module provides some helper functions to allow straightforward publishing of messages in a one-shot manner. In other words, they are useful for the situation where you have a single/multiple messages you want to publish to a broker, then disconnect with nothing else required.</p>
<p>The two functions provided are <tt class="docutils literal">single()</tt> and <tt class="docutils literal">multiple()</tt>.</p>
<div class="section" id="single">
<h3>Single</h3>
<p>Publish a single message to a broker, then disconnect cleanly.</p>
<pre class="literal-block">
single(topic, payload=None, qos=0, retain=False, hostname=&quot;localhost&quot;,
    port=1883, client_id=&quot;&quot;, keepalive=60, will=None, auth=None, tls=None,
    protocol=mqtt.MQTTv31)
</pre>
<div class="section" id="function-arguments">
<h4>Function arguments</h4>
<dl class="docutils">
<dt>topic</dt>
<dd>the only required argument must be the topic string to which the payload will be published.</dd>
<dt>payload</dt>
<dd>the payload to be published. If &quot;&quot; or None, a zero length payload will be published.</dd>
<dt>qos</dt>
<dd>the qos to use when publishing,  default to 0.</dd>
<dt>retain</dt>
<dd>set the message to be retained (True) or not (False).</dd>
<dt>hostname</dt>
<dd>a string containing the address of the broker to connect to. Defaults to localhost.</dd>
<dt>port</dt>
<dd>the port to connect to the broker on. Defaults to 1883.</dd>
<dt>client_id</dt>
<dd>the MQTT client id to use. If &quot;&quot; or None, the Paho library will                 generate a client id automatically.</dd>
<dt>keepalive</dt>
<dd>the keepalive timeout value for the client. Defaults to 60 seconds.</dd>
<dt>will</dt>
<dd><p class="first">a dict containing will parameters for the client:</p>
<p>will = {'topic': &quot;&lt;topic&gt;&quot;, 'payload':&quot;&lt;payload&quot;&gt;, 'qos':&lt;qos&gt;, 'retain':&lt;retain&gt;}.</p>
<p>Topic is required, all other parameters are optional and will default to None, 0 and False respectively.</p>
<p class="last">Defaults to None, which indicates no will should be used.</p>
</dd>
<dt>auth</dt>
<dd><p class="first">a dict containing authentication parameters for the client:</p>
<p>auth = {'username':&quot;&lt;username&gt;&quot;, 'password':&quot;&lt;password&gt;&quot;}</p>
<p>Username is required, password is optional and will default to None if not provided.</p>
<p class="last">Defaults to None, which indicates no authentication is to be used.</p>
</dd>
<dt>tls</dt>
<dd><p class="first">a dict containing TLS configuration parameters for the client:</p>
<p>dict = {'ca_certs':&quot;&lt;ca_certs&gt;&quot;, 'certfile':&quot;&lt;certfile&gt;&quot;, 'keyfile':&quot;&lt;keyfile&gt;&quot;, 'tls_version':&quot;&lt;tls_version&gt;&quot;, 'ciphers':&quot;&lt;ciphers&quot;&gt;}</p>
<p>ca_certs is required, all other parameters are optional and will default to None if not provided, which results in the client using the default behaviour - see the paho.mqtt.client documentation.</p>
<p class="last">Defaults to None, which indicates that TLS should not be used.</p>
</dd>
<dt>protocol</dt>
<dd>choose the version of the MQTT protocol to use. Use either <tt class="docutils literal">MQTTv31</tt> or <tt class="docutils literal">MQTTv311</tt>.</dd>
</dl>
</div>
<div class="section" id="id18">
<h4>Example</h4>
<pre class="literal-block">
import paho.mqtt.publish as publish

publish.single(&quot;paho/test/single&quot;, &quot;payload&quot;, hostname=&quot;iot.eclipse.org&quot;)
</pre>
</div>
</div>
<div class="section" id="multiple">
<h3>Multiple</h3>
<p>Publish multiple messages to a broker, then disconnect cleanly.</p>
<pre class="literal-block">
multiple(msgs, hostname=&quot;localhost&quot;, port=1883, client_id=&quot;&quot;, keepalive=60,
    will=None, auth=None, tls=None, protocol=mqtt.MQTTv31)
</pre>
<div class="section" id="id19">
<h4>Function arguments</h4>
<dl class="docutils">
<dt>msgs</dt>
<dd><p class="first">a list of messages to publish. Each message is either a dict or a tuple.</p>
<p>If a dict, only the topic must be present. Default values will be
used for any missing arguments. The dict must be of the form:</p>
<p>msg = {'topic':&quot;&lt;topic&gt;&quot;, 'payload':&quot;&lt;payload&gt;&quot;, 'qos':&lt;qos&gt;, 'retain':&lt;retain&gt;}</p>
<p>topic must be present and may not be empty.
If payload is &quot;&quot;, None or not present then a zero length payload will be published. If qos is not present, the default of 0 is used. If retain is not present, the default of False is used.</p>
<p>If a tuple, then it must be of the form:</p>
<p class="last">(&quot;&lt;topic&gt;&quot;, &quot;&lt;payload&gt;&quot;, qos, retain)</p>
</dd>
</dl>
<p>See <tt class="docutils literal">single()</tt> for the description of <tt class="docutils literal">hostname</tt>, <tt class="docutils literal">port</tt>, <tt class="docutils literal">client_id</tt>, <tt class="docutils literal">keepalive</tt>, <tt class="docutils literal">will</tt>, <tt class="docutils literal">auth</tt>, <tt class="docutils literal">tls</tt>, <tt class="docutils literal">protocol</tt>.</p>
</div>
<div class="section" id="id20">
<h4>Example</h4>
<pre class="literal-block">
import paho.mqtt.publish as publish

msgs = [{'topic':&quot;paho/test/multiple&quot;, 'payload':&quot;multiple 1&quot;},
    (&quot;paho/test/multiple&quot;, &quot;multiple 2&quot;, 0, False)]
publish.multiple(msgs, hostname=&quot;iot.eclipse.org&quot;)
</pre>
</div>
</div>
</div>
</div>
</div>


<?php include '../../../_includes/footer.php' ?>

