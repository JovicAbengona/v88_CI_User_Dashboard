<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Village88 Training | Web Fundamentals | CSS | Bootstrap">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>UserDashboard | Home Page</title>
    </head>
    <body class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand text-success" href="<?= base_url(); ?>">UserDashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url(); ?>">Home <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-success" href="signin">Sign In</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-success">Welcome to UseDashboard</h1>
                <p class="lead">We're going to build a cool application using MVC Framework! This application was built with the Village88 folks!</p>
                <a href="signin" class="btn btn-success">Start</a>
            </div>
        </div>
        <div class="container">
            <div class="row" id="programs">
                <div class="col-md-4 mt-5 mb-5">
                    <h3 class="text-success">Manage Users</h3>
                    <p>Using this application, you'll learn how to add, remove, and edit users for the application.</p>
                </div>
                <div class="col-md-4 mt-5 mb-5">
                    <h3 class="text-success">Leave Messages</h3>
                    <p>Users will be able to leave a message to another user using this application.</p>
                </div>
                <div class="col-md-4 mt-5 mb-5">
                    <h3 class="text-success">Edit User Information</h3>
                    <p>Admins will be able to edit another user's informatin (email address, first name, last name, etc).</p>
                </div>
            </div>
        </div>
        <footer class="container footer mt-auto text-success text-center mt-5">
            <p>?? 2021 Village88 | All Rights Reserved</p>
        </footer>
    </body>
</html>