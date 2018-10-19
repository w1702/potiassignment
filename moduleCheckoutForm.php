<!-- Checkout form -->
<script type="text/javascript">
function validate(){
	if(document.getElementById("name").value==""){
		alert("Please enter your name");
		return false;
	}
	if(document.getElementById("address").value==""){
		alert("Please enter your address");
		return false;
	}
	if(document.getElementById("suburb").value==""){
		alert("Please enter your suburb");
		return false;
	}
	if(document.getElementById("state").value==""){
		alert("Please enter your state");
		return false;
	}
	if(document.getElementById("country").value==""){
		alert("Please enter your country");
		return false;
	}
	if(document.getElementById("email").value==""){
		alert("Please enter your email");
		return false;
	}
	return true;
}
</script>
<div id="col2-top">
	<h2>Checkout</h2>
	<form action="checkoutComplete.php" method="post" onsubmit="return validate();">
		<table width="100%">
			<tr>
				<td>Name: <span class="red">*</span></td>
				<td><input type="text" name="name" id="name"></td>
			</tr>
			<tr>
				<td>Address: <span class="red">*</span></td>
				<td><input type="text" name="address" id="address"></td>
			</tr>
			<tr>
				<td>Suburb: <span class="red">*</span></td>
				<td><input type="text" name="suburb" id="suburb"></td>
			</tr>
			<tr>
				<td>State: <span class="red">*</span></td>
				<td><input type="text" name="state" id="state"></td>
			</tr>
			<tr>
				<td>Country: <span class="red">*</span></td>
				<td><input type="text" name="country" id="country"></td>
			</tr>
			<tr>
				<td>Email: <span class="red">*</span></td>
				<td><input type="email" name="email" id="email"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="purchase" value="Purchase"></td>
			</tr>
		</table>
	</form>
</div>
