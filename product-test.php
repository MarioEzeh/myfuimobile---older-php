<?php  include("config.php");
/*
$sqlQry = "select distinct 'ProductDetail.aspx?CID=0&SCID=0&fuisearch=1&PID=' as link , PRODUCT_ID,CATEGORY_ID,SUB_CATEGORY_ID,(select PRODUCT_FULL_IMAGE from FU_PRODUCT P where P.PRODUCT_ID=L.PRODUCT_ID) as PRODUCT_FULL_IMAGE, (select PRODUCT_NAME from FU_PRODUCT P where P.PRODUCT_ID=L.PRODUCT_ID) as PRODUCT from FU_CATEGORY_SUBCATEGORY_PRODUCT_SUBPRODUCT_LINKING L where  l.CATEGORY_ID= 79  and SUB_CATEGORY_ID=24 and PRODUCT_ID = 6686 ";
*/


$sqlQry = "SELECT SUB_PRODUCT_ID, SUB_PRODUCT_NO, SUB_PRODUCT_NAME, SUB_PRODUCT_SHORT_DESC, SPECIAL_PRICE, SUB_PRODUCT_PDF FROM FU_SUBPRODUCT WHERE PRODUCT_ID='6173'";

		 
				  /* $sqlQry = "SELECT a.Category_Name as cat_name, b.Product_Name as prod_name,b.Product_Description as dsc FROM FU_PRODUCT_CATEGORY a,FU_PRODUCT b, FU_SUBPRODUCT c WHERE b.Product_Id = c.Product_Id AND a.CATEGORY_ID= 70 AND  b.product_id =3906 " ; 
			
			*/
/*     $sqlQry = "select distinct  PRODUCT_ID,CATEGORY_ID,SUB_CATEGORY_ID,(select PRODUCT_FULL_IMAGE from FU_PRODUCT P where P.PRODUCT_ID=L.PRODUCT_ID) as PRODUCT_FULL_IMAGE, (select PRODUCT_NAME from FU_PRODUCT P where P.PRODUCT_ID=L.PRODUCT_ID) as PRODUCT from FU_CATEGORY_SUBCATEGORY_PRODUCT_SUBPRODUCT_LINKING L where  PRODUCT_ID in (SELECT PRODUCT_ID FROM FU_PRODUCT WHERE IS_ACTIVE='Y')";*/
				 
$sqlexe = mssql_query($sqlQry);
while($row = mssql_fetch_array($sqlexe)){

echo $link = $row['SUB_PRODUCT_NAME'] .' | '. $row['SPECIAL_PRICE'] .' | '. $row['SUB_PRODUCT_PDF'];
echo "<br>";
}


echo "<hr><br>";


?>