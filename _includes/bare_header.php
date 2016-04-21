<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            Paho - Open Source messaging for M2M
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Eclipse Paho is a set of scalable open-source implementations of open and standard messaging protocols aimed at new, existing, and emerging applications for Machine-to-Machine (M2M) and Internet of Things (IoT)">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
        <!-- Custom Fonts --><!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="/paho/images/favicon.png">
        <link href="/paho/css/bootstrap.min.css" rel="stylesheet" type='text/css'>
        <link href="/paho/css/style.css" rel="stylesheet" type='text/css'><!-- HTML5 shim, for IE6-8 support of HTML elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->
        <!-- Custom Fonts -->
        <link href='//fonts.googleapis.com/css?family=Lato:300,400' rel='stylesheet' type='text/css'>
        <link href='//fonts.googleapis.com/css?family=Lekton:400,700' rel='stylesheet' type='text/css'><!-- Styles -->
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">


    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-40177335-1', 'eclipse.org');
      ga('send', 'pageview');
    </script>

    </head>
    <body>
        <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand brand" href="/paho/"><img src='/paho/images/paho-small-logo.png'/></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Components <b class="caret"></b></a>
                              <ul class="dropdown-menu" role="menu">
                                  <li class="dropdown-header">MQTT</li>
                                  <li class="dropdown-submenu"><a href="#">C/C++</a>
                                      <ul class="dropdown-menu">
                                          <li><a href="/paho/clients/c/">C for Posix and Windows</a></li>
                                          <li><a href="/paho/clients/cpp/">C++</a></li>
                                          <li><a href="/paho/clients/c/embedded/">Embedded C/C++</a></li>
                                      </ul>
                                  </li>
                                  <li class="dropdown-submenu"><a href="#">Java</a>
                                      <ul class="dropdown-menu">
                                          <li><a href="/paho/clients/java/">J2SE</a></li>
                                          <!-- <li><a href="/paho/clients/java/">J2ME</a></li> -->
                                          <li><a href="/paho/clients/android/">Android Service</a></li>
                                      </ul>
                                  </li>
                                  <li><a href="/paho/clients/js/">JavaScript</a></li>
                                  <li><a href="/paho/clients/python/">Python</a></li>
                                  <li><a href="/paho/clients/golang/">Go</a></li>
                                  <li><a href="/paho/clients/dotnet/">C# .Net and WinRT</a></li>
                                  <!-- <li><a href="/paho/clients/lua/">Lua</a></li> -->
                                  <li class="divider"></li>
                                  <li class="dropdown-header">MQTT-SN</li>
                                  <li class="dropdown-submenu"><a href="#">C/C++</a>
                                      <ul class="dropdown-menu">
                                          <li><a href="/paho/clients/c/embedded-sn/">C (Embedded)</a></li>
                                      </ul>
                                  </li>
                                  <li class="divider"></li>
                                  <li class="dropdown-header">Utilities</li>
                                  <li><a href="/paho/clients/tool/">Client Tools</a></li>
                                  <li><a href="/paho/clients/android/sample">Android Sample</a></li>
                                  <!-- <li><a href="/paho/utilities/client-view/">MQTT Eclipse Client View (IDE plugin)</a></li> -->
                                  <!-- <li><a href="/paho/utilities/client-utility/">MQTT Client Utility (java)</a></li> -->
                                  <li><a href="/paho/clients/testing/">Interop Tests</a></li>
                              </ul>
                          </li>
                          <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Documentation <b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li><a href="/paho/#getting-started">Getting Started</a></li>
                                <li><a href="/paho/#contributing">Contributing</a></li>
                                <li><a href="/paho/#mqtt">About MQTT</a></li>
                                <li><a href="/paho/#articles">Featured Articles</a></li>
                                <li><a href="http://wiki.eclipse.org/Paho">Project Wiki</a></li>
                                <li><a href="/paho/branding">Branding</a></li>
                                <li><a href="https://projects.eclipse.org/projects/iot.paho">Project Details & Plans</a></li>
                                <li><a href="https://www.eclipse.org/proposals/technology.paho/">Paho Proposal</a></li>
                              </ul>
                          </li>
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Community <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                              <li><a href="https://projects.eclipse.org/projects/technology.paho/who">Development Team</a></li>
                              <li><a href="https://twitter.com/eclipsepaho">Twitter</a></li>
                              <li><a href="/paho/whoisusing/">Stories</a></li>
                              <li><a href="https://dev.eclipse.org/mailman/listinfo/paho-dev">Mailing List</a></li>
                              <li><a href="https://bugs.eclipse.org/bugs/describecomponents.cgi?product=Paho">Bug Tracker</a></li>
                            </ul>
                          </li>
                           <li><a href="/paho/snippets/snippets.php">Examples</a></li>
                        </ul>
                          <ul class="nav pull-right">
                              <li class="headerText"><span>Paho is an <a style="display: inline-block; padding-left: 0px; padding-right: 0px;" href="http://iot.eclipse.org">iot.eclipse.org</a> project</span>
                              </li>
                              <li style="line-height: 55px">
                                  <div class="googleplus">
                                      <div class="g-plusone" data-href="http://www.eclipse.org/paho"></div>
                                  </div>
                              </li>
                          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
