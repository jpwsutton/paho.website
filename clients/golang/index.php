<?php include '../../_includes/header.php' ?>

<h1>Go Client</h1>
<p>The Paho Go Client provides an MQTT client library for connection to MQTT brokers via TCP, TLS or WebSockets</p>

<h2 id="source">Source</h2>
<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.golang.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.golang.git/</a></p>

<h2 id="download">Download</h2>

<p>Once you have installed Go and <a href="http://golang.org/doc/code.html">configured</a> your environment you can install the Paho Go client by running;</p>
<pre><code>go get git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.golang.git</code></pre>

<!-- <h2 id="build-from-source">Building from source</h2>
<p></p> -->

<h2 id="documentation">Documentation</h2>
<p>API documentation for the Paho Go client is available at <a href="https://godoc.org/git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.golang.git"https://godoc.org/git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.golang.git></a>
Alternatively, once you have downloaded the src via <code>go get</code> you can run <code>godoc -http=":6060"</code> and navigate to http://localhost:6060 to browse the documentation locally</p>

<h3 id="getting-started">Getting Started</h3>
<p>The client can connect to a broker using TCP, TLS or a WebSocket connection. Ensure the broker you're using supports the connection type you wish to use.</p>
<p>The type of connection required is specified by the scheme of the connection URL set in the ClientOptions struct, for example:
<ul>
<li><code>tcp://iot.eclipse.org:1883</code> - connect to iot.eclipse.org on port 1883 using plain TCP</li>
<li><code>ws://iot.eclipse.org:1883</code> - connect to iot.eclipse.org on port 1883 using WebSockets</li>
<li><code>tls://iot.eclipse.org:8883</code> - connect to iot.eclipse.org on port 8883 using TLS (ssl:// and tcps:// are synonyms for tls://)</li>
</ul>


<p>Here is a very simple example that subscribes to a topic and publishes 5 messages:<p>
<pre>
package main

import (
  "fmt"
  //import the Paho Go MQTT library
  MQTT "git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.golang.git"
  "os"
  "time"
)

//define a function for the default message handler
var f MQTT.MessageHandler = func(client *MQTT.Client, msg MQTT.Message) {
  fmt.Printf("TOPIC: %s\n", msg.Topic())
  fmt.Printf("MSG: %s\n", msg.Payload())
}

func main() {
  //create a ClientOptions struct setting the broker address, clientid, turn
  //off trace output and set the default message handler
  opts := MQTT.NewClientOptions().AddBroker("tcp://iot.eclipse.org:1883")
  opts.SetClientID("go-simple")
  opts.SetDefaultPublishHandler(f)

  //create and start a client using the above ClientOptions
  c := MQTT.NewClient(opts)
  if token := c.Connect(); token.Wait() && token.Error() != nil {
    panic(token.Error())
  }

  //subscribe to the topic /go-mqtt/sample and request messages to be delivered
  //at a maximum qos of zero, wait for the receipt to confirm the subscription
  if token := c.Subscribe("go-mqtt/sample", 0, nil); token.Wait() && token.Error() != nil {
    fmt.Println(token.Error())
    os.Exit(1)
  }

  //Publish 5 messages to /go-mqtt/sample at qos 1 and wait for the receipt
  //from the server after sending each message
  for i := 0; i < 5; i++ {
    text := fmt.Sprintf("this is msg #%d!", i)
    token := c.Publish("go-mqtt/sample", 0, false, text)
    token.Wait()
  }

  time.Sleep(3 * time.Second)

  //unsubscribe from /go-mqtt/sample
  if token := c.Unsubscribe("go-mqtt/sample"); token.Wait() && token.Error() != nil {
    fmt.Println(token.Error())
    os.Exit(1)
  }

  c.Disconnect(250)
}

</pre>
<?php include '../../_includes/footer.php' ?>

