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
            /* .text-decoration-none class of Bootstrap isn't working so I had to make my own */
            tbody td .text-decoration-none{
                text-decoration: none;
            }
        </style>
        <title>UserDashboard | Dashboard</title>
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
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= base_url(); if($this->session->userdata("user_type") == "admin"){ echo 'dashboard/admin'; } else { echo 'dashboard'; }?>">Dashboard <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
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
<?php       if($this->session->userdata("user_type") == "admin"){ ?>
                <div class="mt-5 mb-3">
                    <h5 class=" d-inline">Manage Users</h5>
                    <a href="<?= base_url(); ?>users/new" class="btn btn-sm btn-success float-right">Add New</a>
                </div>
<?php       }
            else{ ?>
                <h4 class="mt-5">All Users</h4>
<?php       }
?>
            <table class="table table-hover table-striped">
                <thead>
                    <tr class="bg-success text-light">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>User Level</th>
<?php                   if($this->session->userdata("user_type") == "admin"){ ?>
                            <th>Actions</th>
<?php                   } ?>
                    </tr>
                </thead>
                <tbody>
<?php               foreach($form_data AS $user){ ?>
                        <tr>
                            <td><?= $user["id"] ?></td>
                            <td><a href="<?= base_url(); ?>users/show/<?= $user["id"] ?>" class="text-decoration-none"><?= $user["first_name"] . " " . $user["last_name"]?></a></td>
                            <td><?= $user["email"] ?></td>
                            <td><?= date("M jS Y", strtotime($user["created_at"])) ?></td>
                            <td><?php if($user["user_level"] == 9){ echo "admin"; } else { echo "normal"; } ?></td>
<?php                       if($this->session->userdata("user_type") == "admin"){ ?>
                                <td>
                                    <a href="<?= base_url(); ?>users/edit/<?= $user["id"] ?>" class="btn btn-sm btn-success">Edit</a>
<?php                           if($user["id"] != $this->session->userdata("user_id")){ ?>
                                    <a href="<?= base_url(); ?>users/delete/<?= $user["id"] ?>" class="btn btn-sm btn-danger">Remove</a>
<?php                           } ?>
                                </td>
<?php                       } ?>
                        </tr>
<?php               } ?>               
                </tbody>
            </table>
        </div>
        <footer class="container footer mt-auto text-success text-center mt-5">
            <p>© 2021 Village88 | All Rights Reserved</p>
        </footer>
    </body>
</html>