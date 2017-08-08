<?php
include("config.php");
extract($_REQUEST);
$proc = mssql_init("FU_SP_GET_PRODUCTS_TO_DISPLAY ", $con);
mssql_bind($proc, '@SEARCH_TEXT' , $keyword ,  SQLVARCHAR);

mssql_bind($proc, '@PID'  ,  $pid,  SQLINT4);
$proc_result = mssql_execute($proc);
$record = array();
while($row = mssql_fetch_assoc($proc_result)):
$hash = $row['SUB_PRODUCT_ID'];
$record[$hash] = $row;

endwhile;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
	<title>Fittings Unlimited</title>   
	<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />
	<link rel="stylesheet"  href="css/jqm-docs.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery.mobile-1.0.1.min.js"></script>
				<link rel="stylesheet"  href="css/jquery.mobile-1.0.1.min.css" />

</head>
<body>		
<div data-role="page" class="type-index">	
	
	
	<div data-role="header" data-theme="b" data-position="fixed">
		<h1>Fittings Unlimited, Inc.</h1>
		<a href="index.php" data-icon="home" data-direction="reverse" class="ui-btn-left jqm-home">Home</a>
				<a href="javascript:history.go(-1);" data-icon="back" data-theme="b">Back</a>

	</div>
	
	<div data-role="content">
	
<p><img border='0' src='../images/product-images/<?php echo $pimage; ?>' /></p>
	<?php if(count($record) > 0 ):
	
	 ?>
		
	<p>NOTICE: Selected parts in the domestic sections may actually be imported even though they are domestically acquired. </p>
	<ul data-role="listview">
	<?php foreach($record as $sval):
	?>
	<li><a href="location.php">FUI Part#: <?php echo $sval['SUB_PRODUCT_NO']; ?> <br>Description: <?php echo $sval['SUB_PRODUCT_SHORT_DESC']; ?><br>List Price : <?php echo "$ ".number_format($sval['SPECIAL_PRICE'],2); ?><br></a></li>
	<?php endforeach;?>
	</ul>
	
	<?php endif; ?>
    <span style="float:right;"><img src="images/contactus.png" /></span>
<div>


</div>

<?php
include('footer.php');
?>