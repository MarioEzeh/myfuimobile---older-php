<?php
$con=mssql_connect("qauserfui.db.8604023.hostedresource.com","qauserfui","R8eohp123") or die(mysql_error());
mssql_select_db("qauserfui",$con) or die(mysql_error());
$keyword = $_REQUEST['keyword'];

$sql_fui1 =mssql_query(" SELECT  DISTINCT FUINUMBER as FUI_NO  ,SUPPLIER_NUMBER as SUP_NO,SUPPLIER_NAME,  SUB_PRODUCT_NO, SUB_PRODUCT_NAME FROM  FU_SUBPRODUCT P, FU_SUPPLIER_EXCELSHEET S      
WHERE  (SUPPLIER_NUMBER like '%$keyword%' )  and P.SUB_PRODUCT_NO=s.FUINUMBER ");

while ($row1 = mssql_fetch_assoc($sql_fui1)) :
$sql_fui2 = mssql_query("SELECT MAX(SUB_PRODUCT_ID),MAX(PRODUCT_ID) as product_id FROM FU_SUBPRODUCT WHERE SUB_PRODUCT_NO = '$row1[FUI_NO]'");
		$row2 = mssql_fetch_assoc($sql_fui2);
		
$sql_fui3 = mssql_query("SELECT SUB_PRODUCT_THUMB_IMAGE FROM FU_SUBPRODUCT WHERE SUB_PRODUCT_NO = '$row1[FUI_NO]'");
$row3 = mssql_fetch_assoc($sql_fui3);
echo "<pre>";
print_r($row1);
echo "</pre>";
echo "<pre>";
print_r($row2);
echo "</pre>";
echo "<pre>";
print_r($row3);
echo "</pre>";
endwhile;



/*while($row2 = mssql_fetch_assoc($sql_fui)):
echo $fui_no = $row2['SUB_PRODUCT_NO'];
//echo $row2[0].' | '. $row2[1].' | '. $row2[2].' | '. $row2[3].' | '. $row2[4]; 
echo "<br>";
endwhile; */



?>