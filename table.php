<?php include("config.php");



$sql = mssql_query("exec sp_columns FU_SUBPRODUCT");
while($row = mssql_fetch_assoc($sql)):
echo $row['COLUMN_NAME'];
echo "<br>"; 
endwhile; 
echo "<hr>";

$sql2 = mssql_query("select * from FU_SUPPLIER_EXCELSHEET"); 
 

/*  $sqlQry = "SELECT A.SUB_CATEGORY_ID, A.SUB_CATEGORY_NAME, A.Sub_Category_Thumb_Image FROM FU_PRODUCT_SUB_CATEGORY A, FU_CATEGORY_SUBCATEGORY_LINKING B WHERE B.SUBCATEGORY_ID = A.SUB_CATEGORY_ID AND A.IS_ACTIVE = 'Y'  ORDER BY display_order,Sub_Category_Name";
*/	
			 
//$sql2 = mssql_query($sql2);				 

while($row2 = mssql_fetch_array($sql2)):
echo $row2[0].' | '. $row2[1].' | '.$row2['2'].' | '.$row2['3'].' | ';
//echo "<img src=http://www.elitewebdesignersllc.com/images/product-images/".$row2[2]." >";
echo "<br>";
endwhile;


$sql3 = mssql_query("select PRODUCT_ID,PRODUCT_NAME from FU_PRODUCT"); 
 

/*  $sqlQry = "SELECT A.SUB_CATEGORY_ID, A.SUB_CATEGORY_NAME, A.Sub_Category_Thumb_Image FROM FU_PRODUCT_SUB_CATEGORY A, FU_CATEGORY_SUBCATEGORY_LINKING B WHERE B.SUBCATEGORY_ID = A.SUB_CATEGORY_ID AND A.IS_ACTIVE = 'Y'  ORDER BY display_order,Sub_Category_Name";
*/				 
//$sql2 = mssql_query($sql2);				 

while($row3 = mssql_fetch_array($sql3)):
echo $row3[0].' | '. $row3[1].' | '.$row3['2'].' | ';
//echo "<img src=http://www.elitewebdesignersllc.com/images/product-images/".$row2[2]." >";
echo "<br>";
endwhile;

?>