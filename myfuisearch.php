<?php ob_start(0);
include("config.php");

$keyword = $_REQUEST['keyword'];

if($keyword)
{
			 

$proc = mssql_init("FU_SP_GET_PRODUCTS_TO_DISPLAY_BY_SEARCH ", $con);
mssql_bind($proc, '@SEARCH_TEXT' , $keyword ,  SQLVARCHAR);

mssql_bind($proc, '@PID',    $pid,  SQLINT4);
$proc_result = mssql_execute($proc);

$res = mssql_fetch_object($proc_result);

$searchValCount = $res->computed;
$res = ($searchValCount == '0' ) ? 'product' : 'supplier' ;
header("location:search-list.php?list=$res&keyword=$keyword");

}


?>
<!DOCTYPE html> 
<html> 
<head>
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=1.0, user-scalable=no" name="viewport" /> 
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
		<!--<a href="index.php" data-icon="home" data-direction="reverse">Home</a>--><a href="javascript:history.go(-1);" data-icon="back" data-theme="b">Back</a>
		
	</div><!-- /header -->

	<div data-role="content" data-theme="c" role="main" class="ui-content">

<div style="height:10px;">&nbsp;</div>
<form class="ui-body ui-body-a ui-corner-all" method="get" action="fuisearch.php">
				<fieldset>
					<div data-role="fieldcontain" class="ui-field-contain ui-body ui-br">
					<input value="<?php echo $_REQUEST['keyword']; ?>" type="text" name="keyword" style="height:60px !important; font-size: 1.1em !important;" autocomplete="off" >
                    </div>
					<button value="submit-value" name="submit" data-theme="b" type="submit" class="ui-btn-hidden" aria-disabled="false" id="search"><div style="align:left !important; text-align:left;">SEARCH</div></button>
				</fieldset>
                <!--<div style="width:425px !important; height: 83px !important; opacity:100 !important; filter:alpha(opacity=100) !important; /* For IE8 and earlier */ background-color: transparent;">
                    <INPUT TYPE="image" SRC="images/searchbutton.jpg" BORDER="0" ALT="Submit Form" style="height:83px !important; opacity:100 !important; filter:alpha(opacity=100) !important; margin-left: -10px !important;">
</div>-->
			</form>
</br></br></br></br>
<?php 
	if($keyword)
	{
	if(count($product_records) > 0 ):
	
	 ?>
	<ul data-role="listview" class="ui-listview">
	<?php foreach($product_records as $val):
	?>
	<li><a href="product-detail.php?pid=<?php echo $val['product_id']; ?>&pimage=<?php echo $val['product_image'] ?>">Product Name: <?php echo $val['product']; ?> <br>Description: <?php echo $val['desc']; ?><br>List Price : $<?php echo number_format($val['price'],2);?></a></li>
	<?php endforeach;?>
	</ul>
	<?php else: ?>
	
	<p>NOTICE: Selected parts in the domestic sections may actually be imported even though they are domestically acquired. </p>
	<ul data-role="listview">
	<?php foreach($supp_records as $sval):
	?>
	<li><a href="product-detail.php?pid=<?php echo $sval['product_id']; ?>&pimage=<?php echo $sval['product_image'] ?>">Supplier Part#: <?php echo $sval['supplier_part']; ?> <br>Supplier Name: <?php echo $sval['supplier_name']; ?><br>FUI Part#: <?php echo $sval['fui_part']; ?></a></li>
	<?php endforeach;?>
	</ul>
	
	<?php endif; 
	
	}
	
	?>
	

</div><!-- /content -->

	<div data-role="footer" data-theme="b" data-position="fixed">
<center>
	<div class="bottom_links">
	<a href="index.php"><img alt="Home" src="images/home.png" border="0" style="width:100px !important; margin-left: -15px;"></a>&nbsp;<a href="convertersframe.html"><img alt="Tools" src="images/tools.png" border="0" style="width:100px !important; "></a>&nbsp;<a href="browse.php"><img alt="Products" src="images/product.png" border="0" style="width:100px !important;"></a>&nbsp;<a href="myfuisearch.php"><img alt="Search" src="images/search.png" border="0" style="width:100px !important; "></a>&nbsp;<a href="location.php"><img alt="Locations" src="images/location.png" border="0" style="width:100px !important; "></a>
    </div>
</center>
		<h1>&copy; Copyright  2012 Fittings Unlimited. All Rights Reserved.</h1>
	</div>
	
</div><!-- /page -->

</body>
</html>
