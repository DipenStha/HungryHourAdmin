<!DOCTYPE html>
<head>
    <title>Edit Category</title>
</head>
<body style = "background-color: black;">
<div style="text-align:center; padding-top:5%;padding-bottom:5%; margin-top: 160px; height:450x; width:350px;margin-left:610px; background-color:white ">
<form method="POST" action="{{route("category.update_categories",$categories->id)}}" enctype="multipart/form-data"  >
	@csrf
	<label style="font-size:35px">Edit Category</label>
	<p  style="height:35px">
		<input type="text" value="{{$categories->id}}" name="id" id="id" placeholder="category id" required style="height: 30px; width:250px; margin-bottom: 25px; "/>
	</p>
	<p  style="height:35px">
		<input type="text" value="{{$categories->name}}" name="name" id="name" placeholder="food category" required style="height: 30px; width:250px; margin-bottom: 25px; "/>
	</p>
    <input type="submit" name="Add category" id="submitBtn" style="height: 38px; width:255px; background-color:darkcyan;"/>
</form>
<div>
	<button type="button" onclick="window.location.href='{{route('show_categories')}}'" class="btn" id="back" style="height:38px; width:255px; margin-top:15px; background-color:red "> Cancel</button>
</div>
</div>
</body>
</html>