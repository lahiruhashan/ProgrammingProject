<?php
    class Appointment_Model extends CI_Model{
        public function get_all_appointments($date = NULL){
            if($date != NULL){
                $query = $this->db->get_where('appointments',array('date'=>$date));
            }else{
                $query = $this->db->get('appointments');
            }
            return $query->result_array();
        }

        public function get_appointments($userId){
            if($userId != NULL){
                $query = $this->db->get_where('appointments',array('user_id'=>$userId));
            }

            return $query->result_array();
        }

        public function insert_appointment($date,$slot,$userId){

            if($date != NULL){
                $query = $this->db->insert('appointments',array('user_id'=>$userId,'date'=>$date,'slot'=>$slot,'created_at'=>date("Y-m-d H:i:s")));
                return $query;
            }

        }

        public function checkBook($userId){
            $res = $this->db->get_where('appointments',array('user_id'=>$userId,'attendance'=>null));

            if ($res->num_rows() >= 2) {
                return true;
            }else{
                return false;
            }
        }
    }