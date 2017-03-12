<?php

class Member_Model extends CI_Model {

    public function get_all_members() {
        return $this->db->get('tbl_member')->result();
    }

    public function save_new_member() {
        $data = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'prof_img' => 'abcdef.png'
        );
        $query = $this->db->insert('tbl_member', $data);
        //return $query;
    }

}
