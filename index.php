<?php include '_includes/bare_header.php' ?>
    <!--  Intro  -->
        <div id="intro">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <img src="images/paho_logo_400.png" />
                        <p class="lead">
                            The <a href="http://eclipse.org">Eclipse</a> Paho project provides open-source client implementations of MQTT and MQTT-SN messaging protocols aimed at new, existing, and emerging applications for Machine&#8209;to&#8209;Machine (M2M) and Internet of Things (IoT).
                        </p>
                    </div>
                    <div class="span4">
                    <p></p>
<table class="table table-condensed">
<tr><th style="padding: 10px 0; font-size: 1.1em;">Latest release: <b>1.1</b></th><th style="padding: 10px 0; font-size: 1.1em;"><a href="https://projects.eclipse.org/projects/technology.paho/downloads">Downloads</a></th></tr>
<tr><td><a href="https://www.eclipse.org/paho/clients/c/">C client for Windows/Unix/Mac</a></td><td>1.0.3</td></tr>
<tr><td><a href="https://www.eclipse.org/paho/clients/java/">Java client and utilities</a></td><td>1.0.2</td></tr>
<tr><td><a href="https://www.eclipse.org/paho/clients/android/">Android service</a></td><td>1.0.2</td></tr>
<tr><td><a href="https://www.eclipse.org/paho/clients/python/">Python client</a></td><td>1.1</td></tr>
<tr><td><a href="https://www.eclipse.org/paho/clients/js/">JavaScript client</a></td><td>1.0.1</td></tr>
<tr><td><a href="https://www.eclipse.org/paho/clients/c/embedded/">C/C++ MQTT Embedded clients</a></td><td>1.0.0</td></tr>
<tr><td><a href="https://www.eclipse.org/paho/clients/dotnet/">.Net and WinRT client (M2Mqtt)</a></td><td>4.0.0.0</td></tr>
</table>
                    </div>
                    <div class="span4">
                    <a class="twitter-timeline" href="https://twitter.com/eclipsepaho" data-widget-id="700329712393048064" data-chrome="transparent">>Tweets by @eclipsepaho</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="features">
            <div class="container">
                <div class="row">
                    <div class="span4 feature-box">
                        <h2><i><img src="images/communication.png"></i></h2>
                        <div><h2>&nbsp;</h2></div>
                        <p class="lead">For Constrained Networks</p>
                        <p>M2M and IoT systems need to deal with frequent network disruption and intermittent, slow, or poor quality networks. Minimal data costs are crucial on networks with millions and billons of connected devices.</p>
                    </div>
                    <div class="span4 feature-box">
                        <h2><i><img src="images/chip.png"></i></h2>
                        <div><h2>&nbsp;</h2></div>
                        <p class="lead">Devices and Embedded Platforms</p>
                        <p>Devices and edge-of-network servers often have very limited processing resources available. Paho understands small footprint clients and corresponding server support.</p>
                    </div>
                    <div class="span4 feature-box">
                        <h2><i><img src="images/scale.png"></i></h2>
                        <div><h2>&nbsp;</h2></div>
                        <p class="lead">Reliable</p>
                        <p>Paho focuses on reliable implementations that will integrate with a wide range of middleware, programming and messaging models.</p>
                    </div>
                </div>
            </div>
        </div>
        
        
        <div id="mqtt">
            <div class="container">
                <div class="row">
                   <div class="offset1 span7">
                        <p class="lead">
                            MQTT is a light-weight publish/subscribe messaging protocol, originally created by IBM and Arcom (later to become part of Eurotech) around 1998. 
                            The <a href="http://docs.oasis-open.org/mqtt/mqtt/v3.1.1/os/mqtt-v3.1.1-os.html">MQTT 3.1.1 specification</a> has now been standardised by the <a href="https://www.oasis-open.org/committees/mqtt/charter.php">OASIS consortium</a>.  The standard is available in a variety of <a href="https://www.oasis-open.org/standards#mqttv3.1.1">formats</a>.
                        </p>
                        <p class="lead">
                            More information about the protocol can be found on the <a href="http://mqtt.org">MQTT.org community site</a>.
                        </p>
                        <p class="lead">
                            There is a publically accessible sandbox server for the Eclipse IoT projects available at <code>iot.eclipse.org</code>, port <code>1883</code>.
                         </p>
                        <!--
                        <p class="lead">
                            Some live statistics are available at <a href="https://xively.com/feeds/59871/">https://xively.com/feeds/59871/</a>. This server is running the Open Source <a href="http://mosquitto.org/">Mosquitto broker</a>.
                        </p>
                       -->
                    </div>
                    <div class="span3" style="padding-top: 100px;"><img src="images/mqttorg-glow.png" /></div>
                 </div>
            </div>
        </div>
        <div id="articles">
            <div class="container">
                <div class="row">
                    <div class="offset1 span4 article-box">
                        <p class="lead"><span class="quote lquote">&ldquo;</span>Under the Paho banner, open source client libraries for MQTT are being curated and developed; there are already MQTT C and Java libraries with Lua, Python, C++ and JavaScript at various stages of development. In this article we'll be showing how to use the Paho Java MQTT libraries to publish and subscribe.<span class="quote rquote">&rdquo;</span></p>
                        <p class="article-link"><a href="http://www.infoq.com/articles/practical-mqtt-with-paho">Practical MQTT with Paho &raquo;</a></p>
                    </div>
                    <div class="offset2 span4 article-box">
                        <p class="lead"><span class="quote lquote">&ldquo;</span>How would you connect the information from a temperature sensor on a BeagleBone Black to an LED display on a Raspberry Pi and would your solution scale up to many sensors and displays? In this article we’ll show how MQTT and the Eclipse Paho project can let you answer that challenge.<span class="quote rquote">&rdquo;</span></p>
                        <p class="article-link"><a href="http://www.eclipse.org/paho/articles/talkingsmall/">Talking Small: Using Eclipse Paho's MQTT on BeagleBone Black and Raspberry Pi &raquo;</a></p>
                    </div>
                </div>
            </div>
        </div>
        <div id="getting-started">
            <div id="downloads" class="container">
                <div class="row">
                    <div class="offset1 span8">
                        <h3>Getting Started</h3>
                        <p class="lead">
                            The Paho project consists of a number of clients and utilities for working with MQTT, 
                            each of which comes with its own getting started guide.
                        </p>
                        <p class="lead">
                            Follow the links below for the component you're interested in.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div id="clients">
            <div class="container">
                <div class="row clientblock">
                    <div class="offset2 span4">
                        <h3>MQTT Clients</h3>
                        <ul class="clientlist">
                            <li class="clientsublist">C/C++ Clients
                                <ul class="clientlist">
                                    <li><a href="clients/c/">C for Posix and Windows</a></li>
                                    <li><a href="clients/cpp/">C++ for Posix and Windows</a></li>
                                    <li><a href="clients/c/embedded">C/C++ for embedded systems</a></li>
                                </ul>
                            </li>
                            <li class="clientsublist">Java Clients
                                <ul class="clientlist">
                                    <li><a href="clients/java/">J2SE Client</a></li>
                                    <!-- <li><a href="clients/j2me/">J2ME Client</a></li> -->
                                    <li><a href="clients/android/">Android Service</a></li>
                                </ul>
                            </li>
                            <li><a href="clients/js/">JavaScript Client</a></li>
                            <li><a href="clients/python/">Python Client</a></li>
                            <li><a href="clients/golang/">Go Client</a></li>
							<li><a href="clients/dotnet/">C# .Net and WinRT Client</a></li>
                            <!-- <li><a href="clients/lua/">Lua Client</a></li> -->
                        </ul>
                    </div>
                    <div class="span4">
                        <h3>Utilities</h3>
                        <ul class="clientlist">
                            <!-- <li><a href="#">MQTT Eclipse Client View (IDE plugin)</a></li> -->
                            <!-- <li><a href="#">MQTT Client Utility (java)</a></li> -->
                            <li><a href="clients/testing">MQTT Conformance/Interoperability Testing</a></li>
                        </ul>
