<!DOCTYPE html>

<head>
    <title>Category</title>
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
            box-shadow: 0 0 5px #ff96ad, 0 0 25px #ff96ad, 0 0 50px #ff96ad, 0 0 200px #ff96ad;

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
    <div style="text-align:center; padding-top:3%; ">
        <p style="font-size: 30px; font-weight: bold; text-align: left; margin-left: 150px;">Categories</p>
        <button onclick="window.location.href='{{ route('add_categories') }}'" class="btn" id="add"><i
                class="fa fa-plus"></i>Add Category</button>
        <table>
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href='{{ route('category.edit_categories', $category->id) }}'><button
                                class="btn" id="edit"><i class="fa fa-pencil"></i>Edit</button></a>
                    </td>
                    <td>
                        <a href="{{ route('category.delete', $category->id) }}"><button class="btn"
                                id="delete"><i class="fa fa-trash"></i>Delete</button></a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="pagination-block" style="text-align: center">
            {{ $categories->appends(request()->input())->links('layouts.paginationlinks') }}</div>
        <footer>
            <p style="text-align: center; "> &copy; HungryHour. All rights reserved.</p>
        </footer>
    </div>
</body>

</html>
