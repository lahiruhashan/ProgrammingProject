<?php

class UserModel extends CI_Model {

    public function insertUser () {

        //insert data
        $data = array(
            'username' => $this->input->post('username'),
            'email' =>$this->input->post('email'),
            'password' => ($this->input->post('password'))
        );


        $username = $this->input->post('username', TRUE);
        $this->db->where('username', $username);
        $res = $this->db->get('credential');

        if ($res->num_rows() >= 1) {

            $this->session->set_flashdata("Error", "You are already signed up.");

        } else {

            //insert data to the database
            $this->db->insert('credential', $data);
        }
    }

    public function checkLogin() {

        //enter username and password
        $email = $this->input->post('email');
        $password = ($this->input->post('password'));

        //fetch data from database
        $query = $this->db->get_where('credential', array('email' => $email, 'password'=> $password));

        //check if there's a user with the above inputs
        if ($query->num_rows() ==1) {

            //retrieve the details of the user
            return $query->row();

        } else {

            return false;

        }

    }




}


?>
