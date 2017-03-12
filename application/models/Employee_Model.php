<?php

class Employee_Model extends CI_Model {

    public function get_all_employee() {
        $page = $this->input->post('page') ? intval($this->input->post('page')) : 1;
        $rows = $this->input->post('rows') ? intval($this->input->post('rows')) : 10;
        $offset = ($page-1)*$rows;
        
        $search = isset($_POST['search_key'])?$_POST['search_key']:'';
        
        $where = "full_name LIKE '%$search%' OR id LIKE '%$search%' OR designation LIKE '%$search%'";
        $res = $this->db->query("SELECT * FROM tbl_employee WHERE ".$where);
        $total = $res->num_rows();
        //$total = $this->db->count_all('tbl_employee');
        //$result['total'] = $all_employee->num_rows();
        $result['total'] = $total;
        $all_employee = $this->db->query("SELECT * FROM tbl_employee WHERE ".$where." ORDER BY id DESC LIMIT $offset,$rows");
        

        $result['rows'] = $all_employee->result();
        /*echo "<pre>";
        print_r($result);
        echo "<br>";*/
        return $result;
    }

    public function single_employee($id) {
        $query = $this->db->query("SELECT * FROM tbl_employee WHERE id='$id'")->row();
        return $query;
    }
    
    public function save_new_employee($uploaded_image) {
        $this->full_name = $this->input->post('full_name');
        $this->email = $this->input->post('email');
        $this->prof_img = $uploaded_image;
        $this->designation = $this->input->post('designation');
        $this->db->insert('tbl_employee', $this);
        return true;
    }
    
    public function update_current_employee($id, $image) {
        $full_name = $this->input->post('full_name');
        $email = $this->input->post('email');
        $designation = $this->input->post('designation');
        
        $query = $this->db->query("UPDATE tbl_employee SET full_name='$full_name', email='$email', designation='$designation', prof_img='$image' WHERE id='$id'");
        
        return $query;
    }
    
    public function delete_current_employee() {
        $id = $this->input->post('id');
        $query = $this->db->query("DELETE FROM tbl_employee WHERE id='$id'");
        return $query;
    }
}
