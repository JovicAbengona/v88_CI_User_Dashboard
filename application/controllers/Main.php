<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Main extends CI_Controller {
        
        /*  DOCU: This function is triggered by default which displays the sign in/wall page.
            Owner: Karen
        */
        public function index(){
            if($this->session->userdata("user_id") != NULL AND $this->session->userdata("is_logged_in") == true){
                if($this->session->userdata("user_type") == "admin")
                    redirect("dashboard/admin");
                else
                    redirect("dashboard");
            }
            else
                $this->load->view("home/index");
        }

        public function signin(){
            if($this->session->userdata("user_id") != NULL AND $this->session->userdata("is_logged_in") == true){
                if($this->session->userdata("user_type") == "admin")
                    redirect("dashboard/admin");
                else
                    redirect("dashboard");
            }
            else
                $this->load->view("home/sign_in");
        }

        public function processSignIn(){
            $result = $this->User->validateSignIn();
            if($result != 'Success'){
                $this->session->set_flashdata('input_errors', $result);
                redirect("signin");
            } 
            else{
                $form_data = array(
                    "email" => $this->input->post("email"),
                    "password" => md5($this->input->post("password"))
                );

                $signin_user = $this->User->signInUser($form_data);
                if($signin_user){
                    $this->session->set_userdata("user_id", $signin_user["id"]);
                    $this->session->set_userdata("first_name", $signin_user["first_name"]);
                    $this->session->set_userdata("profile_id", $signin_user["profile_id"]);
                    $this->session->set_userdata("is_logged_in", true);

                    if($signin_user["user_level"] == 9){
                        $this->session->set_userdata("user_type", "admin");
                        redirect("dashboard/admin");
                    }
                    else{
                        $this->session->set_userdata("user_type", "user");
                        redirect("dashboard");
                    }
                }
                else{
                    $this->session->set_flashdata('signin_message', '<p class="font-italic text-danger">Incorrect Email or Password!</p>');
                    redirect("signin");
                }
            }
        }

        public function register(){
            $this->load->view("home/register");
        }

        public function processRegister(){
            $result = $this->User->validateRegister();
            if($result != 'Success'){
                $this->session->set_flashdata('input_errors', $result);
                redirect("register");
            } 
            else{
                $check = $this->User->checkIfFirstUser();
                if($check == NULL){
                    $form_data = array(
                        "email" => $this->input->post("email"),
                        "first_name" => $this->input->post("first_name"),
                        "last_name" => $this->input->post("last_name"),
                        "password" => md5($this->input->post("password")),
                        "user_level" => 9,
                        "created_at" => date("Y-m-d, H:i:s"),
                        "updated_at" => date("Y-m-d, H:i:s")
                    );
                }
                else{
                    $form_data = array(
                        "email" => $this->input->post("email"),
                        "first_name" => $this->input->post("first_name"),
                        "last_name" => $this->input->post("last_name"),
                        "password" => md5($this->input->post("password")),
                        "user_level" => 0,
                        "created_at" => date("Y-m-d, H:i:s"),
                        "updated_at" => date("Y-m-d, H:i:s")
                    );
                }

                $register_user = $this->User->registerUser($form_data);
                if($register_user){
                    $this->session->set_flashdata('register_message', '<p class="font-italic text-success">Registration successful!</p>');
                    redirect("register");
                }
            }
        }

        public function logoff(){
            $this->session->sess_destroy();
            redirect("main");
        }
    }
?>