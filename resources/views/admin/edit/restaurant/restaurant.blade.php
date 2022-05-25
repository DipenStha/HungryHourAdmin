<!DOCTYPE html>
<head>
    <title>Edit Restaurant</title>
</head>
<body style=" background-color: black;">
<div style="text-align:center; padding-top:5%;padding-bottom:5%; margin-top: 60px; height:450x; width:350px;margin-left:610px; background-color:white">
	<form method="POST" action="{{route("restaurant.update_restaurants",$restaurants->id)}}" enctype="multipart/form-data" >
		<label style="font-size:35px">Edit Restaurant</label>
		
		<p  style="height:35px">
			<input type="text" name="name" value="{{$restaurants->name}}" id="name" placeholder="name" required style="height: 30px; width:250px; margin-bottom: 25px; "/>
		</p>
		<p style="height:35px">
			<input type="file" name="logo" value="{{$restaurants->logo}}" id="logo" placeholder="logo" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
		</p>
		<p style="height:35px">
			<input type="text" name="address" value="{{$restaurants->address}}" id="address" placeholder="address" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
		</p>
		@csrf
		<p style="height: 110px; width:255px; margin-bottom: 25px; margin-left: 47px;background-color:white; ">
			<label>Opeing time
				<input type="time" name="opening_from" value="{{$restaurants->open_from}}" id="open" placeholder="open_time" required style="height: 30px; width:250px; margin-bottom: 16px;"/>
			</label>
			<label>Closing time
				<input type="time" name="closing_at" value="{{$restaurants->close_at}}" id="close" placeholder="close_time" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
			</label>
		</p>
    <input type="submit" name="Add" id="submitBtn" style="height: 38px; width:255px; background-color:darkcyan;"/>
</form>
<div>
	<button type="button" onclick="window.location.href='{{route('show_restaurants')}}'" class="btn" id="back" style="height:38px; width:255px; margin-top:15px; background-color:red "> Cancel</button>
</div>
</div>
</body>
</html>