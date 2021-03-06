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
            <form action="processNewUser" method="POST" class="col-lg-8 col-xs-12 mt-5 row">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <div class="col-md-12 mb-3">
                    <h5>Register</h5>
                    <?php if($this->session->flashdata("register_message") != NULL) { echo $this->session->flashdata("register_message"); } ?>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?= $this->session->userdata("email_value"); $this->session->unset_userdata("email_value") ?>">
                    <?php if($this->session->flashdata("input_errors") != NULL) { echo $this->session->flashdata("input_errors")["register_email_error"]; } ?>
                </div>
                <div class="col-6 mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="first_name" value="<?= $this->session->userdata("first_name_value"); $this->session->unset_userdata("first_name_value") ?>">
                    <?php if($this->session->flashdata("input_errors") != NULL) { echo $this->session->flashdata("input_errors")["register_first_name_error"]; } ?>

                </div>
                <div class="col-6 mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" value="<?= $this->session->userdata("last_name_value"); $this->session->unset_userdata("last_name_value") ?>">
                    <?php if($this->session->flashdata("input_errors") != NULL) { echo $this->session->flashdata("input_errors")["register_last_name_error"]; } ?>

                </div>
                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                    <?php if($this->session->flashdata("input_errors") != NULL) { echo $this->session->flashdata("input_errors")["register_password_error"]; } ?>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                    <?php if($this->session->flashdata("input_errors") != NULL) { echo $this->session->flashdata("input_errors")["register_confirm_password_error"]; } ?>
                    <?php $this->session->set_flashdata("input_errors", NULL); ?>
                    <?php $this->session->set_flashdata("register_message", NULL); ?>
                </div>
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-success">Register</button>
                    <a href="signin" class="d-block mt-2 text-success">Already have an account? Sign in here!</a>
                </div>
            </form>
        </div>
        <footer class="container footer mt-auto text-success text-center mt-5">
            <p>?? 2021 Village88 | All Rights Reserved</p>
        </footer>
    </body>
</html>