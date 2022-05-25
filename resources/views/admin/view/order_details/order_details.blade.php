<!DOCTYPE html>

<head>
    <title>Restaurant</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            border-style: grove;
            width: 98%;
            margin: 15px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
        tr:nth-child(1) {
            background-color: lightseagreen;
        }

        #edit {
            width: 90px;
            height: 30px;
            background-color: lightseagreen;
            border-radius: 10px;
        }

        #delete {
            width: 90px;
            height: 30px;
            background-color: red;
            border-radius: 10px;
            float: right;
        }

        #add {
            width: 140px;
            height: 35px;
            background-color: turquoise;
            border-radius: 10px;
            float: right;
            margin-right: 175px;
            margin-bottom: 15px;
        }

        .button {
            padding: 5px 10px;
        }

        .column {
            font-size: 25px;
            font-weight: bold;
            color: teal;
        }

        /* Style the navigation bar */
        .navbar {
            background-color: #555;
            overflow: auto;
            position: sticky;
        }

        /* Navbar links */
        .navbar a {
            float: left;
            padding: 12px;
            color: white;
            text-decoration: none;
            border: 1px dotted black;
            font-size: 17px;
            text-align: center;
        }

        /* Navbar links on mouse-over */
        .navbar a:hover {
            background-color: #000;
        }

        /* Current/active navbar link */
        .active {
            background-color: #04AA6D;
        }

        /* Add responsiveness - will automatically display the navbar vertically instead of horizontally on screens less than 500 pixels */
        @media screen and (max-width: 500px) {
            .navbar a {
                float: none;
                display: block;
            }
        }
        .button {
            padding: 5px 10px;
        }

        button {
            position: relative;
            border: none;
            transition: .4s ease-in;
            z-index: 1;
            cursor: pointer;
        }

        button::before,
        button::after {
            position: absolute;
            content: "";
            z-index: -1;
        }

        .button:hover {
            background: #ff96ad;
            box-shadow: 0 0 5px #04AA6D, 0 0 25px #ff96ad, 0 0 50px #ff96ad, 0 0 200px #ff96ad;

        }

        footer {
            position: relative;
            left: 0;
            bottom: 0;
            width: 100%;
            margin-top: 30px;
            background-color: orange;
            color: white;
            text-align: center;
            padding-top: 2px;
            height: 45px;
        }

        .column {
            float: left;
            width: 48.5%;
            height: 75px;
            padding-bottom: 15px;
        }

        .container {
            width: 96%;
            display: table;
            clear: both;
            margin: 10px;
        }

        .container:before,
        .container:after {
            display: table;

        }

        .container div {
            float: left;
            padding: 5px;
            font-size: 20px;
            border: 1px solid black;
            border-radius: 10px;
            width: 100%;
            height: 290px;
        }

        #box1 {
            background-color: white;
            margin: 10px;
        }

        #box2 {
            background-color: white;
            margin-right: 10px;
            font-size: 18px;
            width: 430px;
            height: 250px;
            padding: 15px;
            margin-right: 20px;
        }

        #box3 {
            background-color: white;
            margin-right: 10px;
            font-size: 18px;
            width: 430px;
            height: 190px;
            padding: 15px;
            margin-right: 20px;
        }

        #box4 {
            background-color: white;
            margin-right: 10px;
            font-size: 18px;
            width: 390px;
            height: 110px;
            padding: 15px;
            
        }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="background-color: white;">
    <div class="row" style="background-color:bisque">
        <div class="column">
            <h1 style="padding-left: 20px; font-size: 35px;"><span class="lab la-hungryhour"></span>HungryHour</h1>
        </div>
        <div class="column">
            <img src="{{ url(auth()->user()->photo) }}" width="80" height="80" alt="User"
                style="float:right; margin-right: 5px; border-radius:50%; background-color:#dddddd; ">
        </div>
        <div class="user-wrapper" style="float: right; margin-right:50px; margin-bottom: 10px">
            <small>{{ auth()->user()->name }}</small>
        </div>
    </div>
    <div class="navbar" style="margin-left: 20px;  width: 97%;">
        <a href="{{ route('admin_home') }}" style="width:130px; height: 35px; font-size: 22px;"><i
                class="fa fa-fw fa-home"></i>Dashboard</a>
        <a href="{{ route('show_users') }}" style="width:90px; height: 35px; font-size: 22px;"> User</a>
        <a href="{{ route('show_restaurants') }}" style="width:90px; height: 35px; font-size: 22px;">Restaurant</a>
        <a href="{{ route('show_categories') }}" style="width:90px; height: 35px; font-size: 22px;"> Category</a>
        <a href="{{ route('show_foods') }}" style="width:90px; height: 35px; font-size: 22px;">Food</a>
        <a href="{{ route('show_areas') }}" style="width:90px; height: 35px; font-size: 22px;">Area</a>
        <a href="{{ route('show_orders') }}" style="width:90px; height: 35px; font-size: 22px;">Orders</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            style="width:90px; height: 35px; font-size: 22px;"> Logout</a>
    </div>

    <div class="main-content" style="margin:23px; padding-top: 10px; border-radius:10px">
        <div style="height:15px; padding-left:22px; padding-top:12px; padding-bottom:20px;">
            <label style="font-size: 20px; font-weight:bold">Order Number: {{ $order_details->id }}</label>
        </div>
        <div class="container">
            <div class="row" id="box1">
                <table>
                    <tr>
                        <th>Restaurant</th>
                        <th>Food</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total Price</th>
                    </tr>
                    @foreach ($order_details->details as $detail)
                        <tr>
                            <td>{{ $detail->food->restaurant->name }}</td>
                            <td>{{ $detail->food->name }}</td>
                            <td>{{ $detail->quantity}}</td>
                            <td>{{ $detail->food->price}}</td>
                            <td>{{ $detail->total*$detail->quantity}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="container" style="margin-left:15px">
            <div class="box" id="box2">
                <label style="font-size:18px; font-weight:bold">Order Summary</label>
                <p>Order Date: {{ $order_details->order_date }}</p>
                <p>Sub total: {{ $order_details->sub_total }}</p>
                <p>Delivery Charge: {{ $order_details->delivery_charge }}</p>
                <p>Service Charge: {{ $order_details->service_charge }}</p>
                <p>VAT amount: {{ $order_details->vat_amount }}</p>
                <p>Total: {{ $order_details->order_total }} </p>
            </div>
            <div class="box" id="box3">
                <label style="font-size:18px; font-weight:bold; text-align:center">Delivery Address</label>
                <p>Area: {{ $order_details->address->area->area_name }}</p>
                <p>Street Number: {{ $order_details->address->street }}</p>
                <p>House Number: {{ $order_details->address->house_no }} </p>
                <p>Nearby Landmark: {{ $order_details->address->nearby_landmark }} </p>
            </div>
            <div class="box" id="box4">
                <label style="font-size:18px; font-weight:bold">Customer Details</label>
                <p>Name: {{ $order_details->user->name }} </p>
                <p>Phone No.: {{ $order_details->address->contact_number1 }} / {{ $order_details->address->contact_number_2 }}</p>
            </div>
        </div>
</body>
<footer>
    <p style="text-align: center;"> &copy; HungryHour. All rights reserved.</p>
</footer>

</html>
