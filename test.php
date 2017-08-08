<?php  include("config.php");

$sql = mssql_query("exec sp_columns fu_product_sub_category");
while($row = mssql_fetch_assoc($sql)):
echo $row['COLUMN_NAME'];
echo "<br>";
endwhile; 
echo "<hr>";

	$catid = 66;
				$sqlQry2 = "select DISTINCT SUBCATEGORY_ID,CATEGORY_SUBCATEGORY_LINKING_ID, (select DISTINCT sub_category_name from fu_product_sub_category sc where sc.SUB_CATEGORY_ID=l.SUBCATEGORY_ID) as SUBCATEGORY,(select DISPLAY_ORDER from fu_product_sub_category sc where sc.SUB_CATEGORY_ID=l.SUBCATEGORY_ID) as displayOrder from FU_CATEGORY_SUBCATEGORY_LINKING L where CATEGORY_ID = $catid and SUBCATEGORY_ID in (select DISTINCT SUB_CATEGORY_ID from FU_PRODUCT_SUB_CATEGORY WHERE IS_ACTIVE='Y') ORDER BY displayOrder ASC";			
				
						$sqlQryex2 = mssql_query($sqlQry2);
						while($subcatRow = mssql_fetch_array($sqlQryex2)):
						echo $dorder = $subcatRow['displayOrder'].' | ';
						echo $subid = $subcatRow['SUBCATEGORY_ID'].' | ';
					
							 echo $subcatRow['SUBCATEGORY'];
							 echo '<br>';
							  endwhile; 


?>