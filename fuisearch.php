<?php ob_start(0);
include("config.php");

$keyword = $_REQUEST['keyword'];

if($keyword)
{
			 
	$sqlQry = "SELECT DISTINCT a.SUB_PRODUCT_ID, b.CATEGORY_ID, c.PRODUCT_ID as PRODUCT_ID, a.SUB_PRODUCT_NO, a.SUB_PRODUCT_NAME as PRODUCT,c.PRODUCT_FULL_IMAGE as image, ".
	"a.SUB_PRODUCT_SHORT_DESC as PRODUCT_DESC, a.SPECIAL_PRICE as PRICE, a.SUB_PRODUCT_PDF FROM FU_SUBPRODUCT a, ".
	"FU_PRODUCT_CATEGORY b, FU_PRODUCT c, FU_PRODUCT_SUB_CATEGORY d, FU_CATEGORY_SUBCATEGORY_PRODUCT_SUBPRODUCT_LINKING e ".
	"WHERE a.Is_Active='Y' AND b.CATEGORY_ID = e.CATEGORY_ID and " .
	"c.PRODUCT_ID = e.PRODUCT_ID and d.Sub_Category_Id = e.Sub_Category_Id and ".
	"a.SUB_PRODUCT_ID = e.SUB_PRODUCT_ID and c.PRODUCT_ID > 0 AND d.SUB_CATEGORY_ID > 0 AND ".
	"b.CATEGORY_ID > 0 AND (SUB_PRODUCT_NAME like '%$keyword%') Order By SUB_PRODUCT_NAME";					 
	
	$sqlexe = mssql_query($sqlQry);

$product_records = array();
while($row = mssql_fetch_array($sqlexe)):
$product_records[] = array('product' => $row['PRODUCT'], 'desc' => $row['PRODUCT_DESC'], 'price' =>  $row['PRICE'] , 'product_image' => $row['image'], 'product_id' => $row['PRODUCT_ID'] );
endwhile;

// End of product serach //

$productCount = count($product_records);

if($productCount == 0 ):

$sqlQry_supp = "SELECT A.SUB_PRODUCT_ID, B.CATEGORY_ID, C.SUB_CATEGORY_ID, D.PRODUCT_ID as product_id ,D.PRODUCT_FULL_IMAGE as image, ".
"A.SUB_PRODUCT_NO as fui_part, A.SUB_PRODUCT_NAME, A.SUB_PRODUCT_SHORT_DESC, A.SPECIAL_PRICE, " .
"A.SUB_PRODUCT_PDF,s.SUPPLIER_NAME as supplier, s.SUPPLIER_NUMBER as supplier_part  FROM FU_SUBPRODUCT A, FU_PRODUCT_CATEGORY B, FU_PRODUCT_SUB_CATEGORY C, ".
"FU_PRODUCT D, FU_CATEGORY_SUBCATEGORY_PRODUCT_SUBPRODUCT_LINKING E,FU_SUPPLIER_EXCELSHEET s WHERE ".
"A.IS_ACTIVE='Y' AND B.CATEGORY_ID = E.CATEGORY_ID AND C.SUB_CATEGORY_ID = E.SUB_CATEGORY_ID AND ".
"D.PRODUCT_ID = E.PRODUCT_ID AND A.SUB_PRODUCT_ID = E.SUB_PRODUCT_ID and a.SUB_PRODUCT_NO = s.FUINUMBER AND s.SUPPLIER_NUMBER LIKE '%$keyword%'".
" Order By SUB_PRODUCT_NAME";
$supp_sqlexe = mssql_query($sqlQry_supp);

$supp_records = array();
while($srow = mssql_fetch_array($supp_sqlexe)):
$supp_records[] = array('supplier_part' => $srow['supplier_part'], 'supplier_name' => $srow['supplier'], 'fui_part' =>  $srow['fui_part'],  'product_image' => $srow['image'],'product_id' => $srow['product_id'] );
endwhile;

endif;




}


?>
<!DOCTYPE html> 
<html> 
<head>
	<title>Fittings Unlimited</title>   
	<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />
	<link rel="stylesheet"  href="css/jqm-docs.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>
				<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />
                <link rel="stylesheet"  href="css/fuisearch.css" />
                
                <style type="text/css">
