<?php

defined("BASEPATH") OR exit('No drect script access allowed');

class Member extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Member_Model');
    }

    public function index() {
        $this->load->view('member');
    }

    public function get_all_members() {
        $members = $this->Member_Model->get_all_members();
        echo json_encode($members);
    }

    public function save_new_member() {
        //$query = $this->Member_Model->save_new_member();

        $config['upload_path'] = base_url() . 'uploads/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
        $config['file_name'] = $_FILES['prof_img']['name'];
        //$this->load->library('upload', $config);
        $directory = base_url().'uploads/';
        $file_name = $_FILES['prof_img']['name'];
        $
        $this->load->library('upload');

        if (!$this->upload->do_upload('prof_img')) {
            //$data = array('upload_data' => $this->upload->data());
            //echo "<pre>";
            //print_r($config);
            //echo "the file is not uploaded<br>";
            echo json_encode(array("errorMsg" => "Not Uploaded!"));
        } else {
            $data = $this->upload->data();
        }
        //echo json_encode(array('errorMsg' => 'Not Uploaded!'));
    }

}
