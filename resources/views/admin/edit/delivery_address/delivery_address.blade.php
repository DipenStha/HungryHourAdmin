<!DOCTYPE html>
<head>
    <title>Edit Area</title>
</head>
<body style = "background-color: black;">
<div style="text-align:center; padding-top:5%;padding-bottom:5%; margin-top: 30px; height:450x; width:350px;margin-left:610px; background-color:white">
<form method="POST" action="{{route("delivery_address.update_delivery_addresses",$delivery_addresses->id)}}" enctype="multipart/form-data">
	<label style="font-size:35px">Edit Area</label>
	@csrf
    <p style="height:35px">
		<input type="text" value="{{$delivery_addresses->first_name}}" name="first_name" id="first_name" placeholder="first name" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
    <p style="height:35px">
		<input type="text" value="{{$delivery_addresses->last_name}}" name="last_name" id="last_name" placeholder="last name" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
    <p style="height:35px">
		<input type="text" value="{{$delivery_addresses->contact_number1}}" name="contact_number1" id="contact_number1" placeholder="contact number1" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
    <p style="height:35px">
		<input type="text" value="{{$delivery_addresses->contact_number_2}}" name="contact_number_2" id="contact_number_2" placeholder=" contact number2" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
    <label>Area Name
        <select id="area_id" name="area_id">
            <option value="{{$delivery_addresses->areas_id}}" selected="selected">Select One</option>
            @foreach ($areas as $area)
            <option @if ($delivery_addresses->areas_id == $area->id)
                selected
            @endif value="{{$area->id}}">{{$area->area_name}}</option>
            @endforeach
        </select>
    </label>
    <p style="height:35px">
		<input type="text" value="{{$delivery_addresses->street}}" name="street" id="street" placeholder="street" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
    <p style="height:35px">
		<input type="text" value="{{$delivery_addresses->house_no}}" name="house_no" id="house_no" placeholder="house no" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
    <p style="height:35px">
		<input type="text" value="{{$delivery_addresses->nearby_landmark}}" name="nearby_landmark" id="nearby_landmark" placeholder="nearby landmark" required style="height: 30px; width:250px; margin-bottom: 25px;"/>
	</p>
    <input type="submit" name="submit" id="submitBtn" style="height: 38px; width:255px; background-color:darkcyan;"/>
</form>
<div>
	<button type="button" onclick="window.location.href='{{route('show_delivery_addresses')}}'" class="btn" id="back" style="height:38px; width:255px; margin-top:15px; background-color:red "> Cancel</button>
</div>
</div>
</body>
</html>