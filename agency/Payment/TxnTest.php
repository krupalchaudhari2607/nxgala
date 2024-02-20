<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
	
	$pay_amount = $_POST['pay_price'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
<style>
	form{
		background: #ccc;
		display: flex;
		position: relative;
		flex-wrap: wrap;
		padding: 10px 15px;
		justify-content: space-between;
		text-align: center
	}
	form input{
		padding: 15px;
		border-radius: 10px;
		width: 75%;
	}
	form input[type="submit"]{
		width: 20%;
	}
</style>
</head>
<body>
	<!-- <h1>Merchant Check Out Page</h1> -->
	<pre>
	</pre>
	<form method="post" action="pgRedirect.php">

					<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
				
					<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001"></td>

				<input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
					<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
				<input title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="<?php echo $pay_amount ?>" readonly>
				
					<input value="CheckOut" type="submit"	onclick="">
			
	</form>
</body>
</html>