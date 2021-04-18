<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Village88 Training | Web Fundamentals | CSS | Bootstrap">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
            .no-resize{
                resize: none;
            }
        </style>
        <title>UserDashboard | Delete</title>
    </head>
    <body class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand text-success" href="<?= base_url(); if($this->session->userdata("user_type") == "admin"){ echo 'dashboard/admin'; } else { echo 'dashboard'; }?>">UserDashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url(); if($this->session->userdata("user_type") == "admin"){ echo 'dashboard/admin'; } else { echo 'dashboard'; }?>">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url(); ?>edit"><?= $this->session->userdata("first_name") ?> <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-success" href="<?= base_url(); ?>logoff">Log off</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="mt-5">
                <div class="alert alert-danger col-lg-8 offset-lg-2 text-center" role="alert">
                    Deleting this user will delete their account, profile, messages, and comments!
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                    <p class="d-inline">Registered At:</p>
                    <p class="float-right"><?= DATE("F jS Y", STRTOTIME($created_at)) ?></p>
                </div>
                <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                    <p class="d-inline">User ID:</p>
                    <p class="float-right"><?= $id ?></p>
                </div>
                <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                    <p class="d-inline">Email Address:</p>
                    <p class="float-right"><?= $email ?></p>
                </div>
                <div class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-sm-8 offset-sm-2">
                    <p class="d-inline">Description:</p>
                    <p class="float-right"><?= $description ?></p>
                </div>
                <div class="col-lg-12 mt-3 text-center">
                    <h5 class="text-danger">Are you sure you want to delete this user?</h5>
                    <a href="<?= base_url(); ?>dashboard/admin" class="btn btn-sm btn-secondary ml-2">No</a>
                    <a href="<?= base_url(); ?>delete/<?= $id ?>" class="btn btn-sm btn-danger ml-2">Yes</a>
                </div>
            </div>
        </div>
        <footer class="container footer mt-auto text-success text-center mt-5">
            <p>© 2021 Village88 | All Rights Reserved</p>
        </footer>
    </body>
</html>