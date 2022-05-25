<!DOCTYPE html>

<head>
	<title>Add Food</title>
</head>

<body style="background-color: black;">
	<div style="text-align:center; padding-top:5%;padding-bottom:5%; margin-top: 140px; height:450x; width:350px;margin-left:610px; background-color:white ">
		<form method="POST" action="{{route("food.create")}}" enctype="multipart/form-data">
			<label style="font-size:35px">Add Food</label>
			<p style="height: 30px; border: 1px solid black; width:258px; margin-bottom: 25px; margin-left:45px; background-color:white;">
				<label>Restaurant Name
					<select id="restaurant_id" name="restaurant_id">
						<option value="" selected="selected">Select One</option>
						@foreach ($restaurants as $restaurant)
						<option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
						@endforeach
					</select>
				</label>
			</p>
			@csrf
			<p style="height:35px">
				<input type="text" name="name" id="name" placeholder="food name" required
					style="height: 30px; width:250px; margin-bottom: 25px;" />
			</p>
			<p style="height:35px">
				<input type="text" name="price" id="price" placeholder="food price" required
					style="height: 30px; width:250px; margin-bottom: 25px; " />
			</p>
			<p style="height: 30px; border: 1px solid black; width:258px; margin-bottom: 25px; margin-left:45px; margin-bottom: 25px; background-color:white;">
				<label>Food category 
					<select id="category_id" name="category_id">
						<option value="" selected="selected">Select One</option>
						@foreach ($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</label>
			</p>
			<input type="submit"id="submitBtn" style="height: 38px; width:265px; background-color:darkcyan;" />
			
		</form>
		<div>
			<button type="button" onclick="window.location.href='{{route('show_foods')}}'" class="btn" id="back"  style="height:38px; width:265px; margin-top:15px; background-color:red "> Cancel</button>
		</div>
	</div>
</body>
</html>