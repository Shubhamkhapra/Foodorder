<!-- Menu ADD -->
<?php include('partials/menu.php'); ?>

<!-- Main Content section starts -->
<div class="main-content">
	<div class="wrapper">
		<h4>Manage Food</h4>

		 <br/>

		 <?php
				if(isset($_SESSION['add']))
				{
					echo $_SESSION['add'];
					unset($_SESSION['add']);
				}
				if(isset($_SESSION['remove']))
				{
					echo $_SESSION['remove'];
					unset($_SESSION['remove']);
				}
				if(isset($_SESSION['delete']))
				{
					echo $_SESSION['delete'];
					unset($_SESSION['delete']);
				}
				if(isset($_SESSION['Unauthorized']))
				{
					echo $_SESSION['Unauthorized'];
					unset($_SESSION['Unauthorized']);
				}
				if(isset($_SESSION['no-category-found']))
				{
					echo $_SESSION['no-category-found'];
					unset($_SESSION['no-category-found']);
				}
				if(isset($_SESSION['update']))
				{
					echo $_SESSION['update'];
					unset($_SESSION['update']);
				}
				if(isset($_SESSION['upload']))
				{
					echo $_SESSION['upload'];
					unset($_SESSION['upload']);
				}
				if(isset($_SESSION['remove-failed']))
				{
					echo $_SESSION['remove-failed'];
					unset($_SESSION['remove-failed']);
				}
				
		?>

		<br />
        <!-- Button  To Add Admin-->
        <a href="add-food.php" class="btn-primary">Add Food</a>

        <br/><br/>

        <table class="tbl_full">
        	<tr>
        		<th>S.No</th>
        		<th>Title</th>
        		
        		<th>Price</th>
        		<th>Image</th>
        		
        		<th>Featured </th>
				<th>Active</th>
        		<th>Actions</th>
        	</tr>

        	<?php 

	        	$sql = "SELECT * FROM tbl_food";

	        	$res = mysqli_query($conn, $sql);

	        	$count = mysqli_num_rows($res);

	        	$sn= 1;

	        	if($count > 0)
	        		{
	        			while($row = mysqli_fetch_assoc($res))
        					{
        						$id = $row['id'];
		        				$title = $row['title'];
		        				
		        				$price = $row['price'];
		        				$image_name = $row['image_name'];
		        				
		        				$featured = $row['featured'];
		        				$active = $row['active'];

		        				?>
		        				<tr>
					        		<td><?php echo $sn++; ?> </td>
					        		<td><?php echo $title; ?></td>
					        		
					        		<td>$<?php echo $price; ?></td>
					        		<td>
					        			<?php 

					        				if($image_name!="")
					        				{
					        					

					        					?>
					        					<img src="<?php echo $SITEURl; ?>images/food/<?php echo $image_name ?>" width="100px" >
					        					<?php

					        				}else
					        					{
					        						echo "<div class='error'> Image Not Added </div>";
					        					}

					        			 ?>
					        				
					        		</td>
					        		
					        		<td><?php echo $featured; ?></td>
					        		<td><?php echo $active; ?></td>
					        		<td> 
					        			<a href="<?php echo $SITEURl ; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-secondary"> Update Food </a>

					        			<a href="<?php echo $SITEURl ; ?>admin/delete-food.php?id=<?php echo $id ; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger"> Delete Food </a>

					        		</td>

					        	</tr>


		        				<?php
		        			}

	        		}else
        			{
        				echo "<tr> <td colspan='7' class = 'error'> Food Not Added Yet. </td> </tr>";
        				echo '<script>alert("No Food  found & you can add Food ")</script>';
        			}
        	?>

             	
        </table>

	</div>
</div>
<!-- Main Content section End -->

<!-- Footer Add -->
<?php include('partials/footer.php'); ?>