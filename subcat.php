<?php include("config.php");

  $sqlQry = "SELECT material_id FROM FU_PRODUCT_MATERIAL WHERE IS_ACTIVE='Y'";
  
$sqlQry2 = "select '''#''' as LINK, CATEGORY_NAME AS CATEGORYNAME, MATERIAL_CATEGORY_LINKING_ID, MATERIAL_ID,L.CATEGORY_ID,c.category_id from fu_product_category c, FU_MATERIAL_CATEGORY_LINKING L where c.category_id=l.category_id and l.MATERIAL_ID = 11 and c.Is_Active='Y' Order By c.Category_Id";

$sqlQry3 = "select *,'''#''' as link ,(select sub_category_name from fu_product_sub_category sc where sc.SUB_CATEGORY_ID=l.SUBCATEGORY_ID) as SUBCATEGORY from FU_CATEGORY_SUBCATEGORY_LINKING L where CATEGORY_ID = '66' and SUBCATEGORY_ID in (select SUB_CATEGORY_ID from FU_PRODUCT_SUB_CATEGORY WHERE IS_ACTIVE='Y')";

$sqlexe = mssql_query($sqlQry);
while($row = mssql_fetch_array($sqlexe)){

echo $link = $row['material_id'];
echo "<br>";
}


echo "<hr><br>";



$sqlexe2 = mssql_query($sqlQry2);
while($row2 = mssql_fetch_array($sqlexe2)){

echo $cat = $row2['CATEGORYNAME'] . ' MID '. $row2['MATERIAL_ID']. 'CAT_ID'. $row2['category_id'];
echo "<br>";
}


echo "<hr><br>";

$sqlexe3 = mssql_query($sqlQry3);
while($row3 = mssql_fetch_array($sqlexe3)){

echo $sub = $row3['SUBCATEGORY'];
echo "<br>";
}

?>