<?php
include("config.php");

//include('header.php');
$ii = $_GET['ii'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<title>Fittings Unlimited</title>   
	<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />
	<link rel="stylesheet"  href="css/jqm-docs.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>
</head>
<body>		
<div data-role="page" class="type-index">	
	
	
	<div data-role="header" data-theme="b" data-position="fixed">
		<h1>Fittings Unlimited, Inc.</h1>
		<a href="index.php" data-icon="home" data-iconpos="notext" data-direction="reverse" class="ui-btn-right jqm-home">Home</a>
	</div>
	
	<div data-role="content">
<ul data-role="listview">



<?php 

if($ii!=0)
{
$sqlQry = "SELECT A.SUB_CATEGORY_ID, A.SUB_CATEGORY_NAME, A.Sub_Category_Thumb_Image FROM FU_PRODUCT_SUB_CATEGORY A, FU_CATEGORY_SUBCATEGORY_LINKING B WHERE B.SUBCATEGORY_ID = A.SUB_CATEGORY_ID AND A.IS_ACTIVE = 'Y' AND A.SUB_CATEGORY_NAME LIKE 'import%' ORDER BY display_order,Sub_Category_Name";
}
else
{
$sqlQry = "SELECT A.SUB_CATEGORY_ID, A.SUB_CATEGORY_NAME, A.Sub_Category_Thumb_Image FROM FU_PRODUCT_SUB_CATEGORY A, FU_CATEGORY_SUBCATEGORY_LINKING B WHERE B.SUBCATEGORY_ID = A.SUB_CATEGORY_ID AND A.IS_ACTIVE = 'Y' AND A.SUB_CATEGORY_NAME NOT LIKE 'import%' ORDER BY display_order,Sub_Category_Name";
}

//$sqlQry = "SELECT A.SUB_CATEGORY_ID, A.SUB_CATEGORY_NAME, A.Sub_Category_Thumb_Image FROM FU_PRODUCT_SUB_CATEGORY A, FU_CATEGORY_SUBCATEGORY_LINKING B WHERE B.SUBCATEGORY_ID = A.SUB_CATEGORY_ID AND A.IS_ACTIVE = 'Y' AND B.CATEGORY_ID =$ii ORDER BY display_order,Sub_Category_Name";


$sqlexe = mssql_query($sqlQry);
//echo 'Total records in database: ' . mssql_num_rows($sqlexe);
while($row = mssql_fetch_array($sqlexe)):
$imageUrl = @getimagesize('../images/subcategory-images/'.$row['Sub_Category_Thumb_Image']);

//print_r($row);

if(!is_array($imageUrl)):
$pImage = "image_not_available.png";
else:
$pImage = "$row[Sub_Category_Thumb_Image]";
endif;
echo "<li><a href='product-description.php?cid=$row[SUB_CATEGORY_ID]&pid=$ii'><img width ='100' height ='100' src='../images/subcategory-images/$pImage' /><h3>$row[SUB_CATEGORY_NAME]</h3></a></li>";
endwhile;
?>
</ul>



<?php
include('footer.php');
?>