<!DOCTYPE html> 
<html> 
	<head profile="http://dublincore.org/documents/dcq-html/">
	
		<title>jQuery mobile with Google maps basic example</title>
		<meta name="keywords" content="Google maps, jQuery, plugin, mobile, iphone, ipad, android, HTML5" />
		<meta name="description" content="Basic example with jQuery mobile, Google maps and HTML5" />
		<meta http-equiv="content-language" content="en"/>
		
		<link rel="schema.DC" href="http://purl.org/dc/elements/1.1/" />
		<meta name="DC.title" content="jQuery mobile with Google maps basic example" />
		<meta name="DC.subject" content="Google maps;jQuery;plugin;mobile;iphone;ipad;android;HTML5" />
		<meta name="DC.description" content="Basic example with jQuery mobile, Google maps and HTML5" />
		<meta name="DC.creator" content="Johan S&auml;ll Larsson" />
		<meta name="DC.language" content="en"/>
		
		<link rel="stylesheet" href="http://code.jquery.com/mobile/latest/jquery.mobile.min.css" />
		<style rel="stylesheet">
			body {  background: #ddd; }
			.ui-body-c a.ui-link { color: #008595; font-weight: bold; text-decoration: none; }
			.hidden { display:none; }
			h2 { font-size: 16px; overflow: hidden; white-space: nowrap; display: block; }
			.more { text-align: center; }
		</style>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.6.1.min.js"></script>	
		<script type="text/javascript">
			// Demonstration purpose only...
			$(document).bind("mobileinit", function () {
				$.mobile.ajaxEnabled  = true;
			});
		</script>
		<script type="text/javascript" src="http://code.jquery.com/mobile/latest/jquery.mobile.min.js"></script>
		<script type="text/javascript" src="ui/jquery.ui.map.js"></script>
		<script type="text/javascript" src="ui/jquery.ui.map.services.js"></script>
		<script type="text/javascript" src="ui/jquery.ui.map.extensions.js"></script>
	</head> 

	<body> 

		<div id="gmap-2" data-role="page">

			<div data-role="header">
				<h1><a data-ajax="false" href="/">jQuery mobile with Google maps</a> basics</h1>
			</div>

			<script type="text/javascript">
				$('#gmap-2').live("pageshow", function() {
					$('#map_canvas').gmap({'center': '59.3426606750, 18.0736160278' }).bind('init', function(evt, map) {
						$('#map_canvas').gmap('addMarker', {'position': map.getCenter(), 'animation': google.maps.Animation.DROP }).click(function() { 
							$('#map_canvas').gmap('openInfoWindow', { 'content': 'Hello world!'}, this);
						});
					});
				});
			</script>
			
			<div data-role="content"> 
                
				<div class="ui-bar-c ui-corner-all ui-shadow" style="padding:1em;">
					<div id="map_canvas" style="height:300px;"></div>
				</div>
				
				<h2>More Google maps and jQuery examples</h2>
				<ul data-role="listview" data-inset="true" data-theme="c" data-dividertheme="a"> 
					<li data-role="list-divider">More examples</li> 
					<li><a data-ajax="false" href="advanced-example.html">Microformats, Google streetview and jQuery dialog example</a></li>
					<li><a data-ajax="false" href="other-examples.html">Click and drag events with Google geo search example</a></li>
					<li><a data-ajax="false" href="load JSON example.html">Import markers with JSON example</a></li>
					<li><a data-ajax="false" href="load Microformat example.html">Import markers with microformats example</a></li>
					<li><a data-ajax="false" href="load RDFa example.html">Import markers with RDFa example</a></li>
					<li><a data-ajax="false" href="load Microdata example.html">Import markers with microdata example</a></li>
					<li><a data-ajax="false" href="load Fusion.html">Import markers with Google Fusion tables</a></li>
					<li><a data-ajax="false" href="multiple maps example.html">Multiple maps on a single page example</a></li>
					<li><a data-ajax="false" href="basic-example.html">Google maps and jQuery example</a></li>
					<li><a data-ajax="false" href="google-maps-jquery-filtering.html">Filter markers example</a></li>
				</ul>

			</div>
			
			<div data-role="footer" data-theme="a">
				<h3>Need help?</h3>
				<p class="more">Please feel free to ask for help in the <a data-ajax="false" href="http://groups.google.com/group/jquery-ui-map-discuss">forum</a></p>
			</div>

			<div id="ft" class="hidden" itemscope itemtype="http://data-vocabulary.org/Person">
				Author: 
				<span itemprop="name">Johan S&auml;ll Larsson</span>  
				<span itemprop="address" itemscope itemtype="http://data-vocabulary.org/Address">
					<span itemprop="locality">G&ouml;teborg</span>, 
					<span itemprop="country-name">Sweden</span> 
				</span>
			</div>
			
		</div>
		<script type="text/javascript">
			var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
			document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
			try {
				var pageTracker = _gat._getTracker("UA-17614686-3");
				pageTracker._trackPageview();
			} catch(err) {}
		</script>
	</body>
	
</html>