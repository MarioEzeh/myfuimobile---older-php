<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<title>Fittings Unlimited</title>   
	<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />
	<link rel="stylesheet"  href="css/jqm-docs.css" />
   <!-- <script src="http://www.unitconversion.org/converter3/converter3.js"></script>-->
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>
	
	<style type="text/css">
	.venue{width:180px; float:left; }
	.venue_link{width:50px;float:left; }
	</style>
</head>
<body>
<div data-role="page" class="type-index">
<div data-role="header" data-theme="b" data-position="fixed">
<h1>Fittings Unlimited, Inc.</h1>
<a href="index.php" data-icon="home" data-iconpos="notext" data-direction="reverse" class="ui-btn-left jqm-home" data-theme="b">Home</a>
<a href="javascript:history.go(-1);" data-icon="back" data-theme="b">Back</a>
</div>
<div data-role="content">
<div data-role="collapsible-set" data-theme="b" data-content-theme="d">
<div data-role="collapsible" data-collapsed="true">
<h3>Length</h3>
<form style="padding:0;margin:0" name="cat=Length">
<div style="width:100%">
<div style="float:left; width:47%">From Quantity:<br /> <input style="width:100%;" name="bindid=left;base=1" type="text" /> <select name="left" size="1" style="width:100%;font-size:100%"><option value="inch (US survey)">inch (US survey) [in]</option><option value="foot (US survey)">foot (US survey) [ft]</option><option value="centimeter">centimeter [cm]</option><option value="meter">meter [m]</option><option value="mile">mile [mi, mi(Int)]</option><option value="millimeter">millimeter [mm]</option></select></div>
<div style="float:left; width:47%; padding-left:20px;">To Quantity:<br /> <input style="width:100%;" name="bindid=right" type="text" /> <select name="right" size="1" style="width:100%;font-size:100%"><option value="inch (US survey)">inch (US survey) [in]</option><option value="foot (US survey)">foot (US survey) [ft]</option><option value="centimeter">centimeter [cm]</option><option value="meter">meter [m]</option><option value="mile">mile [mi, mi(Int)]</option><option value="millimeter">millimeter [mm]</option></select></div>
<div style="width:96%">Result:<br /> <input style="width:100%;" name="type=result;bindid=left;bindid2=right" type="text" /></div>
</div>
</form>
<!--<script src="http://www.unitconversion.org/converter3/converter3.js"></script>-->
</div>
<div data-role="collapsible" data-collapsed="true">
<h3>Weight</h3>
<form style="padding:0;margin:0" name="cat=Weight">
<div style="width:100%">
<div style="float:left; width:47%">From Quantity:<br /> <input style="width:100%;" name="bindid=left;base=1" type="text" /> <select name="left" size="1" style="width:100%;font-size:100%"> <option value="gram">gram [g]</option><option value="kilogram">kilogram [kg]</option><option value="ounce">ounce [oz]</option><option value="pound">pound [lb]</option></select></div>
<div style="float:left; width:47%; padding-left:20px;">To Quantity:<br /> <input style="width:100%;" name="bindid=right" type="text" /> <select name="right" size="1" style="width:100%;font-size:100%"> <option value="gram">gram [g]</option><option value="kilogram">kilogram [kg]</option><option value="ounce">ounce [oz]</option><option value="pound">pound [lb]</option></select></div>
<div style="width:96%">Result:<br /> <input style="width:100%;" name="type=result;bindid=left;bindid2=right" type="text" /></div>
</div>
<!--<script src="http://www.unitconversion.org/converter3/converter3.js"></script>-->
</form> <br /></div>
<div data-role="collapsible" data-collapsed="true">
<h3>Volume</h3>
<form style="padding:0;margin:0" name="cat=Volume">
<div style="width:100%">
<div style="float:left; width:47%">From Quantity:<br /> <input style="width:100%;" name="bindid=left;base=1" type="text" /> <select name="left" size="1" style="width:100%;font-size:100%"><option value="cc">cc [cc, cm^3]</option><option value="cubic centimeter">cubic centimeter [cm^3, cc]</option><option value="cubic decimeter">cubic decimeter [dm^3]</option><option value="cubic foot">cubic foot [ft^3]</option><option value="cubic inch">cubic inch [in^3]</option><option value="cubic kilometer">cubic kilometer [km^3]</option><option value="cubic meter">cubic meter [m^3]</option><option value="cubic mile">cubic mile [mi^3]</option><option value="cubic millimeter">cubic millimeter [mm^3]</option><option value="cubic yard">cubic yard [yd^3]</option><option value="cup (US)">cup (US)</option><option value="fluid ounce (US)">fluid ounce (US) [fl oz (US)]</option><option value="gallon (US)">gallon (US) [gal (US)]</option><option value="kiloliter">kiloliter [kL]</option><option value="liter">liter [L, l]</option><option value="milliliter">milliliter [mL]</option><option value="pint (US)">pint (US) [pt (US), pt liq (US)]</option><option value="quart (US)">quart (US) [qt (US), qt liq (US)]</option><option value="tablespoon (US)">tablespoon (US)</option><option value="teaspoon (US)">teaspoon (US)</option></select></div>
<div style="float:left; width:47%; padding-left:20px;">To Quantity:<br /> <input style="width:100%;" name="bindid=right" type="text" /> <select name="right" size="1" style="width:100%;font-size:100%"><option value="cc">cc [cc, cm^3]</option><option value="cubic centimeter">cubic centimeter [cm^3, cc]</option><option value="cubic decimeter">cubic decimeter [dm^3]</option><option value="cubic foot">cubic foot [ft^3]</option><option value="cubic inch">cubic inch [in^3]</option><option value="cubic kilometer">cubic kilometer [km^3]</option><option value="cubic meter">cubic meter [m^3]</option><option value="cubic mile">cubic mile [mi^3]</option><option value="cubic millimeter">cubic millimeter [mm^3]</option><option value="cubic yard">cubic yard [yd^3]</option><option value="cup (US)">cup (US)</option><option value="fluid ounce (US)">fluid ounce (US) [fl oz (US)]</option><option value="gallon (US)">gallon (US) [gal (US)]</option><option value="kiloliter">kiloliter [kL]</option><option value="liter">liter [L, l]</option><option value="milliliter">milliliter [mL]</option><option value="pint (US)">pint (US) [pt (US), pt liq (US)]</option><option value="quart (US)">quart (US) [qt (US), qt liq (US)]</option><option value="tablespoon (US)">tablespoon (US)</option><option value="teaspoon (US)">teaspoon (US)</option></select></div>
<div style="width:96%">Result:<br /> <input style="width:100%;" name="type=result;bindid=left;bindid2=right" type="text" /></div>
</div>
<!--<script src="http://www.unitconversion.org/converter3/converter3.js"></script>-->
</form></div>
<div data-role="collapsible" data-collapsed="true">
<h3>Temperature</h3>
<form style="padding:0;margin:0" name="cat=Temperature">
<div style="width:100%">
<div style="float:left; width:47%">From Quantity:<br /> <input style="width:100%;" name="bindid=left;base=1" type="text" /> <select name="left" size="1" style="width:100%;font-size:100%"><option value="degree Celsius">degree Celsius [&deg;C]</option><option value="degree Fahrenheit">degree Fahrenheit [&deg;F]</option></select></div>
<div style="float:left; width:47%; padding-left:20px;">To Quantity:<br /> <input style="width:100%;" name="bindid=right" type="text" /> <select name="right" size="1" style="width:100%;font-size:100%"><option value="degree Celsius">degree Celsius [&deg;C]</option><option value="degree Fahrenheit">degree Fahrenheit [&deg;F]</option></select></div>
<div style="width:96%">Result:<br /> <input style="width:100%;" name="type=result;bindid=left;bindid2=right" type="text" /></div>
</div>
</form>
<!--<script src="http://www.unitconversion.org/converter3/converter3.js"></script>-->
</div>
<div data-role="collapsible" data-collapsed="true">
<h3>Pressure</h3>
<form style="padding:0;margin:0" name="cat=Pressure">
<div style="width:100%">
<div style="float:left; width:47%">From Quantity:<br /> <input style="width:100%;" name="bindid=left;base=1" type="text" /> <select name="left" size="1" style="width:100%;font-size:100%"><option value="bar">bar</option><option value="psi">psi [psi]</option></select></div>
<div style="float:left; width:47%; padding-left:20px;">To Quantity:<br /> <input style="width:100%;" name="bindid=right" type="text" /> <select name="right" size="1" style="width:100%;font-size:100%"><option value="bar">bar</option><option value="psi">psi [psi]</option></select></div>
<div style="width:96%">Result:<br /> <input style="width:100%;" name="type=result;bindid=left;bindid2=right" type="text" /></div>
</div>
</form>
<!--<script src="http://www.unitconversion.org/converter3/converter3.js"></script>-->
<br /></div>
<div data-role="collapsible" data-collapsed="true">
<h3>Torque</h3>
<form style="padding:0;margin:0" name="cat=Torque">
<div style="width:100%">
<div style="float:left; width:47%">From Quantity:<br /> <input style="width:100%;" name="bindid=left;base=1" type="text" /> <select name="left" size="1" style="width:100%;font-size:100%"><option value="pound-force inch">pound-force inch [lbf*in]</option><option value="pound-force foot">pound-force foot [lbf*ft]</option><option value="newton meter">newton meter [N*m]</option></select></div>
<div style="float:left; width:47%; padding-left:20px;">To Quantity:<br /> <input style="width:100%;" name="bindid=right" type="text" /> <select name="right" size="1" style="width:100%;font-size:100%"><option value="pound-force inch">pound-force inch [lbf*in]</option><option value="pound-force foot">pound-force foot [lbf*ft]</option><option value="newton meter">newton meter [N*m]</option></select></div>
<div style="width:96%">Result:<br /> <input style="width:100%;" name="type=result;bindid=left;bindid2=right" type="text" /></div>
</div>
</form> <!--<mce:script src="http://www.unitconversion.org/converter3/converter3.js" mce_src="http://www.unitconversion.org/converter3/converter3.js"></mce:script>--></div>
</div>
</div>
<div data-role="footer" data-theme="b" data-position="fixed">
<h1>&copy; Copyright  2012 Fittings Unlimited. All Rights Reserved.</h1>
</div>
<a href="http://www.unitconversion.org"></a></div>
</body>
</html>