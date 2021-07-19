<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Comment extends CI_Model {
        public function validateComment(){
            $this->form_validation->set_error_delimiters('<p class="font-italic text-danger small">','</p>');

            $this->form_validation->set_rules('comment', 'Comment', 'required');

            $this->form_validation->set_message('required', "%s can't be empty!");

            if($this->form_validation->run() == FALSE){
                return form_error('comment');
            }
            else{
                return 'Success';
            }
        }

        public function postComment($form_data){
            return $this->db->insert("comments", $form_data);
        }

        public function getComments($id){
            $this->db->select("c.message_id AS 'message_id', c.id AS 'comment_id', c.user_id AS 'sender_id', CONCAT(u_2.first_name, ' ', u_2.last_name) AS 'sender', c.content, TIMESTAMPDIFF(SECOND, c.created_at, NOW()) AS 'sent'");
            $this->db->from("users AS u");
            $this->db->join("profiles AS p", "u.id = p.user_id");
            $this->db->join("messages AS m", "p.id = m.profile_id");
            $this->db->join("comments AS c", "m.id = c.message_id");
            $this->db->join("users AS u_2", "c.user_id = u_2.id");
            $this->db->where("u.id", $id);
            $messages = $this->db->get();

            return $messages->result_array();
        }

        public function calculateTime($time){
            if($time < 60)
                $result = "A few seconds ago.";
            else if($time >= 60 AND $time < 120)
                $result = "A minute ago.";
            else if($time >= 120 AND $time < 3600)
                $result = FLOOR($time/60) . " minutes ago";
            else if($time >= 3600 AND $time < 86400 AND FLOOR($time/(60*60)) == 1)
                $result = "An hour ago.";
            else if($time >= 3600 AND $time < 86400 AND FLOOR($time/(60*60)) > 1)
                $result = $time = FLOOR($time/(60*60)) . " hours ago";
            else if($time >= 86400 AND $time < 604800 AND FLOOR($time/(60*60*24)) == 1)
                $result = "A day ago.";
            else if($time >= 86400 AND $time < 604800 AND FLOOR($time/(60*60*24)) > 1)
                $result = FLOOR($time/(60*60*24)) . " days ago";
            else if($time >= 604800 AND $time < 691200)
                $result = "A week ago";
            else
                $result = "None";
            
            return $result;
        }
    }
?>