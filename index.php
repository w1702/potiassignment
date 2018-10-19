<!-- All button images are made with an online tool at https://dabuttonfactory.com/ -->
<!DOCTYPE HTML>
<?php session_start() ?>
<?php require_once "dbfiles/db_settings.inc"; ?>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="description" content="Programming on the Internet Assignment 1 - Online Grocery Store">
		<title>Online Grocery Store</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
		<!-- load css -->
		<link rel="stylesheet" type="text/css" href="custom.css">
	</head>
	<body>
		<div id="content">
				<!-- Column 1 - Product Display -->
				<!-- All button images are made with an online tool at https://dabuttonfactory.com/ -->
				<h1>Online Grocery Store</h1>
				<?php include "moduleProductMenu.php" ?>
				<!-- Column 1 ends -->
				<!-- Column 2  -->
				<div id="col2">
					<!-- col2-top Product Details Displayed-->
					<?php include "moduleProductDetails.php" ?>
					<!-- col3-bottom Shopping Cart -->
					<?php include "moduleShoppingCart.php" ?>
				</div>
				<!-- Column 2 ends -->
				<div class="clear"></div>
		</div>
	</body>
</html>
