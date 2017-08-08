<?php  include("config.php");

$sql = mssql_query("exec sp_columns sub_category_name");
while($row = mssql_fetch_assoc($sql)):
echo $row['COLUMN_NAME'];
echo "<br>";
endwhile; 
echo "<hr>";




?>