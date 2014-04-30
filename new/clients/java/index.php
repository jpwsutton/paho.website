<?php include '../../_includes/header.php' ?>

<h1>Java Client</h1>
<p>The Paho Java Client is an MQTT client library written in Java for developing applications that run on the JVM or other Java compatible platforms such as Android</p>

<p>The Paho Java Client provides two APIs: MqttAsyncClient provides a fully asychronous API where completion of activities is notified via registered callbacks. MqttClient is a synchronous wrapper around MqttAsyncClient where functions appear synchronous to the application.</p>

<h2 id="source">Source</h2>
<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.java.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.java.git/</a></p>

<h2 id="building-from-source">Building from source</h2>
<p>There are two active branches on the Paho Java git repository, "master" which is used to produce stable releases, and "develop" where active development is carried out. By default cloning the git repository will download the "master" branch, to download "develop" add <code>-b develop</code> to the end of the <code>git clone</code> line below</p>
<pre><code>git clone http://git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.javascript.git
cd org.eclipse.paho.mqtt.javascript.git
mvn package -DskipTests
</code></pre>
<p>This will build the client library without running the tests, the jars for the library, source and javadoc can be found in <code>org.eclipse.paho.client.mqttv3/target</code>

<h2 id="download">Download</h2>
<p>Eclipse hosts a Nexus for those who want to use Maven to manage their dependencies. The two sections below can be added to your pom.xml to configure it to look on the eclipse Nexus and download the Paho Java library. Replace %REPOURL% with either https://repo.eclipse.org/content/repositories/paho-releases/ for the official releases, or https://repo.eclipse.org/content/repositories/paho-snapshots/ for the nightly snapshots. Replace %VERSION% with the level required</p>
<pre>
<code>
<project ...>
<repositories>
    <repository>
        <id>Eclipse Paho Repo</id>
        <url>%REPOURL%</url>
    </repository>
</repositories>
...
<dependencies>
    <dependency>
        <groupId>org.eclipse.paho</groupId>
        <artifactId>mqtt-client</artifactId>
        <version>%VERSION%</version>
    </dependency>
</dependencies>
</project>
</code>
</pre>

<p>Alternatively the Paho Java library jars can be downloaded directly from the previous URLs</p>

<h2 id="documentation">Documentation</h2>
<p>Reference documentation is online at: <a href="http://www.eclipse.org/paho/files/javadoc/index.html">http://www.eclipse.org/paho/files/javadoc/index.html</a>

<h3 id="getting-started">Getting Started</h3>
<p>The included code below is a very basic sample

<pre>
import org.eclipse.paho.client.mqttv3.MqttClient;
import org.eclipse.paho.client.mqttv3.MqttConnectOptions;
import org.eclipse.paho.client.mqttv3.MqttException;
import org.eclipse.paho.client.mqttv3.MqttMessage;
import org.eclipse.paho.client.mqttv3.persist.MemoryPersistence;

public class MqttPublishSample {

    public static void main(String[] args) {

        String topic        = "MQTT Examples";
        String content      = "Message from MqttPublishSample";
        int qos             = 2;
        String broker       = "tcp://iot.eclipse.org:1883";
        String clientId     = "JavaSample";
        MemoryPersistence persistence = new MemoryPersistence();

        try {
            MqttClient sampleClient = new MqttClient(broker, clientId, persistence);
            MqttConnectOptions connOpts = new MqttConnectOptions();
            connOpts.setCleanSession(true);
            System.out.println("Connecting to broker: "+broker);
            sampleClient.connect(connOpts);
            System.out.println("Connected");
            System.out.println("Publishing message: "+content);
            MqttMessage message = new MqttMessage(content.getBytes());
            message.setQos(qos);
            sampleClient.publish(topic, message);
            System.out.println("Message published");
            sampleClient.disconnect();
            System.out.println("Disconnected");
            System.exit(0);
        } catch(MqttException me) {
            System.out.println("reason "+me.getReasonCode());
            System.out.println("msg "+me.getMessage());
            System.out.println("loc "+me.getLocalizedMessage());
            System.out.println("cause "+me.getCause());
            System.out.println("excep "+me);
            me.printStackTrace();
        }
    }
}
</pre>

<?php include '../../_includes/footer.php' ?>t