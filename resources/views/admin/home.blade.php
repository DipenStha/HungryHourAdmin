<!DOCTYPE html>
<html>

<head>
    <title> HungryHour Admin</title>
    {{-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> --}}
    {{-- <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        
    <!-- <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">--> --}}

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
            margin-left: 130px;
            margin-right: 20px;
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

        button {
            padding: 5px 10px;
            border: none;
            border-radius: 7px
        }

        button:hover {
            background-color: turquoise;
            color: white
        }

        #submit:hover {
            background-color: turquoise;
            color: white
        }

        main {
            margin-bottom: 20px;
        }

        .column {
            float: left;
            width: 48.5%;
            height: 75px;
            padding-bottom: 15px;
        }

        .container {
            width: 97%;
            display: table;
            clear: both;
        }

        .container:before,
        .container:after {
            display: table;

        }

        .container div {
            float: left;
            text-align: center;
            padding: 3px;
            font-size: 20px;
            text-align: justify;
            border: 1px solid grey;
            box-shadow: 1px 1px 5px 5px grey;
            border-radius: 10px;
            width: 150px;
            height: 120px;
            margin-top: 20px;
        }

        #box1 {
            background-color: white;
            margin-left: 10px;
            margin-right: 18px;
            text-align: center
        }

        #box1:hover {
            background-color: lightyellow;
            color: black;
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
    <div class="navbar" style="margin-left: 20px;  width: 97%">
        <a href="{{ route('admin_home') }}" style="width:140px; height: 35px; font-size: 20px;"><i
                class="fa fa-fw fa-home"></i>Dashboard</a>
        <a href="{{ route('show_users') }}" style="width:65px; height: 35px; font-size: 20px;"></i> User</a>
        <a href="{{ route('show_restaurants') }}" style="width:110px; height: 35px; font-size: 20px;">Restaurant</a>
        <a href="{{ route('show_categories') }}" style="width:110px; height: 35px; font-size: 20px;">Category</a>
        <a href="{{ route('show_foods') }}" style="width:65px; height: 35px; font-size: 20px;"></i>Food</a>
        <a href="{{ route('show_areas') }}" style="width:65px; height: 35px; font-size: 20px;"></i>Area</a>
        <a href="{{ route('show_orders') }}" style="width:80px; height: 35px; font-size: 20px;"></i>Orders</a>
        <a href="{{ route('show_delivery_addresses') }}"
            style="width:180px; height: 35px; font-size: 20px;"></i>Delivery Addresses</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
            style="width:90px; height: 35px; font-size: 22px;"> Logout</a>
    </div>
    <p>
    </p>
    {{-- <div class="main-content" style="margin-left:20px">
        <main>
            <div style="text-align:center; padding-top:3%; ">
                <p style="font-size: 30px; font-weight: bold; text-align: left; margin-left: 150px;">Users</p>
                <table>
                    <tr>
                        <th>User id</th>
                        <th>Name</th>
                        <th>email</th>
                        <th></th>
                    </tr>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td><button class="btn" id="edit"><i class="fa fa-pencil"></i>Edit</button>
                           <a href="{{route("user.delete",$user->id)}}"><button class="btn" id="delete"><i class="fa fa-trash"></i>Delete</button></a> 
                        </td>
                    </tr>
                    @endforeach     
                </table> 
            
            </div>
            
            <div style="text-align:center; padding-top:3%; ">
                <p style="font-size: 30px; font-weight: bold; text-align: left; margin-left: 150px;">Restaurants</p>
                <button onclick="window.location.href='{{route('add_restaurants')}}'" class="btn" id="add"><i
                    class="fa fa-plus"></i>Add Restaurant</button>
                <table>
                    <tr>
                        <th>Restaurnat ID</th>
                        <th>Restaurant Name</th>
                        <th>Logo</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                    @foreach ($restaurants as $restaurant)
                    <tr>
                        <td>{{$restaurant->id}}</td>
                        <td>{{$restaurant->name}}</td>
                        <td> <img src="{{url($restaurant->logo)}}" height="40px" width="60px"/> </td>
                        <td>{{$restaurant->address}}</td>
                        <td>{{$restaurant->status}}</td>
                        <td>
                            <a href='{{route('restaurant.edit_restaurants',$restaurant->id)}}'><button class="btn" id="edit"><i class="fa fa-pencil"></i>Edit</button></a>
                            <a href="{{route("restaurant.delete",$restaurant->id)}}"><button class="btn" id="delete"><i class="fa fa-trash"></i>Delete</button></a>
                        </td>
                    </tr>  
                    @endforeach
                    
                </table>
            </div>
            <div style="text-align:center; padding-top:3%; ">
                <p style="font-size: 30px; font-weight: bold; text-align: left; margin-left: 150px;">Categories</p>
                <table>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th></th>
                    </tr>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td><button class="btn" id="edit"><i class="fa fa-pencil"></i>Edit</button>
                            <a href="{{route("category.delete",$category->id)}}"><button class="btn" id="delete"><i class="fa fa-trash"></i>Delete</button></a>
                        </td>
                    </tr> 
                    @endforeach
                    
                </table>
            </div>
            <div style="text-align:center; padding-top:3%; ">
                <p style="font-size: 30px; font-weight: bold; text-align: left; margin-left: 150px;">Foods</p>
                <table>
                    <tr>
                        <th>Food ID</th>
                        <th>Restaurant ID</th>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Category ID</th>
                        <th></th>
                    </tr>
                    @foreach ($foods as $food)
                    <tr>
                        <td>{{$food->id}}</td>
                        <td>{{$food->restaurant_id}}</td>
                        <td>{{$food->name}}</td>
                        <td>{{$food->price}}</td>
                        <td>{{$food->category_id}}</td>
                        <td><button class="btn" id="edit"><i class="fa fa-pencil"></i>Edit</button>
                            <a href="{{route("food.delete",$food->id)}}"><button class="btn" id="delete"><i class="fa fa-trash"></i>Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div style="text-align:center; padding-top:3%; ">
                <p style="font-size: 30px; font-weight: bold; text-align: left; margin-left: 150px;">Areas</p>
                <table>
                    <tr>
                        <th>Area id</th>
                        <th>Area Name</th>
                        <th></th>
                    </tr>
                    @foreach ($areas as $area)
                    <tr>
                        <td>{{$area->id}}</td>
                        <td>{{$area->area_name}}</td>
                        <td><button class="btn" id="edit"><i class="fa fa-pencil"></i>Edit</button>
                            <a href="{{route("area.delete",$area->id)}}"><button class="btn" id="delete"><i class="fa fa-trash"></i>Delete</button></a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div style="text-align:center; padding-top:3%; ">
                <p style="font-size: 30px; font-weight: bold; text-align: left; margin-left: 150px;">Orders</p>
                <table>
                    <tr>
                        <th> ID</th>
                        <th>User Name</th>
                        <th>Delivery Area</th>
                        <th>Order Date</th>
                        <th>Subtotal</th>
                        <th>Delivery Charge</th>
                        <th>Service Charge</th>
                        <th>VAT</th>
                        <th>Order Total</th>
                        <th>IsPaid</th>
                    </tr>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->area_name}}</td>
                        <td>{{$order->order_date}}</td>
                        <td>{{$order->sub_total}}</td>
                        <td>{{$order->delivery_charge}}</td>
                        <td>{{$order->service_charge}}</td>
                        <td>{{$order->vat_amount}}</td>
                        <td>{{$order->order_total}}</td>
                        <td>@if (!$order->isPaid)
                            Paid
                            @endif
                            </td>
                        <td>
                            <a href='{{route('order.edit_orders',$order->id)}}'><button class="button" id="edit"><i class="fa fa-pencil"></i>Edit</button></a>
                            <a href="{{route("order.delete",$order->id)}}"><button class="button" id="delete"><i class="fa fa-trash"></i>Delete</button></a>
                        </td>
                    </tr>  
                    @endforeach
                </table>
            </div>
            <div style="text-align:center; padding-top:3%; ">
                <p style="font-size: 30px; font-weight: bold; text-align: left; margin-left: 150px;">Order Details</p>
                <table>
                    <tr>
                        <th> ID</th>
                        <th>Food ID</th>
                        <th>Order ID</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                    @foreach ($order_details as $order_detail)
                    <tr>
                        <td>{{$order_detail->id}}</td>
                        <td>{{$order_detail->food_id}}</td>
                        <td>{{$order_detail->order_id}}</td>
                        <td>{{$order_detail->quantity}}</td>
                        <td>{{$order_detail->total}}</td>
                        <td>
                            <a href='{{route('order_detail.edit_order_details',$order_detail->id)}}'><button class="button" id="edit"><i class="fa fa-pencil"></i>Edit</button></a>
                            <a href="{{route("order_detail.delete",$order_detail->id)}}"><button class="button" id="delete"><i class="fa fa-trash"></i>Delete</button></a>
                        </td>
                    </tr>  
                    @endforeach
                </table>
            </div>
        </main>
    </div> --}}
    <div class="main-content" style="margin-left:50px">
        <div class="container">
            <div class="column" id="box1">
                <p>Users
                    <br />{{ $user_count }}
                    <br />
                    <br />
                    <button onclick="window.location.href='{{ route('show_users') }}'">View all</button>
                </p>
            </div>
            <div class="column" id="box1">
                <p>Restaurants
                    <br />{{ $restaurant_count }}
                    <br />
                    <br />
                    <button onclick="window.location.href='{{ route('show_restaurants') }}'">View all</button>
                </p>
            </div>
            <div class="column" id="box1">
                <p>Categories
                    <br />{{ $category_count }}
                    <br />
                    <br />
                    <button onclick="window.location.href='{{ route('show_categories') }}'">View all</button>
                </p>

            </div>
            <div class="column" id="box1">
                <p>Foods
                    <br />{{ $food_count }}
                    <br />
                    <br />
                    <button onclick="window.location.href='{{ route('show_foods') }}'">View all</button>
                </p>
            </div>
            <div class="column" id="box1">
                <p>Areas
                    <br />{{ $areas_count }}
                    <br />
                    <br />
                    <button onclick="window.location.href='{{ route('show_areas') }}'">View all</button>
                </p>
            </div>
            <div class="column" id="box1">
                <p>Orders
                    <br />{{ $orders_count }}
                    <br />
                    <br />
                    <button onclick="window.location.href='{{ route('show_orders') }}'">View all</button>
                </p>
            </div>
        </div>
    </div>

    <div style="height: 20px"></div>

    <div class="row" style="margin-left:20px">
        <p style="margin-left: 40px">Chart of Orders</p>
        <canvas id="myChart" style="width:100%;max-width:1150px"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <script>
            var xValues = [];
            var yValues = [];

            @foreach ($order_detial_in_charts as $order_detial_in_chart)
                yValues.push({{ count($order_detial_in_chart) }})
                xValues.push("{{ $order_detial_in_chart[0]->created_at }}")
            @endforeach
            {{-- let max = MATH.max(..yValues);
                    console.log(max) --}}

            function arrayMax(arr) {
                var len = arr.length,
                    max = -Infinity;
                while (len--) {
                    if (arr[len] > max) {
                        max = arr[len];
                    }
                }
                return max;
            };

            let max = arrayMax(yValues)
            new Chart("myChart", {
                type: "line",
                data: {
                    labels: xValues,
                    datasets: [{
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "rgba(0,0,255,1.0)",
                        borderColor: "rgba(0,0,255,0.1)",
                        data: yValues
                    }]
                },
                options: {
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: max * 1.2
                            }
                        }],
                    }
                }
            });
        </script>
        <form>
            <div class="row">
                <p
                    style="height: 30px; border: 1px solid black; width:258px; margin-bottom: 25px; margin-left:45px; margin-bottom: 25px; background-color:white; border-radius:3px; text-align:center; padding-top:10px">
                    <label>Restaurant
                        <select id="category_id" name="id" id="category">
                            <option value="" selected="selected">Select One</option>
                            @foreach ($restaurants as $restaurant)
                                <option value="{{ $restaurant->id }}"> {{ $restaurant->name }}</option>
                            @endforeach
                        </select>
                    </label>
                </p>
                <button id="submit" type="submit"
                    style="margin-left:40px; width:100px; border-radius:7px">Select</button>
            </div>
            {{-- <div class="row">
                <p
                    style="height: 30px; border: 1px solid black; width:258px; margin-bottom: 25px; margin-left:45px; margin-bottom: 25px; background-color:white;">
                    <label> Select Date </label>
                    <select id="date" name="date">
                        <option value="" selected="selected">Select one</option>
                        <option>Day</option>
                        <option>Month</option>
                        <option>Year
                        <option>
                    </select>
                </p>
            </div> --}}
        </form>




        {{-- </div> --}}

    </div>
    <div class="row">
        <footer>
            <p style="text-align: center; margin-top:10px"> &copy; HungryHour. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
