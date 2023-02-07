<!doctype html>
<html lang="en">

<head>
    @stack('title')
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{asset('css/mycss.css')}}">

</head>

<body>
        <header>
            <div class="position-sticky top-0">
                <nav class="navbar  navbar-expand-lg navbar-dark header-body  bg-danger">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{url('/add')}}">Add</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{url('/update')}}">Update</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="{{url('/delete')}}">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>