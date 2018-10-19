<script>
	function validateAmount(){
		if(document.getElementById("amount").value>20){
			alert("Maximum of 20");
			return false;
		}
		return true;
	}
</script>
<!-- Product Details -->
<div id="col2-top">
	<h2>Product Details</h2>
	<form action="index.php" method="post" onsubmit="return validateAmount();">
		<?php
			/* Query database */
			$dbc = new mysqli(DB_HOST, DB_QUERY_USER, DB_QUERY_PASS, DB_POTI);

			if(mysqli_connect_errno()){
				echo "Connection Failed <br>";
				exit;
			}

			$sqlquery = 'SELECT * FROM products WHERE ' . 'product_id =' . $_POST["id"] . ';';

			$result = $dbc->query($sqlquery);

			if(mysqli_num_rows($result) > 0){
				echo "<table width='100%'>";

				//session_start();
				if(empty($_SESSION["allProducts"])){
					$_SESSION["allProducts"] = array();
				}
				if(empty($_SESSION["singleProduct"])){
					$_SESSION["singleProduct"] = array();
				}

				while($a_row = mysqli_fetch_assoc($result)){
					echo '<tr><td>Product ID:</td><td>' . $a_row["product_id"] . '</td></tr>';
					echo '<tr><td>Product Name:</td><td>' . $a_row["product_name"] . '</td></tr>';
					echo '<tr><td>Unit Price:</td><td>' . "$" . $a_row["unit_price"] . '</td></tr>';
					echo '<tr><td>Unit Quanity:</td><td>' . $a_row["unit_quantity"] . '</td></tr>';
					echo '<tr><td>In Stock:</td><td>' . $a_row["in_stock"] . '</td></tr>';

					$product["product_id"] = $a_row["product_id"];
					$product["product_name"] = $a_row["product_name"];
					$product["unit_price"] = $a_row["unit_price"];
					$product["unit_quantity"] = $a_row["unit_quantity"];
					$product["in_stock"] = $a_row["in_stock"];

					$_SESSION["singleProduct"] = $product;
				}
				echo "</table>";
				echo '<input type="number" name="purchase_amount" id="amount" value="1">';
				echo '<input type="submit" name="addToCart" value="Add to Cart" id="addToCart">';


			}
			else{
				echo "<p>Select a product.<p>";
			}
		?>
	</form>
</div>
