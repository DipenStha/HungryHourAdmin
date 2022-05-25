<!DOCTYPE html>
<head>
    <title>Edit Area</title>
</head>
<body style = "background-color: black;">
<div style="text-align:center; padding-top:5%;padding-bottom:5%; margin-top: 170px; height:450x; width:350px;margin-left:610px; background-color:white">
<form method="POST" action="{{route("area.update_areas",$areas->id)}}" >
	<label style="font-size:35px">Edit Area</label>
	@csrf
    <p style="height:35px">
		<input type="text" value="{{$areas->id}}" name="id" id="id" placeholder="id" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
    <p style="height:35px">
		<input type="text" value="{{$areas->area_name}}" name="area_name" id="area_name" placeholder="area name" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
    <input type="submit" name="submit" id="submitBtn" style="height: 38px; width:255px; background-color:darkcyan;"/>
</form>
<div>
	<button type="button" onclick="window.location.href='{{route('show_areas')}}'" class="btn" id="back" style="height:38px; width:255px; margin-top:15px; background-color:red "> Cancel</button>
</div>
</div>
</body>
</html>