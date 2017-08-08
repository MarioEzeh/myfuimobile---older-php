<?php
$con=mssql_connect("qauserfui.db.8604023.hostedresource.com","qauserfui","R8eohp123") or die(mysql_error());
mssql_select_db("qauserfui",$con) or die(mysql_error());


$pid = 4417;

$proc = mssql_init("FU_SP_GET_PRODUCTS_TO_DISPLAY ", $con);
mssql_bind($proc, '@SEARCH_TEXT' , $keyword ,  SQLVARCHAR);

mssql_bind($proc, '@PID'  ,  $pid,  SQLINT4);
$proc_result = mssql_execute($proc);
$record = array();
while($row = mssql_fetch_assoc($proc_result)):
  $hash = $row['SUB_PRODUCT_ID'];
      $record[$hash] = $row;

//$record[] = $row;
endwhile;

$rec = array_unique($record);
echo "<pre>";
print_r($rec);
echo "</pre>";
echo "<hr>";
echo "<pre>";
print_r($record);
echo "</pre>";

?>