<?php
include("config.php"); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<title>Fittings Unlimited</title> 
    <link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min_regcolor.css" />  
	<link rel="stylesheet"  href="css/jqm-docs.css" />
	<link rel="stylesheet"  href="css/browse.css" />
    
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>

    <style type="text/css">
		li.clearing {display: block !important; clear: both !important;}
		.ui-icon ui-icon-arrow-r { padding-top: 15px !important; }
	</style> 
        		<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />

    
</head>
<body>		
<div data-role="page" class="type-index">	
	
	
	<div data-role="header" data-theme="b" data-position="fixed">
		<h2>Fittings Unlimited, Inc.</h2>
<!--<a href="index.php" data-icon="home" data-direction="reverse" class="ui-btn-left jqm-home">Home</a>-->
				<a href="javascript:history.go(-1);" data-icon="back" data-theme="b">Back</a>

	</div>
	
	<div data-role="content" class="browse">	
			<ul data-role="listview" data-inset="true">
			
				
				<?php	
					$catid = $_REQUEST['catid'];
				//$sqlQry2 = "select DISTINCT SUBCATEGORY_ID, (select DISTINCT sub_category_name from fu_product_sub_category sc where sc.SUB_CATEGORY_ID=l.SUBCATEGORY_ID) as SUBCATEGORY from FU_CATEGORY_SUBCATEGORY_LINKING L where CATEGORY_ID = $catid and SUBCATEGORY_ID in (select DISTINCT SUB_CATEGORY_ID from FU_PRODUCT_SUB_CATEGORY WHERE IS_ACTIVE='Y')";	
				$sqlQry2 = "select DISTINCT SUBCATEGORY_ID,CATEGORY_SUBCATEGORY_LINKING_ID, (select DISTINCT sub_category_name from fu_product_sub_category sc where sc.SUB_CATEGORY_ID=l.SUBCATEGORY_ID) as SUBCATEGORY,(select DISPLAY_ORDER from fu_product_sub_category sc where sc.SUB_CATEGORY_ID=l.SUBCATEGORY_ID) as displayOrder from FU_CATEGORY_SUBCATEGORY_LINKING L where CATEGORY_ID = $catid and SUBCATEGORY_ID in (select DISTINCT SUB_CATEGORY_ID from FU_PRODUCT_SUB_CATEGORY WHERE IS_ACTIVE='Y') ORDER BY displayOrder ASC";		
				
						$sqlQryex2 = mssql_query($sqlQry2);
						while($subcatRow = mssql_fetch_array($sqlQryex2)):						
						$subid = $subcatRow['SUBCATEGORY_ID'];
						
							 ?>
							 <li class="browse-inner-list" style="font-size: 1.2em !important; height: 170px !important; height: auto !important">
                             <a  class="browse-inner-li-a" href="product-list.php?cid=<?php echo $catid?>&scid=<?php echo $subid?>" data-transition="slide"><?php echo $subcatRow['SUBCATEGORY']; ?></a></li>
						<?php endwhile; ?>
				
				</ul>	
                
		</div>

	
	<div data-role="footer" data-theme="b" data-position="fixed">
<center>
	<div class="bottom_links">
	<a href="index.php"><img alt="Home" src="images/home.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="convertersframe.html"><img alt="Tools" src="images/tools.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="browse.php"><img alt="Products" src="images/product.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="myfuisearch.php"><img alt="Search" src="images/search.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="location.php"><img alt="Locations" src="images/location.png" border="0" style="width:100px !important;"></a>
    </div>
</center>
		<h2>&copy; Copyright  2012 Fittings Unlimited. All Rights Reserved.</h2>
	</div>


</div>

</body>
</html>