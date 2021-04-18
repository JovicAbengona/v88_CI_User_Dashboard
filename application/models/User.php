<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Model {
        public function validateSignIn(){
            $this->form_validation->set_error_delimiters('<p class="font-italic text-danger small">','</p>');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            $this->form_validation->set_message("required", '%s cannot be empty');

            if($this->form_validation->run() == FALSE){
                $errors = array(
                    'sign_in_email_error' => form_error('email'),
                    'sign_in_password_error' => form_error('password')
                );

                return $errors;
            }
            else{
                return 'Success';
            }
        }

        public function signInUser($form_data){
            $this->db->select("u.*, p.id AS 'profile_id'");
            $this->db->from("users AS u");
            $this->db->join("profiles AS p", "u.id = p.user_id");
            $this->db->where("email", $form_data["email"]);
            $this->db->where("password", $form_data["password"]);
            $query = $this->db->get();

            return $query->row_array();
        }

        public function validateRegister(){
            $this->form_validation->set_error_delimiters('<p class="font-italic text-danger small">','</p>');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		    $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|matches[password]");
            

            $this->form_validation->set_message('required', '%s cannot be empty');
            $this->form_validation->set_message('valid_email', 'Please enter a valid email address');
            $this->form_validation->set_message('is_unique', 'Email address is already taken');
            $this->form_validation->set_message('min_length', 'Password must be at least 8 characters');
            $this->form_validation->set_message('matches', 'Passwords does not match');

            if($this->form_validation->run() == FALSE){
                $errors = array(
                    'register_email_error' => form_error('email'),
                    'register_first_name_error' => form_error('first_name'),
                    'register_last_name_error' => form_error('last_name'),
                    'register_password_error' => form_error('password'),
                    'register_confirm_password_error' => form_error('confirm_password')
                );

                $this->session->set_userdata("first_name_value", set_value("first_name"));
                $this->session->set_userdata("last_name_value", set_value("last_name"));
                $this->session->set_userdata("email_value", set_value("email"));

                return $errors;
            }
            else{
                return 'Success';
            }
        }

        public function checkIfFirstUser(){
            $this->db->select("*");
            $this->db->from("users");
            $query = $this->db->get();

            return $query->result_array();
        }

        public function registerUser($form_data){
            $this->db->insert("users", $form_data);

            $profile_data = array(
                "user_id" => $this->db->insert_id(),
                "created_at" => $form_data["created_at"],
                "updated_at" => $form_data["updated_at"]
            );

            return $this->db->insert("profiles", $profile_data);
        }

        public function getAllUsers(){
            $this->db->select("u.*, p.id AS 'profile_id'");
            $this->db->from("users AS u");
            $this->db->join("profiles AS p", "u.id = p.user_id");
            $query = $this->db->get();

            return $query->result_array();
        }

        public function getUser($id){
            $this->db->select("u.*, p.id AS profile_id, p.description");
            $this->db->from("users AS u");
            $this->db->join("profiles AS p", "u.id = p.user_id");
            $this->db->where("u.id", $id);
            $query = $this->db->get();

            return $query->row_array();
        }

        public function validateEdit($id){
            $this->form_validation->set_error_delimiters('<p class="font-italic text-danger small">','</p>');

            $this->db->select("email");
            $this->db->from("users");
            $this->db->where("id", $id);

            if($this->db->get()->row_array()["email"] != $this->input->post("email")){
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
                $this->form_validation->set_message('valid_email', 'Please enter a valid email address');
                $this->form_validation->set_message('is_unique', 'Email address is already taken');
            }

            $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
            $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
            
            $this->form_validation->set_message('required', '%s cannot be empty');
            
            if($this->form_validation->run() == FALSE){
                $errors = array(
                    'edit_email_error' => form_error('email'),
                    'edit_first_name_error' => form_error('first_name'),
                    'edit_last_name_error' => form_error('last_name'),
                );

                return $errors;
            }
            else{
                return 'Success';
            }
        }

        public function validatePassword($id){
            $this->form_validation->set_error_delimiters('<p class="font-italic text-danger small">','</p>');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		    $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|matches[password]");

            $this->form_validation->set_message('required', '%s cannot be empty');
            $this->form_validation->set_message('min_length', 'Password must be at least 8 characters');
            $this->form_validation->set_message('matches', 'Passwords does not match');

            if($this->form_validation->run() == FALSE){
                $errors = array(
                    'edit_password_error' => form_error('password'),
                    'edit_confirm_password_error' => form_error('confirm_password')
                );

                $this->session->set_userdata("first_name_value", set_value("first_name"));
                $this->session->set_userdata("last_name_value", set_value("last_name"));
                $this->session->set_userdata("email_value", set_value("email"));

                return $errors;
            }
            else{
                return 'Success';
            }
        }

        public function validateDescription(){
            $this->form_validation->set_error_delimiters('<p class="font-italic text-danger small">','</p>');
            $this->form_validation->set_rules('description', 'Description', 'required');

            $this->form_validation->set_message('required', '%s cannot be empty');

            if($this->form_validation->run() == FALSE){
                $errors = array(
                    'edit_description_error' => form_error('description')
                );

                $this->session->set_userdata("first_name_value", set_value("first_name"));
                $this->session->set_userdata("last_name_value", set_value("last_name"));
                $this->session->set_userdata("email_value", set_value("email"));

                return $errors;
            }
            else{
                return 'Success';
            }
        }

        public function updateUser($id, $form_data){
            $this->db->where('id', $id);
            return $this->db->update('users', $form_data);
        }

        public function updateDescription($id, $form_data){
            $this->db->where('id', $id);
            return $this->db->update('profiles', $form_data);
        }

        public function deleteUser($id){
            return $deleteUser =$this->db->delete("users", array("id" => $id));
        }
    }
?>