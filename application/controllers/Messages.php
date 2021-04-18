<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Messages extends CI_Controller {
        public function postMessage($id, $profile_id, $sender_id){
            $result = $this->Message->validateMessage();

            if($result != 'Success'){
                redirect("users/show/$id");
            }
            else{
                $form_data = array(
                    "profile_id" => $profile_id,
                    "user_id" => $sender_id,
                    "content" => $this->input->post("message"),
                    "created_at" => date("Y-m-d, H:i:s"),
                    "updated_at" => date("Y-m-d, H:i:s"),
                );

                $post_message = $this->Message->postMessage($form_data);

                if($post_message){
                    redirect("users/show/$id");
                }
            }
        }

        public function postComment($id, $message_id, $sender_id){
            $result = $this->Comment->validateComment();

            if($result != 'Success'){
                redirect("users/show/$id");
            }
            else{
                $form_data = array(
                    "message_id" => $message_id,
                    "user_id" => $sender_id,
                    "content" => $this->input->post("comment"),
                    "created_at" => date("Y-m-d, H:i:s"),
                    "updated_at" => date("Y-m-d, H:i:s"),
                );

                $post_comment = $this->Comment->postComment($form_data);

                if($post_comment){
                    redirect("users/show/$id");
                }
            }
        }
    }
?>