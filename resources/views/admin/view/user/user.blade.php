<!DOCTYPE html>

<head>
    {{-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <title>User</title>
    <style media="screen">
        table {
            font-family: arial, sans-serif;
            margin-left: 13%;
            margin-right: 13%;
            border-collapse: collapse;
            width: 80%;
            margin-top: 3.5%;
            min-width: 200px;
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
            float: right;
        }

        #add {
            width: 140px;
            height: 35px;
            background-color: turquoise;
            border-radius: 10px;
            float: right;
            margin-right: 7%;
            margin-bottom: 5.5%;
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
        @media screen and (max-width: 500rm) {
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


        form {
            margin-top: 4px;

        }

        label {
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }



        ::placeholder {
            color: #4b4e4d;
            padding-left: 10px;
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

        button:hover {
            box-shadow: inset -10.5em 0 0 0 #ff96ad, inset 10.5em 0 0 0 #ff96ad;
        }

        form {
            color: #555;
            display: flex;
            float: center;
            width: 230px;
            margin-left: 40%;
            margin-bottom: 2%;
            margin-top: 2%;
            padding: 2px;
            text-align: center;
            border: 1px solid currentColor;
            border-radius: 10px;
        }

        input[type="search"] {
            border: none;
            background: transparent;
            margin: 0;
            padding: 7px 8px;
            font-size: 14px;
            color: inherit;
            border: 1px solid transparent;
            border-radius: inherit;
        }

        input[type="search"]::placeholder {
            color: #bbb;
        }

        .submit[type="submit"] {
            text-indent: -999px;
            overflow: hidden;
            width: 40px;
            padding: 0;
            margin: 0;
            border: 1px solid transparent;
            border-radius: inherit;
            background: transparent url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' class='bi bi-search' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z'%3E%3C/path%3E%3C/svg%3E") no-repeat center;
            cursor: pointer;
            opacity: 0.7;
        }

        .submit[type="submit"]:hover {
            opacity: 1;
        }

        .submit[type="submit"]:focus,
        input[type="search"]:focus {
            box-shadow: 0 0 3px 0 #1183d6;
            border-color: #1183d6;
            outline: none;
        }

    </style>
    {{-- input {
        display: block;
        height: 43px;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.07);
        border-radius: 3px;
        border: none;

        box-shadow: inset 2px 2px 5px #babecc,
            inset -5px -5px 10px #ffffff73;
        margin-top: 8px;

        font-size: 14px;
        font-weight: 300;
    }  
     button:hover {
            box-shadow: inset -3px -3px 7px #ffffffb0, inset 3px 3px 5px rgba(94, 104, 121, 0.692);
        }
        button {
            width: 100%;
            margin-top: 35px;
            padding: 12px;
            text-align: center;
            background: #dde1e7;
            border: none;
            font-size: 17px;
            font-weight: 400;
            margin-bottom: 32px;
            box-shadow: -4px -4px 7px #fffdfdb7,
                3px 3px 5px rgba(94, 104, 121, 0.388);
        }
         .click-me {
            display: block;
            width: 160px;
            height: 50px;
            background: #dde1e7;
            float: right;
            text-align: center;
            margin: 0 auto;
            font-size: 22px;
            line-height: 50px;
            cursor: pointer;
            box-shadow: -3px -3px 7px #fffdfdcc,
                3px 3px 5px rgba(94, 104, 121, 0.342);

        }

        #click {
            display: none;
        }

        .click-me:hover {
            color: #08adef;
            box-shadow: inset 2px 2px 5px #babecc,
                inset -5px -5px 10px #ffffff73;
        }
        
        .center,
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

       
        .content {
            opacity: 0;
            visibility: hidden;

            width: 330px;
            height: auto;

            background: #dde1e7;
            padding: 30px 35px 40px;
            box-sizing: border-box;
            border-radius: 5px;
            box-shadow: -6px -6px 10px rgba(255, 255, 255, 0.8),
                6px 6px 10px rgba(0, 0, 0, 0.2);
        }
         #times {
            position: absolute;
            right: 10px;
            top: 20px;
            font-size: 25px;
            color: black;
            background: #dde1e7;
            padding: 3px;
            padding-left: 11px;
            padding-right: 11px;
            border-radius: 50%;

            box-shadow: -4px -4px 7px #fffdfdb7,
                3px 3px 5px rgba(94, 104, 121, 0.24);
            cursor: pointer;
        }


        #click:checked~.content {
            opacity: 1;
            visibility: visible;
        }

        .text {
            font-size: 30px;
            color: #000000;
            font-weight: 600;
            text-align: center;
            letter-spacing: 2px;
        } --}}
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
    <div>
        <p style="font-size: 30px; font-weight: bold; text-align: left; margin-left: 150px;">Users</p>
        {{-- <form class="nosubmit">
            <input class="fas fa-search" class="nosubmit" type="search" placeholder="Search users">
            <a href='{{ route('showUsers', $user->id) }}'><button class="submit" type="submit">Search</button></a?
        </form> --}}
        <button onclick="window.location.href='{{ route('add_users') }}'" class="btn" id="add">
            <i class="fa fa-plus"></i>Add User
        </button>
        <div class="table" style="min-width:200px">
            <table>
                <tr>
                    <th>User id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Photo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><img src="{{ $user->photo }}" height="50px" width="60px" /></td>
                        <td>
                            @if (auth()->user()->isAdmin == 1)
                                <a href='{{ route('user.edit_users', $user->id) }}'><button class="btn"
                                    id="edit"><i class="fa fa-pencil"></i>Edit</button></a>
                            @else
                                <a><button disabled class="btn" id="edit"><i
                                    class="fa fa-pencil"></i>Edit</button></a>
                            @endif

                        </td>
                        <td>
                            @if (auth()->user()->isAdmin == 1)
                                <a href="{{ route('user.delete', $user->id) }}"><button class="btn"
                                   id="delete"><i class="fa fa-trash"></i>Delete</button></a>
                            @else
                                <a><button disabled class="btn" id="edit"><i
                                    class="fa fa-pencil"></i>Edit</button></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        {{-- <div class="pagination-block" style="text-align: center">{{$users->links('layouts.paginationlinks')}}</div> --}}
        <div class="pagination-block" style="text-align: center">
            {{ $users->appends(request()->input())->links('layouts.paginationlinks') }}</div>
        <footer>
            <p style="text-align: center;"> &copy; HungryHour. All rights reserved.</p>
        </footer>
    </div>
</body>
</body>


</html>
