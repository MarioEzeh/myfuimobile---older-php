<?php ob_start();
	extract($_REQUEST);?>
<!doctype html>
<html lang="en">
   <head>
		<title>Fittings Unlimited, Inc</title>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta http-equiv="content-language" content="en" />
		<meta name="viewport" content="width=device-width,initial-scale=1" />
		<meta name="keywords" content="Google maps, jQuery, plugin" />

		<link type="text/css" rel="stylesheet" href="css/960/min/960.css" />
		<link type="text/css" rel="stylesheet" href="css/960/min/960_16_col.css" />
		<link type="text/css" rel="stylesheet" href="css/normalize/min/normalize.css" />
		<link type="text/css" rel="stylesheet" href="css/prettify/min/prettify.css" />
		<link type="text/css" rel="stylesheet" href="css/style.css" />
		<script type="text/javascript" src="js/modernizr-2.0.6/modernizr.min.js"></script>
			<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script> 
    </head>
    <body>
<div data-role="page" class="type-index">	
	
	
	<div data-role="header" data-theme="b" data-position="fixed">
	
	<!--<a href="index.php" data-icon="home" data-direction="reverse" class="ui-btn-left jqm-home">Home</a>-->
		<<a href="javascript:history.go(-1);" data-icon="back" data-theme="b" style="margin-left: auto; margin-right: auto;">Back</a>

	</div>
	
	<div data-role="content">
	
		<div class="container_16">
			<article class="grid_16">
				<div class="item rounded dark">
					<div id="map_canvas" class="map rounded"></div>
				</div>
				
			</article>
		</div>
		
		
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> 
		<script type="text/javascript" src="js/jquery-1.7.1/jquery.min.js"></script>
		<script type="text/javascript" src="js/underscore-1.2.2/underscore.min.js"></script>
		<script type="text/javascript" src="js/backbone-0.5.3/backbone.min.js"></script>
		<script type="text/javascript" src="js/prettify/prettify.min.js"></script>
		<script type="text/javascript" src="js/demo.js"></script>
		<script type="text/javascript" src="js/jquery.ui.map.js"></script>
		<script type="text/javascript">
            $(function() { 
				demo.add(function() {
					$('#map_canvas').gmap({'center': '<?php echo $lat; ?>,<?php echo $long;?>', 'zoom': 12, 'disableDefaultUI':true, 'callback': function() {
						var self = this;
						self.addMarker({'position': this.get('map').getCenter() }).click(function() {
							self.openInfoWindow({ 'content': '<?php echo $address; ?>' }, this);
						});	
					}});
				}).load();
			});
        </script>
    </div>


	
	<div data-role="footer" data-theme="b" data-position="fixed">
<center>
	<div class="bottom_links">
	<a href="index.php"><img alt="Home" src="images/home.png" border="0" style="width:100px !important;"></a>
    </div>
</center>
		<h1>&copy; Copyright  2012 Fittings Unlimited. All Rights Reserved.</h1>
	</div>


</div>

</body>
</html>