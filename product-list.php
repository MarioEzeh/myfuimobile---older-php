<?php
include("config.php");

//include('header.php');
extract($_REQUEST);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<title>Fittings Unlimited</title>   
    		<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min_reg.css" />
			<link rel="stylesheet"  href="css/jqm-docs.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>
    
     <style type="text/css">
		li.clearing {display: block !important; clear: both !important;}
	</style> 

    		<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min_reg.css" />

</head>
<body>		
<div data-role="page" class="type-index">	
	
	
	<div data-role="header" data-theme="b" data-position="fixed">
		<h1>Fittings Unlimited, Inc.</h1>
		<!--<a href="index.php" data-icon="home" data-direction="reverse" class="ui-btn-left jqm-home">Home</a>-->
				<a href="javascript:history.go(-1);" data-icon="back" data-theme="b">Back</a>

	</div>
	
	<div data-role="content">	
<ul data-role="listview" style="font-size: 1.2em !important;">

<?php $sqlQry = "select distinct  PRODUCT_ID,CATEGORY_ID,SUB_CATEGORY_ID,(select PRODUCT_FULL_IMAGE from FU_PRODUCT P where P.PRODUCT_ID=L.PRODUCT_ID) as PRODUCT_FULL_IMAGE, (select PRODUCT_NAME from FU_PRODUCT P where P.PRODUCT_ID=L.PRODUCT_ID) as PRODUCT from FU_CATEGORY_SUBCATEGORY_PRODUCT_SUBPRODUCT_LINKING L where  l.CATEGORY_ID= $cid  and SUB_CATEGORY_ID=$scid and PRODUCT_ID in (SELECT PRODUCT_ID FROM FU_PRODUCT WHERE IS_ACTIVE='Y')";

$sqlexe = mssql_query($sqlQry);
while($row = mssql_fetch_array($sqlexe)):
$imageUrl = @getimagesize('../images/product-images/'.$row['PRODUCT_FULL_IMAGE']);

if(!is_array($imageUrl)):
$pImage = "image_not_available.png";
else:
$pImage = "$row[PRODUCT_FULL_IMAGE]";
endif;
echo "<li style='padding:0px' class='product-list'><a href='product-description.php?cid=$row[CATEGORY_ID]&pid=$row[PRODUCT_ID]'><div style='float:left'><img src='../images/product-images/$pImage'/></div><div style='float:left;vertical-align: middle; display: table-cell;padding-top:68px; padding-left:5px;'><h2 style='#position: relative; #top: -50%; '>$row[PRODUCT]</h2></div><div style='clear:both'></div></a></li>";
endwhile;
?>
</ul>


</div>
	<div data-role="footer" data-theme="b" data-position="fixed">
<center>
	<div class="bottom_links">
	<a href="index.php"><img alt="Home" src="images/home.png" border="0" style="width:100px !important; margin-left: -15px;"></a>&nbsp;<a href="convertersframe.html"><img alt="Tools" src="images/tools.png" border="0" style="width:100px !important; "></a>&nbsp;<a href="browse.php"><img alt="Products" src="images/product.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="myfuisearch.php"><img alt="Search" src="images/search.png" border="0" style="width:100px !important; "></a>&nbsp;<a href="location.php"><img alt="Locations" src="images/location.png" border="0" style="width:100px !important; "></a>
    </div>
</center>
		<h1>&copy; Copyright  2012 Fittings Unlimited. All Rights Reserved.</h1>
	</div>


</div>

</body>
</html>