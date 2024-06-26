<?php
ob_start();
session_start();
if (!isset($_SESSION['email'])) {
	echo "<script>alert('Please login first!') </script>";
	echo "<script>open('login.php', '_self') </script>";
}
include('connections/localhost.php');

?>

<?php include("includes/header.php"); ?>


<?php include("includes/navbar.php"); ?>

<body>
<body>
	<h2 class="h-auto">Your Cart</h2>
	<?php
	
	$customeremail = mysqli_real_escape_string( $conn, $_SESSION[ 'email' ] );
	$query = "SELECT * \n"
    . "FROM `cart` \n"
    . "INNER JOIN `products` ON cart.product_id = products.productID AND cart.customer_email = '$customeremail' \n"
	. "ORDER BY `date_added` DESC";
	$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
	

	$count = mysqli_num_rows($result);
	if ($count == 0) exit('<p align="center"> Your Cart is Empty</p>'); 
	
	//calculate number of items in cart
	$x = 0;
	for( $x=0; $x < $count; ++$x){
		$x =+ $x; 
	}
	?>
	<div class="container-down">
			<?php
			global $totalCost;
			$totalCost = 0;
			while ($row = mysqli_fetch_array($result)) {
				$totalCost = $totalCost + (int)$row['price'];
			?>
				<div class="item-box-row">
					<!-- START OF single item box -->
					<div> <img src="<?php echo basename('uploads/') . "/" .  $row['product_image']; ?>" width="200" height="200"> </div>
					<div> <p><?php echo $row['productname'] ?> </p>
						<p style="color: crimson"><strong><?php echo "RS. " . $row['price'] ?></strong> </p>
						<p><a href="removefromcart.php?del=<?php echo $row['cart_id'] ?>"><button class="button"> Remove from Cart</button></a></p>
					</div>
					
				</div>
				<!-- END OF single item box -->
		<?php
			}
		?>
		</div>
		<br> 
		<hr>
<div class="floaty">
		<h2 style="color: crimson" align="center"> Cart Summary: </h2>
		<h3 align="center">No. of Items: <?php echo $x ."</h3>" ?>
		<h3 align="center">Total Cost = RS.  <?php echo $totalCost ."</h3>" ?>
		<p align="center"><a href="checkout.php"><button class="button-green">Continue to Checkout</button></a></p>
		</div>
		<br>
		<?php $_SESSION['totalCost'] = $totalCost; ?>
		<hr>
</br>
</br>
	<?php include("includes/footer.php"); ?>
</body>
</html>