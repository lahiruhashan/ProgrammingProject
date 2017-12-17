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

        public function insert_appointment($date,$slot,$userId){

            if($date != NULL){
                $query = $this->db->insert('appointments',array('user_id'=>$userId,'date'=>$date,'slot'=>$slot,'created_at'=>date("Y-m-d H:i:s")));
                return $query;
            }

        }
    }