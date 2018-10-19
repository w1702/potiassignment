<!DOCTYPE HTML>
<?php session_start() ?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Programming on the Internet Assignment 1 - Online Grocery Store">
		<title>Online Grocery Store</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
		<!-- load css -->
		<link rel="stylesheet" type="text/css" href="custom.css">
	</head>
	<body style="padding: 1%;">
		<h2>Checkout Complete!</h2>
		<?php

			echo "<p>Thank you " . $_POST['name'] . " your order is complete, your receipt is sent to " . $_POST['email'] . ".</p>";

			$message = "<p style='font-weight:bold;'>Your receipt:</p>";

			// Display all products
			$message .= "<table width='400px'>";
			$message .= "<tr style='font-weight:bold;'><td> Product</td><td>Price ea.</td><td>Sub-Total</td></tr>";
			for($i=0; $i<count($_SESSION["allProducts"]); $i++){

				$message .= "<tr>
				<td>" . $_SESSION["allProducts"][$i]["purchase_amount"] . " x " .
				$_SESSION["allProducts"][$i]["product_name"] . "</td><td>$"  . $_SESSION["allProducts"][$i]["unit_price"] . "</td>" . "<td>$" . ($_SESSION["allProducts"][$i]["unit_price"]*$_SESSION["allProducts"][$i]["purchase_amount"]) . "</td>" .
				"</tr>";
			}

			// Calculate and Display Total Sum
			$message .= "<tr style='font-weight:bold;'><td>Paid:</td>";
			$_SESSION["total"] = 0;
			for($i=0; $i<count($_SESSION["allProducts"]); $i++){
				$_SESSION["total"] += ($_SESSION["allProducts"][$i]["unit_price"]*$_SESSION["allProducts"][$i]["purchase_amount"]);
			}
			$message .= "<td></td><td>$" . $_SESSION["total"] . "</td></tr>";
			$message .= "</table>";

			echo $message;
			// if lines are longer than 70 chars, use wordwrap
			// to, subject, message, headers, parameters

			$header = "MIME-Version: 1.0" . "\r\n";
			$header .= "Content-type: text/html;charset=UTF-8";
			mail($_POST['email'], "Online Grocery Store Order", $message, $header);
		?>
	</body>
</html>
