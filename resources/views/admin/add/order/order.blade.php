<!DOCTYPE html>
<head>
    <title>Add Order</title>
</head>
<body style = "background-color: black;">
<div style="text-align:center; padding-top:5%;padding-bottom:5%; margin-top: 60px; height:450x; width:350px;margin-left:610px; background-color:white">
<form method="POST" action="{{route("order.create")}}" enctype="multipart/form-data" >
	<label style="font-size:35px">Add Order</label>
	
	<p  style="height:35px">
		<input type="text" name="id" id="id" placeholder="Order ID" required style="height: 30px; width:250px; margin-bottom: 25px; "/>
	</p>
    <p  style="height:35px">
		<input type="text" name="user_id" id="user_id" placeholder="User ID" required style="height: 30px; width:250px; margin-bottom: 25px; "/>
	</p>
    <p  style="height:35px">
		<input type="text" name="delivery_address_id" id="delivery_address_id" placeholder="Delivery Address ID" required style="height: 30px; width:250px; margin-bottom: 25px; "/>
	</p>
	<p style="height:35px; padding-left: 34px"> Logo: 
		<input type="file" name="logo" id="logo" placeholder="Restaurant Logo" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
	<p  style="height:35px">
		<input type="text" name="delivery_address_id" id="delivery_address_id" placeholder="Delivery Address ID" required style="height: 30px; width:250px; margin-bottom: 25px; "/>
	</p>
	<p style="height: 106px; width:255px; margin-bottom: 25px; background-color:white; margin-left: 47px">
		<label>Opeing time
			<input type="time" name="opening_from" id="open" placeholder="open_time" required style="height: 30px; width:250px; margin-bottom: 11px;"/>
		</label>
		<label>Closing time
			<input type="time" name="closing_at" id="close" placeholder="close_time" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
		</label>	
	</p>
    <input type="submit" id="submitBtn" style="height: 38px; width:255px; background-color:darkcyan;"/>
</form>
<div>
	<button type="button" onclick="window.location.href='{{route('show_orders')}}'" class="btn" id="back" style="height:38px; width:255px; margin-top:15px; background-color:red "> Cancel</button>
</div>
</div>
</body>
</html>