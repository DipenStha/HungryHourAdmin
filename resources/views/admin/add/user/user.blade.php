<!DOCTYPE html>
<head>
    <title>Add Users</title>
</head>
<body style = "background-color: black; margin-top: 140px;">
<div style="text-align:center; padding-top:5%;padding-bottom:5%;  height:450x; width:350px;margin: 0 auto; background-color:white ">
<form method="POST" action="{{route("user.create")}}" enctype="multipart/form-data">
	<label style="font-size:35px">Add User</label>
	@csrf
	<p style="height:35px">
		<input type="text" name="name" id="name" placeholder="name" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
	<p  style="height:35px">
		<input type="text" name="email" id="email" placeholder="email" required style="height: 30px; width:250px; margin-bottom: 25px; "/>
	</p>
	<p  style="height:35px">
		<input type="text" name="password" id="password" placeholder="password" required style="height: 30px; width:250px; margin-bottom: 25px; "/>
	</p>
	<p style="height:35px">
		<input type="file" text="Profile" name="photo" id="photo" placeholder="photo" style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
    <input type="submit" name="submit" id="Add" style="height: 38px; width:255px; background-color:darkcyan;"/>
</form>
<div>
	<button type="button" onclick="window.location.href='{{route('show_users')}}'" class="btn" id="back"  style="height:38px; width:255px; margin-top:15px; background-color:red "> Cancel</button>
</div>
</div>
</body>
</html>