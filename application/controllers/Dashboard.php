<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends CI_Controller {
        public function index(){
            if($this->session->userdata("user_type") == "admin")
                redirect("dashboard/admin");
            else if($this->session->userdata("user_type") == "user"){
                $users = array("form_data" => $this->User->getAllUsers());

                $this->load->view("dashboard/index", $users);
            }
            else
                redirect("/");
        }

        public function admin(){
            if($this->session->userdata("user_type") == "user")
                redirect("dashboard");
            else if($this->session->userdata("user_type") == "admin"){
                $users = array("form_data" => $this->User->getAllUsers());

                $this->load->view("dashboard/index", $users);
            }
            else
                redirect("/");
        }

        public function addNewUser(){
            if($this->session->userdata("user_type") == "admin")
                $this->load->view("dashboard/add_user");
            else
                redirect("/");
        }

        public function processNewUser(){
            $result = $this->User->validateRegister();
            if($result != 'Success'){
                $this->session->set_flashdata('input_errors', $result);
                redirect("users/new");
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

                $register_user = $this->User->registerUser($form_data);
                if($register_user){
                    $this->session->set_flashdata('register_message', '<p class="font-italic text-success">New user has been added!</p>');
                    redirect("users/new");
                }
            }
        }

        public function show($id){
            if($this->session->userdata("is_logged_in")){
                $data = array(
                    "user" => $this->User->getUser($id),
                    "messages" => $this->Message->getMessages($id),
                    "comments" => $this->Comment->getComments($id),
                );

                $this->load->view("dashboard/messages", $data);
            }
            else
                redirect("/");
        }

        public function edit(){
            if($this->session->userdata("is_logged_in")){
                $result = $this->User->getUser($this->session->userdata("user_id"));
                $this->load->view("dashboard/profile", $result);
            }
            else
                redirect("/");
        }

        public function editUser($id){
            if($this->session->userdata("user_type") == "admin"){
                $result = $this->User->getUser($id);
                $this->load->view("dashboard/edit", $result);
            }
            else{
                redirect("dashboard");
            }
        }

        public function processEditUser($id){
            $result = $this->User->validateEdit($id);
            
            if($result != 'Success'){
                $this->session->set_flashdata('input_errors', $result);
                redirect("users/edit/$id");
            }
            else{
                $form_data = array(
                    "email" => $this->input->post("email"),
                    "first_name" => $this->input->post("first_name"),
                    "last_name" => $this->input->post("last_name"),
                    "user_level" => $this->input->post("user_level"),
                    "updated_at" => date("Y-m-d, H:i:s")
                );

                $update_user = $this->User->updateUser($id, $form_data);

                if($update_user){
                    $this->session->set_flashdata('update_message', '<p class="font-italic text-success">User Updated Successfully</p>');
                    redirect("users/edit/$id");
                }
            }
        }

        public function changePassword($id){
            $result = $this->User->validatePassword($id);
            
            if($result != 'Success'){
                $this->session->set_flashdata('password_errors', $result);
                redirect("users/edit/$id");
            }
            else{
                $form_data = array(
                    "password" => md5($this->input->post("password")),
                    "updated_at" => date("Y-m-d, H:i:s")
                );

                $update_user = $this->User->updateUser($id, $form_data);

                if($update_user){
                    $this->session->set_flashdata('password_message', '<p class="font-italic text-success">Password Changed Successfully</p>');
                    redirect("users/edit/$id");
                }
            }
        }

        public function processEditUserProfile($id){
            $result = $this->User->validateEdit($id);
            
            if($result != 'Success'){
                $this->session->set_flashdata('input_errors', $result);
                redirect("edit");
            }
            else{
                $form_data = array(
                    "email" => $this->input->post("email"),
                    "first_name" => $this->input->post("first_name"),
                    "last_name" => $this->input->post("last_name"),
                    "updated_at" => date("Y-m-d, H:i:s")
                );

                $update_user = $this->User->updateUser($id, $form_data);

                if($update_user){
                    $this->session->set_flashdata('update_message', '<p class="font-italic text-success">User Updated Successfully</p>');
                    redirect("edit");
                }
            }
        }

        public function changePasswordProfile($id){
            $result = $this->User->validatePassword($id);
            
            if($result != 'Success'){
                $this->session->set_flashdata('password_errors', $result);
                redirect("edit");
            }
            else{
                $form_data = array(
                    "password" => md5($this->input->post("password")),
                    "updated_at" => date("Y-m-d, H:i:s")
                );

                $update_user = $this->User->updateUser($id, $form_data);

                if($update_user){
                    $this->session->set_flashdata('password_message', '<p class="font-italic text-success">Password Changed Successfully</p>');
                    redirect("edit");
                }
            }
        }

        public function changeProfileDescription($id){
            $result = $this->User->validateDescription($id);
            
            if($result != 'Success'){
                $this->session->set_flashdata('description_errors', $result);
                redirect("edit");
            }
            else{
                $form_data = array(
                    "description" => $this->input->post("description"),
                    "updated_at" => date("Y-m-d, H:i:s")
                );

                $update_description = $this->User->updateDescription($id, $form_data);

                if($update_description){
                    $this->session->set_flashdata('description_message', '<p class="font-italic text-success">Profile Description Has Been Updated!</p>');
                    redirect("edit");
                }
            }
        }

        public function deleteUser($id){
            $delete_data = $this->User->getUser($id);
            $this->load->view("dashboard/delete", $delete_data);
        }

        public function processDeleteUser($id){
            $delete = $this->User->deleteUser($id);
            if($delete)
                redirect("dashboard/admin");
        }
    }
?>