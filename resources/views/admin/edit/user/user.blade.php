<!DOCTYPE html>
<head>
    <title>Add Users</title>
</head>
<body style = "background-color: black;">
<div style="text-align:center; padding-top:5%;padding-bottom:5%; margin-top: 160px; height:450x; width:350px;margin-left:610px; background-color:white">
<form method="POST" action="{{route("user.update_users",$users->id)}}" enctype="multipart/form-data">
	@csrf
	<label style="font-size:35px">Edit User</label>
	<p style="height:35px">
		<input type="text" value="{{$users->name}}" name="name" id="name" style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
	<p  style="height:35px">
		<input type="text" value="{{$users->email}}" name="email" id="email" style="height: 30px; width:250px; margin-bottom: 25px; "/>
	</p>
	<p style="height:35px">
		<input type="file" name="photo" value="{{'$users->photo'}}" id="photo" placeholder="photo" style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
	    <input type="submit" name="submit" id="Add" style="height: 38px; width:255px; background-color:darkcyan;"/>
</form>
<div>
	<button type="button" onclick="window.location.href='{{route('show_users')}}'" class="btn" id="back"  style="height:38px; width:255px; margin-top:15px; background-color:red "> Cancel</button>
</div>
</div>
</body>
</html>