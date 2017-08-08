<?php
include("config.php");
extract($_REQUEST);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<title>Fittings Unlimited</title>   
	<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />
	<link rel="stylesheet"  href="css/jqm-docs.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>
    
     <style type="text/css">
		 li.clearing {display: block; clear: both; }
		 img { width: 500px !important;}
	</style>    
				<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />

</head>
<body>		
<div data-role="page" class="type-index">	
	
	
	<div data-role="header" data-theme="b" data-position="fixed">
		<h1>Fittings Unlimited, Inc.</h1>
		<!--<a href="index.php" data-icon="home" data-direction="reverse" class="ui-btn-left jqm-home">Home</a>-->
				<a href="javascript:history.go(-1);" data-icon="back" data-theme="b">Back</a>

	</div>
	
	<div data-role="content">
<div>
<?php   $sqlQry = "SELECT a.Category_Name as cat_name, b.Product_Name as prod_name,b.Product_Description as dsc,b.Product_Full_Image as prod_image FROM FU_PRODUCT_CATEGORY a,FU_PRODUCT b, FU_SUBPRODUCT c WHERE b.Product_Id = c.Product_Id AND a.CATEGORY_ID= $cid AND  b.product_id =$pid " ; 
$sqlexe = mssql_query($sqlQry);
$row = mssql_fetch_array($sqlexe);

$imageUrl = @getimagesize('../images/product-images/'.$row['prod_name']);
if(!is_array($imageUrl)):
$pImage = "image_not_available.png";
else:
$pImage = "$row[PRODUCT_FULL_IMAGE]";
endif;

echo "<p><img border='0' width='500px' src='../images/product-images/$row[prod_image]' /></p>";

?>
<p>

<ul data-role="listview" style="font-size: 1.5em !important;">
<?php $sqlsubQry = "SELECT SUB_PRODUCT_ID, SUB_PRODUCT_NO, SUB_PRODUCT_NAME, SUB_PRODUCT_SHORT_DESC, SPECIAL_PRICE, SUB_PRODUCT_PDF FROM FU_SUBPRODUCT WHERE PRODUCT_ID='$pid'";
$sqlsubexe = mssql_query($sqlsubQry);
while($srow = mssql_fetch_array($sqlsubexe))
{
$price = ($srow['SPECIAL_PRICE'] == 0) ? 'Price on Request' : "$ ".number_format($srow['SPECIAL_PRICE'],2);
echo '<li><a href="location.php">Part #: '.$srow['SUB_PRODUCT_NAME'].'<br />Desc: '.htmlentities($srow['SUB_PRODUCT_SHORT_DESC']).'<br /> List Price: '.$price.'</a></li>'; 

}
?>
</ul>

</p>


</div>

<?php
include('footer.php');
?>