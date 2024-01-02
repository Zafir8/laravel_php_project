<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>ShiftMe</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Links -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
       
       
        <!-- Styles -->
        <style>

            html, body {
                background-color: #fff;
                color: #0B3C5D;
                font-family: figtree, sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            
            .navbar-dark-blue {
                background-color: #0B3C5D;
            }
            .navbar-dark-blue .navbar-brand {
                color: #fff;
            }
            .navbar-dark-blue .navbar-brand:hover,
            .navbar-dark-blue .navbar-brand:focus {
                color: #fff;
            }
            .navbar-dark-blue .navbar-nav .nav-link {
                color: #fff;
                border-radius: .25rem;
                margin: 0 0.25em;
            }

            .col-md-12 {
                display: flex;
                justify-content: center;
                align-items: center;
                
            }

            .text {
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                margin-left: 50px;
            }

            .heading {
                /* change the font */
                font-weight: bold;
                font-size: 60px;
                color: #0B3C5D;
                text align: left;
            }

            .btn-primary {
                background-color: #0B3C5D;
                border-color: #0B3C5D;
                border-radius: 50px;
            }

            .main_img {
                border-radius: 50px;
                height: 300px;
            }

            .wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: row;
            }

            .nav-text {
                margin-left: 10px;
                font-size: 20px;
                position: relative;
                top: 4px;
                bottom: 0px;
                /* make it bold */
                font-weight: bold;
                /* apply text shadow */
                text-shadow: 0px 0px 1px #fff;
                
            }

           /* make this mobile responsive */
            @media (max-width: 768px) {
                .heading {
                    font-size: 40px;
                }

                .text {
                    margin-left: 0px;
                }

                .col-md-12 {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                .btn-primary {
                    margin-top: 20px;
                }

                .text {
                    margin-top: 20px;
                }

                .main_img {
                    height: 250px;
                }

            }

            @media (max-width: 576px) {
                .heading {
                    font-size: 30px;
                }

                .text {
                    margin-left: 0px;
                }

                .col-md-12 {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                .btn-primary {
                    margin-top: 20px;
                }

                .text {
                    margin-top: 20px;
                }


                .main_img {
                    height: 200px;
                }


            }

            @media (max-width: 320px) {
                .heading {
                    font-size: 20px;
                }

                .text {
                    margin-left: 0px;
                }

                .col-md-12 {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                }

                .btn-primary {
                    margin-top: 20px;
                }

                .text {
                    margin-top: 20px;
                }

                .main_img {
                    height: 150px;
                }

                


            }
           
         </style>
        
    </head>
    <body>
    <body>
    <!-- Bootstrap Navbar -->
    <nav class="navbar navbar-expand-lg  navbar-dark navbar-dark-blue">
        <a class="navbar-brand" href="#">
            <div class="wrapper">
                <img src="{{ asset('images/Shiftme logo.png') }}" alt="ShiftMe Logo" style="height: 40px;">
                <h3 class="nav-text">ShiftMe</h3>
            </div>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#book-a-ride">Book a Ride</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact-us">Contact Us</a>
                </li>
            </ul>
            @if (Route::has('login'))
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Log in</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                </ul>
            @endif
        </div>
    </nav>

    <!-- Rest of your existing code -->
    <div class="container mt-4">
    <h1 class="heading">ShiftMe</h1>
        <div class="row">
            <div class="col-md-12">  
                <img class="main_img" src="{{ asset('images/Bus.jpg') }}" alt="Bus">
                <div class="text">
                    <h2>Ride safe with ease!</h2>
                    <p>Book a ride with ShiftMe and get to school on time.</p>
                    <a href="#book-a-ride" class="btn btn-primary">Book a ride</a>
                </div>
            </div>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    </body>
</html>
