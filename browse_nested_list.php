<?php
include("config.php"); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<title>Fittings Unlimited</title>   
	<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />
	<link rel="stylesheet"  href="css/jqm-docs.css" />
	<link rel="stylesheet"  href="css/browse.css" />
    
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>

    <style type="text/css">
		li.clearing {display: block; clear: both;}
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
			<ul data-role="listview" data-theme="b" data-inset="true"> 
			
				
				<?php			$query="SELECT material_id,MATERIAL_Name FROM FU_PRODUCT_MATERIAL WHERE IS_ACTIVE='Y'";
			$result=mssql_query($query,$con);
			 while($row=mssql_fetch_array($result))
			{
			?>
				
					<li><?php echo $row['MATERIAL_Name'];
							$mid = $row['material_id'];
					?>
					
						<ul data-theme="c">
						
						<?php
						echo '<a href="javascript:history.go(-1);" data-icon="back" data-theme="b" class="jqm-back"></a></a>';
						
						$sqlQry = "select '''#''' as LINK, CATEGORY_NAME AS CATEGORYNAME, MATERIAL_CATEGORY_LINKING_ID, MATERIAL_ID,L.CATEGORY_ID,c.category_id from fu_product_category c, FU_MATERIAL_CATEGORY_LINKING L where c.category_id=l.category_id and l.MATERIAL_ID = $mid and c.Is_Active='Y' Order By c.Category_Id";
						$sqlQryex = mssql_query($sqlQry);
						while($catRow = mssql_fetch_array($sqlQryex)):
						?>
						
							<li class="browse-inner-list" style="padding-top:35px;"><?php echo' '?> <?php echo $catRow['CATEGORYNAME'];
							 $catId = $catRow['category_id']; 
							
							?>
                           
						<ul data-theme="c" class="browse-inner">
                        
					<?php
						echo '<a href="javascript:history.go(-1);" data-icon="back" data-theme="b" class="jqm-back"></a></a>';
					
						$sqlQry2 = "select DISTINCT SUBCATEGORY_ID, (select DISTINCT sub_category_name from fu_product_sub_category sc where sc.SUB_CATEGORY_ID=l.SUBCATEGORY_ID) as SUBCATEGORY from FU_CATEGORY_SUBCATEGORY_LINKING L where CATEGORY_ID = $catId and SUBCATEGORY_ID in (select DISTINCT SUB_CATEGORY_ID from FU_PRODUCT_SUB_CATEGORY WHERE IS_ACTIVE='Y')";
						$sqlQryex2 = mssql_query($sqlQry2);
						while($subcatRow = mssql_fetch_array($sqlQryex2)):
						$subid = $subcatRow['SUBCATEGORY_ID'];
							 ?>
							 <li class="browse-inner-list"><a  class="browse-inner-li-a" href="product-list.php?cid=<?php echo $catId?>&scid=<?php echo $subid?>" data-transition="slide"><div style="padding-top:25px;"><?php echo $subcatRow['SUBCATEGORY']; ?><p>&nbsp;</p><br /></div></a></li>
						<?php endwhile; ?>
							
<div data-position="fixed" data-theme="b" data-role="footer" class="ui-footer ui-bar-b ui-footer-fixed fade ui-fixed-overlay" role="contentinfo">
								
								<center><div class="bottom_links" style="margin-left: -15px;"><a href="index.php"><img alt="Home" src="images/home.png" border="0" style="width:100px !important; margin-left: -15px;"></a>&nbsp;<a href="convertersframe.html"><img alt="Tools" src="images/tools.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="browse.php"><img alt="Products" src="images/product.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="myfuisearch.php"><img alt="Search" src="images/search.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="location.php"><img alt="Locations" src="images/location.png" border="0" style="width:100px !important;"></a></div></center></div>		
						</ul>
					
					</li>	
					

					<?php endwhile; ?>
					<div data-role="footer" data-theme="b" data-position="fixed"><center><div class="bottom_links"><a href="index.php"><img alt="Home" src="images/home.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="convertersframe.html"><img alt="Tools" src="images/tools.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="browse.php"><img alt="Products" src="images/product.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="myfuisearch.php"><img alt="Search" src="images/search.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="location.php"><img alt="Locations" src="images/location.png" border="0" style="width:100px !important;"></a></div></center></div>	
									
						</ul>
							
					</li>
					<?php
			
							
			
			}
			
			?>
				
				</ul>	
                
		</div>

	
	<div data-role="footer" data-theme="b" data-position="fixed">
<center>
	<div class="bottom_links" style="margin-left: auto; margin-right: auto;">  
	<a href="index.php"><img alt="Home" src="images/home.png" border="0" style="width:100px !important; margin-left: -15px;"></a>&nbsp;<a href="convertersframe.html"><img alt="Tools" src="images/tools.png" border="0" style="width:100px !important; "></a>&nbsp;<a href="browse.php"><img alt="Products" src="images/product.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="myfuisearch.php"><img alt="Search" src="images/search.png" border="0" style="width:100px !important; "></a>&nbsp;<a href="location.php"><img alt="Locations" src="images/location.png" border="0" style="width:100px !important; "></a>
    </div>
</center>
		<h2>&copy; Copyright  2012 Fittings Unlimited. All Rights Reserved.</h2>
	</div>


</div>

</body>
</html>