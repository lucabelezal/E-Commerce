		<div class="content">

			<?php if($row = mysqli_fetch_assoc($result)){ ?>
			<img src="img/<?php echo $row["id"] ?>">	
			<h2><?php echo $row["name"] ?></h2>
			<p>
				Product ID: <?php echo $row["id"] ?><br />
				Price: <?php echo $row["price"] ?> Tk.
			</p>
			<?php }
			else
				echo "This product does not exist or may be removed.";
			?>

		</div>


											<?php if($row = mysqli_fetch_assoc($result)){ ?>

									<h1 class="product-name"><?php echo $row["name"] ?></h1>
									
									<?php }
									else
										echo "";
									?>




									<?php if($row = mysqli_fetch_assoc($result)){ ?>
										<img id="product-zoom" src="img/<?php echo $row["id"] ?>" data-zoom-image="img/<?php echo $row["id"] ?>">	
										<h2><?php echo $row["name"] ?></h2>
										<?php }
										else
											echo "This product does not exist or may be removed.";
										?>