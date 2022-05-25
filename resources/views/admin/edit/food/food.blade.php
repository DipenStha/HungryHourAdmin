<!DOCTYPE html>

<head>
	<title>Add Food</title>
</head>

<body style="background-color: black;">
	<div style="text-align:center; padding-top:5%;padding-bottom:5%; margin-top: 140px; height:450x; width:350px;margin-left:610px; background-color:white">
		<form method="POST" action="{{route("food.update_foods",$foods->id)}}" enctype="multipart/form-data" >
			<label style="font-size:35px">Edit Food</label>
			<p style="height: 30px;border: 1px solid black; width:258px; margin-bottom: 25px; margin-left:45px; background-color:white;">
				<label>Restaurant Name
					<select id="restaurant_id" name="restaurant_id">
						<option  value="{{$foods->restaurant_name}}" selected="selected">Select One</option>
						@foreach ($restaurants as $restaurant)
						<option  @if ($foods->restaurant_id == $restaurant->id)
							selected
						@endif 
						 value="{{$restaurant->id}}">{{$restaurant->name}}</option>
						@endforeach
					</select>
				</label>
			</p>
			@csrf
			<p style="height:35px">
				<input type="text" value="{{$foods->name}}" name="name" id="name" placeholder="food name" required
					style="height: 30px; width:250px; margin-bottom: 25px;" />
			</p>
			<p style="height:35px">
				<input type="text" value="{{$foods->price}}" name="price" id="price" placeholder="food price" required
					style="height: 30px; width:250px; margin-bottom: 25px; " />
			</p>
			<p style="height: 30px; border: 1px solid black; width:258px; margin-bottom: 25px; margin-left:45px; margin-bottom: 25px; background-color:white;">
				<label>Food category 
					<select id="category_id" name="category_id">
						<option value="{{$foods->category_id}}" selected="selected">Select One</option>
						@foreach ($categories as $category)
						<option @if ($foods->category_id == $category->id)
							selected
						@endif value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</label>
			</p>
			<input type="submit" name="Add" id="submitBtn"
				style="height: 38px; width:260px; background-color:darkcyan;" />
		</form>
		<div>
			<button type="button" onclick="window.location.href='{{route('show_foods')}}'" class="btn" id="back" style="height:38px; width:260px; margin-top:15px; background-color:red "> Cancel</button>
		</div>
	</div>
</body>
</html>