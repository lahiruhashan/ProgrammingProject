<?php

class UserModel extends CI_Model {

    public function insertUser () {

        //insert data
        $data = array(
            'username' => $this->input->post('username'),
            'email' =>$this->input->post('email'),
            'password' => ($this->input->post('password'))
        );
        //check for existing users with the given data
        $username = $this->input->post('username', TRUE);
        $this->db->where('username', $username);
        $res = $this->db->get('credential');

        if ($res->num_rows() >= 1) {
            $this->session->set_flashdata("Error", "You are already signed up.");
            redirect('signUp');
        } else {

            //insert data to the database
            $this->db->insert('credential', $data);

            $this->session->set_flashdata('success','You are registered!');
            $this->session->set_userdata('userId', $this->input->post('email'));
            redirect('appointment');
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

    public function checkMembership($userId){
        $this->db->where('user_id', $userId);
        $res = $this->db->get('membership');

        if ($res->num_rows() >= 1) {
            return true;
        }else{
            return false;
        }
    }

    public function applyMembership($userId){
        $this->db->insert('membership', array('user_id' => $userId));
    }



    /** integration */


    public function getUserData($id)
    {

        $this->db->select();
        $this->db->where('user_id',$id);
        $query = $this->db->get();
        return $query->row();

    }



    public function insertPckgData($data)
    {

        $this->db->insert('package',$data);


    }
    public function insertTrainerData($data)
    {

        $this->db->insert('trainer',$data);


    }


    public function getTrainerData()
    {

        $this->db->select('*');
        $this->db->from('trainer');
        $this->db->order_by('trainer_id');
        $result=$this->db->get();
        return $result->result();


    }


    public function edit($id)
    {

        $this->db->where('trainer_id', $id);
        $query = $this->db->get_where('trainer', array('trainer_id' => $id));

        return $query->row();

    }



    public function update($id)

    {

        $data = array(
            'trainer_name' => $this->input->post('trainername'),
            'nic' => $this->input->post('nic'),
            'contact_no' => ($this->input->post('tpNo')),
            'email_address' => ($this->input->post('email')),

        );
        $this->db->where('trainer_id', $id);
        $this->db->update('trainer', $data);
        return $id;

    }


    public function delete($id)
    {

        $this->db->where('trainer_id', $id);
        $this->db->delete('trainer');
    }



    public function getPackageData()
    {

        $this->db->select('*');
        $this->db->from('package');
        $result=$this->db->get();
        return $result->result();


    }


    public function deletePck($id)
    {

        $this->db->where('package_id', $id);
        $this->db->delete('package');
    }




    public function editPck($id)
    {

        $this->db->where('package_id', $id);
        $query = $this->db->get_where('package', array('package_id' => $id));

        return $query->row();

    }



    public function updatePck($id)

    {

        $data = array(
            'package_name' => $this->input->post('pckname'),
            'start_date' => $this->input->post('datepicker1'),
            'end_date' => ($this->input->post('datepicker2')),
            'pck_fee' => $this->input->post('pckfee'),
            'description' => ($this->input->post('description'))
        );
        $this->db->where('package_id', $id);
        $this->db->update('package', $data);
        return $id;

    }





    public function getUserRequests()

    {
        $this->db->where('flag',0);
        $result=$this->db->get('sign_up');
        return $result->result();

    }


    public function acceptUser($id)
    {
        $this->db->set('flag', 1);
        $this->db->where('user_id', $id);
        $this->db->update('sign_up');

    }

    public function RemoveUser($id) {

        $this->db->where('user_id',$id);
        $this->db->delete('sign_up');

    }


    public function Search($searchkey){

        $this->db->select('*');
        $this->db->from('trainer');
        $this->db->like('trainer_name', $searchkey);
        $this->db->or_like('trainer_id', $searchkey);
        $this->db->or_like('nic', $searchkey);
        $this->db->or_like('email_address', $searchkey);
        $this->db->or_like('contact_no', $searchkey);



        $query = $this->db->get();
        return $query->result();
    }


    public function searchPck($searchkey){

        $this->db->select('*');
        $this->db->from('package');
        $this->db->like('package_name', $searchkey);
        $this->db->or_like('package_id', $searchkey);
        $this->db->or_like('start_date', $searchkey);
        $this->db->or_like('end_date', $searchkey);
        $this->db->or_like('pck_fee', $searchkey);
        $this->db->or_like('description', $searchkey);



        $query = $this->db->get();
        return $query->result();
    }






    public function getTrainerPagintaion($limit, $start) {

        $this->db->select('*');
        $this->db->from('trainer');
        $this->db->limit($limit, $start);
        $this->db->order_by('trainer_id');
        $query = $this->db->get();
        return $result = $query->result();

    }

    //getting users count

    public function getTrainerCount() {

        $this->db->select("COUNT(*) as num_row");
        $this->db->from('trainer');
        $this->db->order_by('trainer_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result[0]->num_row;

    }



    public function getUserRequestPagintaion($limit, $start) {

        $this->db->select('*');
        $this->db->from('sign_up');
        $this->db->limit($limit, $start);
        $this->db->order_by('user_id');
        $this->db->where('flag',0);
        $query = $this->db->get();
        return $result = $query->result();

    }

    //getting users count

    public function getUserRequestCount() {

        $this->db->select("COUNT(*) as num_row");
        $this->db->from('sign_up');
        $this->db->order_by('user_id');
        $this->db->where('flag',0);
        $query = $this->db->get();
        $result = $query->result();
        return $result[0]->num_row;

    }





}


?>
