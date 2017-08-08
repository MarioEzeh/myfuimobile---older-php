<?php

include('header.php');
include("config.php");
?>

<br />
<ul data-role="listview" data-filter="true" data-inset="true">
<?php  $sqlQry = "select distinct  PRODUCT_ID,CATEGORY_ID,SUB_CATEGORY_ID,(select PRODUCT_FULL_IMAGE from FU_PRODUCT P where P.PRODUCT_ID=L.PRODUCT_ID) as PRODUCT_FULL_IMAGE, (select PRODUCT_NAME from FU_PRODUCT P where P.PRODUCT_ID=L.PRODUCT_ID) as PRODUCT from FU_CATEGORY_SUBCATEGORY_PRODUCT_SUBPRODUCT_LINKING L where  PRODUCT_ID in (SELECT PRODUCT_ID FROM FU_PRODUCT WHERE IS_ACTIVE='Y')";

$sqlexe = mssql_query($sqlQry);
while($row = mssql_fetch_array($sqlexe)):
echo "<li><a href='product-description.php?cid=$row[CATEGORY_ID]&pid=$row[PRODUCT_ID]'><h3>$row[PRODUCT]</h3></a></li>";
endwhile;
?>			
			</ul>



<?php 
include('footer.php');
?>