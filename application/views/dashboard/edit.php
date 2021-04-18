<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Village88 Training | Web Fundamentals | CSS | Bootstrap">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>UserDashboard | Add New User</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="<<?= base_url(); ?>edit"><?= $this->session->userdata("first_name") ?> <span class="sr-only">(current)</span></a>
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
                <h5 class="d-inline">Edit User #<?= $id ?></h5>
                <a class="btn btn-sm btn-success float-right" href="<?= base_url(); if($this->session->userdata("user_type") == "admin"){ echo 'dashboard/admin'; } else { echo 'dashboard'; }?>">Return To Dashboard</a>
            </div>
            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <span class="nav-link active" aria-current="true">Edit Information</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url(); ?>editUser/<?= $id ?>" method="POST">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                <?php if($this->session->flashdata("update_message") != NULL) { echo $this->session->flashdata("update_message"); } ?>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="text" name="email" class="form-control" id="email" value="<?= $email ?>">
                                    <?php if($this->session->flashdata("input_errors") != NULL) { echo $this->session->flashdata("input_errors")["edit_email_error"]; } ?>
                                </div>
                                <div class="mb-3">
                                    <label for="first_name" class="form-label">First Name</label>
                                    <input type="text" name="first_name" class="form-control" id="first_name" value="<?= $first_name ?>">
                                    <?php if($this->session->flashdata("input_errors") != NULL) { echo $this->session->flashdata("input_errors")["edit_first_name_error"]; } ?>
                                </div>
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" id="last_name" value="<?= $last_name ?>">
                                    <?php if($this->session->flashdata("input_errors") != NULL) { echo $this->session->flashdata("input_errors")["edit_last_name_error"]; } ?>
                                </div>
                                <div class="mb-3">
                                    <label for="user_level" class="form-label">User Level</label>
                                    <select name="user_level" class="form-control" id="user_level">
<?php                               if($user_level == 9){ ?>
                                        <option value="9">Admin</option>
<?php                               }
                                    else{ ?>
                                        <option value="0">Normal</option>
<?php                               } ?>
                                        <option value="0">Normal</option>
                                        <option value="9">Admin</option>
                                    <select>
                                    <?php $this->session->set_flashdata("input_errors", NULL); ?>
                                    <?php $this->session->set_flashdata("update_message", NULL); ?>
                                </div>
                                <button type="submit" class="btn btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <span class="nav-link active" aria-current="true">Change Password</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url(); ?>changePassword/<?= $id ?>" method="POST">
                                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                                <?php if($this->session->flashdata("password_message") != NULL) { echo $this->session->flashdata("password_message"); } ?>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                    <?php if($this->session->flashdata("password_errors") != NULL) { echo $this->session->flashdata("password_errors")["edit_password_error"]; } ?>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm_password" class="form-label">Confirm Password</label>
                                    <input type="password" name="confirm_password" class="form-control" id="confirm_password">
                                    <?php if($this->session->flashdata("password_errors") != NULL) { echo $this->session->flashdata("password_errors")["edit_confirm_password_error"]; } ?>
                                    <?php $this->session->set_flashdata("password_errors", NULL); ?>
                                    <?php $this->session->set_flashdata("update_message", NULL); ?>
                                </div>
                                <button type="submit" class="btn btn-success">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="container footer mt-auto text-success text-center mt-5">
            <p>© 2021 Village88 | All Rights Reserved</p>
        </footer>
    </body>
</html>