<br/><br/>
                        <h3>MQTT-SN Clients</h3>
                        <ul class="clientlist">
                            <li class="clientsublist">C/C++ Clients
                                <ul class="clientlist">
                                    <li><a href="clients/c/embedded-sn">C for embedded systems</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="contributing">
            <div class="container">
                <div class="row">
                    <div class="offset1 span8">
                        <h3>Contributing</h3>
                        <h4>Raising bugs</h4>
                        <p class="lead">
                            The Paho bug tracker is available <a href="https://bugs.eclipse.org/bugs/buglist.cgi?order=Bug%20Number&list_id=4625660&classification=Technology&query_format=advanced&bug_status=UNCONFIRMED&bug_status=NEW&bug_status=ASSIGNED&bug_status=REOPENED&product=Paho">here</a>.
                            There is a general <a href="https://wiki.eclipse.org/Bug_Reporting_FAQ">FAQ</a> to help you get started with bugzilla. Check each component for any specific guidance on raising bugs.
                        </p>
                        <h4>Asking questions</h4>
                        <p class="lead">
                            You can ask questions on the <a href="https://dev.eclipse.org/mailman/listinfo/paho-dev">mailing list</a>.
                        </p>
                        <h4>Contributing fixes</h4>
                        <p class="lead">
                            An overview of the contribution process is <a href="https://wiki.eclipse.org/Development_Resources/Contributing_via_Git">here</a>. The key points are:
                            <ol class="lead">
                                <li>Ensure you have signed the Eclipse Foundation Contributor License Agreement (CLA)</li>
                                <li>Fork the git repository of the component you want to contribute to</li>
                                <li>Fix the issue and add suitable tests</li>
                                <li>Ensure your contribution is collapsed into a single commit</li>
                                <li>Submit your contribution to the corresponding gerrit repository</li>
                            </ol>
                        </p>
                    </div>
                </div>
            </div>
        </div>
<?php include '_includes/bare_footer.php' ?>

