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
            tbody td .text-decoration-none, div .text-decoration-none{
                text-decoration: none;
            }

            .no-resize{
                resize: none;
            }
        </style>
        <title>UserDashboard | Messages</title>
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
            <div class="row mb-3">
                <h4 class="mt-5 col-lg-12"><?= $user['first_name'] . " " . $user['last_name']?></h4>
                <p class="col-lg-2">Registered At:</p>
                <p class="col-lg-10"><?= DATE("F jS Y", STRTOTIME($user['created_at'])) ?></p>
                <p class="col-lg-2">User ID:</p>
                <p class="col-lg-10"><?= $user['id'] ?></p>
                <p class="col-lg-2">Email Address:</p>
                <p class="col-lg-10"><?= $user['email'] ?></p>
                <p class="col-lg-2">Description:</p>
                <p class="col-lg-10"><?= $user['description'] ?></p>
                <h5 class="mt-3 col-lg-12">Leave a message for <?= $user['first_name'] ?></h5>
                <form action="<?= base_url(); ?>postMessage/<?= $user['id'] ?>/<?= $user['profile_id'] ?>/<?= $this->session->userdata("user_id") ?>" method="POST" class="col-lg-12">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="mb-3">
                        <textarea name="message" id="message" class="form-control no-resize" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Post</button>
                </form>
            </div>
<?php       foreach($messages AS $message){ 
                $sent = $this->Message->calculateTime($message["sent"]);
                if($sent == "None")
                    $sent = DATE("F jS Y", STRTOTIME($message["created_at"]));
?>
                <p class="d-inline"><a href="<?= $message["sender_id"] ?>" class="text-decoration-none"><?= $message["sender"] ?></a> wrote</p>
                <p class="float-right small font-italic"><?= $sent ?></p>
                <p><?= $message["content"] ?></p>

<?php           foreach($comments AS $comment){
                    if($message["message_id"] == $comment["message_id"]){
                        $sent = $this->Comment->calculateTime($comment["sent"]);
                        if($sent == "None")
                            $sent = DATE("F jS Y", STRTOTIME($comment["created_at"]));
?>
                        <div class="pl-5">
                            <p class="d-inline"><a href="<?= $comment["sender_id"] ?>" class="text-decoration-none"><?= $comment["sender"] ?></a> wrote</p>
                            <p class="float-right small font-italic"><?= $sent ?></p>
                            <p><?= $comment["content"] ?></p>
                        </div>
<?php               }
                } ?>
                <form action="<?= base_url(); ?>postComment/<?= $user['id'] ?>/<?= $message['message_id'] ?>/<?= $this->session->userdata("user_id") ?>" method="POST" class="pb-5 pl-5">
                    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />
                    <div class="mb-3">
                        <textarea name="comment" id="comment" class="form-control no-resize" rows="3" placeholder="Write a comment..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Post</button>
                </form>
<?php       } ?>
        </div>
        <footer class="container footer mt-auto text-success text-center mt-5">
            <p>© 2021 Village88 | All Rights Reserved</p>
        </footer>
    </body>
</html>