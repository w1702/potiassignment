<!-- Shopping Cart -->
<div id="col2-bottom">
	<h2>Shopping Cart</h2>
	<?php
		// To view contents of array
		//print_r($_SESSION["allProducts"]);
		//OR
		//var_dump($_SESSION["allProducts"]);
		function addToCart(){
			array_push($_SESSION["allProducts"], $_SESSION["singleProduct"]);
		}
		function clearCart(){
			session_unset();
			session_destroy();
		}

		//session_start();
		$_SESSION["singleProduct"]["purchase_amount"] = $_POST["purchase_amount"];

		if(isset($_POST["addToCart"])){
			addToCart();
		}

		if(empty($_SESSION["allProducts"])){
			echo "Your shopping cart is empty.";
		}
		else{
			// Display all products
			echo "<table width='100%'>";
			echo "<tr style='font-weight:bold;'><td> Product</td><td>Price ea.</td><td>Sub-Total</td></tr>";
			for($i=0; $i<count($_SESSION["allProducts"]); $i++){

				echo "<tr>
				<td>" . $_SESSION["allProducts"][$i]["purchase_amount"] . " x " .
				$_SESSION["allProducts"][$i]["product_name"] . "</td><td>$"  . $_SESSION["allProducts"][$i]["unit_price"] . "</td>" . "<td>$" . ($_SESSION["allProducts"][$i]["unit_price"]*$_SESSION["allProducts"][$i]["purchase_amount"]) . "</td>" .
				"</tr>";
			}

			// Calculate and Display Total Sum
			echo "<tr style='font-weight:bold;'><td>Grand Total:</td>";
			$_SESSION["total"] = 0;
			for($i=0; $i<count($_SESSION["allProducts"]); $i++){
				$_SESSION["total"] += ($_SESSION["allProducts"][$i]["unit_price"]*$_SESSION["allProducts"][$i]["purchase_amount"]);
			}
			echo "<td></td><td>$" . $_SESSION["total"] . "</td></tr>";
			echo "</table>";


			//Checkout button
			echo '<form action="checkout.php" method="post" style="float:left;">
				<input type="submit" name="checkout" value="Check Out">
			</form>';

			// Clear cart button
			echo '<form action="index.php" method="post" style="float:left;">
				<input type="submit" name="clear" value="Clear Cart">
			</form>';
			if(isset($_POST["clear"])){
				clearCart();
				echo'<script>location.href="index.php"</script>';
			}
		}
	?>
	<div class="clear"></div>
</div>
