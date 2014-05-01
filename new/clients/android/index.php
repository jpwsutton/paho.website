<?php include '../../_includes/header.php' ?>

<h1>Android Service</h1>
<p>The Paho Android Service is an interface to the Paho Java MQTT client library that provides a long running service for handling sending and receiving messages on behalf of Android client applications when the applications main Activity may not be running.</p>

<p>The Paho Android Service provides an asynchronous API</p>

<h2 id="source">Source</h2>
<p><a href="http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.java.git/">http://git.eclipse.org/c/paho/org.eclipse.paho.mqtt.java.git/</a></p>

<h2 id="building-from-source">Building from source</h2>
<p>The Paho Android Service is contained within the Paho Java client repository which can be cloned from git with the following command
<code>git clone http://git.eclipse.org/gitroot/paho/org.eclipse.paho.mqtt.javascript.git</code><p>
<p>The source code for the Paho Android Service can be found in the directory <code>org.eclipse.paho.android.service/org.eclipse.paho.android.service</code> relative to the directory the git repository was cloned into in the previous step.</p>
<p>There are two other directories in <code>org.eclipse.paho.android.service</code>, <code>org.eclipse.paho.android.service.sample</code> which contains the source code to a sample application, and <code>org.eclipse.paho.android.service.test</code> which contains tests for the Android Service</p>
<p>All three directories are also setup as eclipse projects that can be imported into an eclipse instance that has the <a href="http://developer.android.com/sdk/index.html">Android Development Tools</a> installed.
<p>When building the Paho Android Service from source you should ensure that an appropriate version of the Paho Java client library jar file has been copied into <code>org.eclipse.paho.android.service/org.eclipse.paho.android.service/libs</code>

<h2 id="download">Download</h2>
<p>The Paho Android Service jar can be downloaded from:<a href="">here</a><p>
<p>When developing Android applications you will require both the Paho Android Service jar and the Paho Java Client library jar.</p>

<h2 id="documentation">Documentation</h2>
<p>Reference documentation is online at: <a href="http://www.eclipse.org/paho/files/android-javadoc/index.html">http://www.eclipse.org/paho/files/android-javadoc/index.html</a>

<h3 id="getting-started">Getting Started</h3>
<p>A sample application in source code form is included in the <code>org.eclipse.paho.android.service.sample</code> directory.</p>

<?php include '../../_includes/footer.php' ?>t