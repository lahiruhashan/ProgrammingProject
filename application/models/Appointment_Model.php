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
    }