.ui-btn-text {font-size: 0.7em !important; }
.ui-field-contain input.ui-input-text, .ui-field-contain textarea.ui-input-text, .ui-field-contain .ui-input-search { height: 60px; font-size:3em; }
.ui-btn-text {font-size: 0.7em !important; }
.ui-icon ui-icon-arrow-r ui-icon-shadow {margin-top: -15px !important; }
</style>

</head>
<body> 

	<div data-role="page" class="type-index">	
	

	<div data-role="header" data-theme="b" data-position="fixed">
		<h1>Fittings Unlimited, Inc.</h1>
		<!--<a href="index.php" data-icon="home" data-direction="reverse">Home</a>-->
		<a href="javascript:history.go(-1);" data-icon="back" data-theme="b">Back</a>
	</div><!-- /header -->

	<div data-role="content" data-theme="c" role="main" class="ui-content">

<div style="height:50px;">&nbsp;</div>
<form class="ui-body ui-body-a ui-corner-all" style="padding-bottom: 0em !important;" method="get" action="product-detail.php">
				<fieldset>
					<div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
						<input value="<?php echo $_REQUEST['keyword']; ?>" type=text name="keyword" style="height:50px !important; font-size: 1em !important;">
                    </div>
					<button value="submit-value" name="submit" data-theme="b" type="submit" class="ui-btn-hidden" aria-disabled="false" style="height:83px !important; font-size:2.5em !important;">SEARCH</button><br />
                      <!--<div style="width:425px !important; height: 83px !important; opacity:100 !important; filter:alpha(opacity=100) !important; /* For IE8 and earlier */ background-color: transparent;">
					   <INPUT TYPE="image" SRC="images/searchbutton.jpg" BORDER="0" ALT="Submit Form" style="height:83px !important; opacity:100 !important; filter:alpha(opacity=100) !important; margin-left: -10px !important;">
					  </div>--><br />
				</fieldset>
			</form>
</br>

	<?php 
	if($keyword)
	{
	if(count($product_records) > 0 ):
	
	 ?>
	<ul data-role="listview" class="ui-listview">
	<?php foreach($product_records as $val):
	?>
	<li style="font-size:1.5em !important; padding-bottom: 0em !important; height: 170px; "><a href="product-detail.php?pid=<?php echo $val['product_id']; ?>&pimage=<?php echo $val['product_image'] ?>">Part#: <?php echo $val['product']; ?> <br>Desc: <?php echo $val['desc']; ?>
	
	<?php
	$price = ($val['SPECIAL_PRICE'] == 0) ? 'Price on Request' : "$ ".number_format($val['SPECIAL_PRICE'],2);

	 ?></a></li>
	<?php endforeach;?>
	</ul>
	<?php else: ?>
	
	<ul data-role="listview">
	<?php foreach($supp_records as $sval):
	?>
	<li style="font-size: 1.3em !important;  height: 170px !important;"><a href="product-detail.php?pid=<?php echo $sval['product_id']; ?>&pimage=<?php echo $sval['product_image'] ?>">Supplier Part #: <?php echo $sval['supplier_part']; ?> <br>Supplier Name: <?php echo $sval['supplier_name']; ?><br>FUI Part #: <?php echo $sval['fui_part']; ?></a></li>
	<?php endforeach;?>
	</ul>
	
	<?php endif; 
	
	}
	
	?>



</div><!-- /content -->

	<div data-role="footer" data-theme="b" data-position="fixed">
<center>
	<div class="bottom_links">
	<a href="index.php"><img alt="Home" src="images/home.png" border="0" style="width:100px !important; margin-left: -15px;"></a>&nbsp;<a href="convertersframe.html"><img alt="Tools" src="images/tools.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="browse.php"><img alt="Products" src="images/product.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="myfuisearch.php"><img alt="Search" src="images/search.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="location.php"><img alt="Locations" src="images/location.png" border="0" style="width:100px !important;"></a>
    </div>
</center>
		<h1>&copy; Copyright  2012 Fittings Unlimited. All Rights Reserved.</h1>
	</div>
	
</div><!-- /page -->

</body>
</html>
