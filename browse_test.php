<?php
include("config.php");

include('header.php');

			
			
			$query="SELECT material_id,MATERIAL_Name FROM FU_PRODUCT_MATERIAL WHERE IS_ACTIVE='Y'";
			$result=mssql_query($query,$con);
			
			
			?>
			
			
			<ul data-role="listview" data-theme="b" data-inset="true">

				
			
			
				
				<?php while($row=mssql_fetch_array($result))
			{
			?>
				
					<li><?php echo $row['MATERIAL_Name'];
							$mid = $row['material_id'];
					?>
						
						<ul data-theme="c" data-role="listview" >
						<?php 
						
						$sqlQry = "select '''#''' as LINK, CATEGORY_NAME AS CATEGORYNAME, MATERIAL_CATEGORY_LINKING_ID, MATERIAL_ID,L.CATEGORY_ID,c.category_id from fu_product_category c, FU_MATERIAL_CATEGORY_LINKING L where c.category_id=l.category_id and l.MATERIAL_ID = $mid and c.Is_Active='Y' Order By c.Category_Id";
						$sqlQryex = mssql_query($sqlQry);
						while($catRow = mssql_fetch_array($sqlQryex)):
						?>
						
							<li><?php echo $catRow['CATEGORYNAME']; 
							$catId = $catRow['category_id']; 
							?>
						
						<ul data-theme="c">
					<?php
							$sqlQry2 = "select *,(select sub_category_name from fu_product_sub_category sc where sc.SUB_CATEGORY_ID=l.SUBCATEGORY_ID) as SUBCATEGORY from FU_CATEGORY_SUBCATEGORY_LINKING L where CATEGORY_ID = $catId and SUBCATEGORY_ID in (select SUB_CATEGORY_ID from FU_PRODUCT_SUB_CATEGORY WHERE IS_ACTIVE='Y')";
						$sqlQryex2 = mssql_query($sqlQry2);
						while($subcatRow = mssql_fetch_array($sqlQryex2)):
						$subid = $subcatRow['SUBCATEGORY_ID'];
							 ?>
							 <li><a href="product-list.php?cid=<?php echo $catId?>&scid=<?php echo $subid?>" data-transition="slide"><?php echo $subcatRow['SUBCATEGORY']; ?></a></li>
						<?php endwhile; ?>
							
												
						</ul>
						
					</li>	
					
					<?php endwhile; ?>
					
									
						</ul>
						
						
					</li>
					<?php
			
						
			
			}
			
			?>
					
					
				</ul>	
<?php include('footer.php'); ?>