<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Village88 Training | Web Fundamentals | CSS | Bootstrap">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>UserDashboard | Sign In</title>
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
                        <li class="nav-item">
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
        <div class="container">
            <form action="processSignIn" method="POST" class="col-lg-4 col-xs-12 mt-5">
                <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                <h5 class="mb-3">Sign in</h5>
                <?php if($this->session->flashdata("signin_message") != NULL) { echo $this->session->flashdata("signin_message"); } ?>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="text" name="email" class="form-control" id="email">
                    <?php if($this->session->flashdata("input_errors") != NULL) { echo $this->session->flashdata("input_errors")["sign_in_email_error"]; } ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="password">
                    <?php if($this->session->flashdata("input_errors") != NULL) { echo $this->session->flashdata("input_errors")["sign_in_password_error"]; } ?>
                    <?php $this->session->set_flashdata("input_errors", NULL); ?>
                    <?php $this->session->set_flashdata("signin_message", NULL); ?>
                </div>
                <button type="submit" class="btn btn-success">Sign In</button>
                <a href="register" class="d-block mt-2 text-success">Don't have an account? Register here!</a>
            </form>
        </div>
        <footer class="container footer mt-auto text-success text-center mt-5">
            <p>© 2021 Village88 | All Rights Reserved</p>
        </footer>
    </body>
</html>