<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @guest
        <title>E Learning</title>
    @elseif(Auth::user()->type == 'admin')
        <title>Administrator</title>
    @elseif(Auth::user()->type == 'teacher' || Auth::user()->type == 'student')
        <title>E Learning</title>
    @endguest

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body style="font-family: Bookman Old Style;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-fixed-top" style="border-bottom: 1px solid rgb(204, 204, 204);">
            <div class="container">
                <!-- Navbar Brand -->
                <a class="navbar-brand" href="{{ url('/') }}" style="padding-right: 100px;">{{ config('app.name', 'Laravel') }}</a>
                
                <!-- Toggler Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                @guest
                <ul class="navbar-nav mr-auto">
                    
                </ul>
                @elseif(Auth::user()->type == 'admin')
                <ul class="navbar-nav mr-auto">
                    <!-- Dashboard Link -->
                    <li class="nav-item dropdown" style="padding-right: 30px;">
                        <a  style="color: black;" class="nav-link" href="/home">
                            Dashboard
                        </a>
                    </li>

                    <!-- Teacher Dropdown -->
                    <li class="nav-item dropdown" style="padding-right: 30px;">
                        <a  style="color: black;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Teacher
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModal" style="cursor: pointer;" onclick="EmpIDclearTextBox()">Add new Teacher</a>
                            <a class="dropdown-item" href="#">View all Teachers</a>
                        </div>
                    </li>

                    <!-- Student Dropdown -->
                    <li class="nav-item dropdown" style="padding-right: 30px;">
                        <a  style="color: black;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Student
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/account">View all Students</a>
                        </div>
                    </li>
                    
                    <!-- Administrator Dropdown -->
                    <li class="nav-item dropdown" style="padding-right: 20px;">
                        <a style="color: black;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Administrator
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Add new Admin</a>
                            <a class="dropdown-item" href="#">View all Admins</a>
                        </div>
                    </li>
                </ul>
                @elseif(Auth::user()->type == 'teacher')
                <!-- Teacher Dropdown -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown" style="padding-right: 30px;">
                        <a  style="color: black;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Notifications
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/addNewTeacher">Add new Teacher</a>
                            <a class="dropdown-item" href="#">View all Teachers</a>
                        </div>
                    </li>
                </ul>
                @elseif(Auth::user()->type == 'student')
                <ul class="navbar-nav mr-auto">
                    <!-- Home Link -->
                    <li class="nav-item" style="padding-right: 30px;">
                        <a  style="color: black;" class="nav-link" href="/home" role="button">
                            Home
                        </a>
                    </li>

                    <!-- Notifications Dropdown -->
                    <li class="nav-item dropdown" style="padding-right: 30px;">
                        <a  style="color: black;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Notifications
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Notif 1</a>
                            <a class="dropdown-item" href="#">Notif 2</a>
                            <a class="dropdown-item" href="#">Notif 3</a>
                        </div>
                    </li>
                </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a style="color: black;" class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a style="color: black;" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{Auth::user()->firstname}}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Account Settings</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>



        <!-- Add new Teacher Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                            <div class="modal-body">
                            <script>
                                function EmpIDclearTextBox(){document.getElementById("employeeID").value='';}

                                $(document).ready(function() {
                                    $("#employeeID").keydown(function (e) {
                                        // Allow: backspace, delete, tab, escape, enter and .
                                        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                                            // Allow: Ctrl+A, Command+A
                                            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
                                            // Allow: home, end, left, right, down, up
                                            (e.keyCode >= 35 && e.keyCode <= 40)) {
                                                // let it happen, don't do anything
                                                return;
                                        }
                                        // Ensure that it is a number and stop the keypress
                                        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                                            e.preventDefault();
                                        }
                                    });
                                });
                            </script>
                                <div class="form-group row">
                                    <input id="employeeID" type="text" class="form-control" name="employeeID" required autofocus>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Register</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- AEnd Modal -->
    </div>
</body>
</html>
