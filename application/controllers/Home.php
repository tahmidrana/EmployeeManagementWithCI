<?php
defined("BASEPATH") OR exit('No direct script access allowed');
class Home extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Employee_Model');
    }

    public function index() {
        //$data['all_employee'] = $this->Employee_Model->get_all_employee();
        $this->load->view('home');        
    }
    
    public function all_employee() {
        $all_employee = $this->Employee_Model->get_all_employee();
        echo json_encode($all_employee);
    }

    public function single_employee($id){
        $data['single_employee_info'] = $this->Employee_Model->single_employee($id);
        $this->load->view('single_employee', $data);
    }
    
    public function save_new_user() {
        $permitted_type = array('jpg', 'jpeg', 'png', 'gih');
        $file_name = $_FILES['prof_img']['name'];
        $file_tmp_name = $_FILES['prof_img']['tmp_name'];
        $file_size = $_FILES['prof_img']['size'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = 'uploads/'.$unique_image;
        if($this->Employee_Model->save_new_employee($uploaded_image)){
            if(!empty($file_name) && $file_size<2000000 && in_array($file_ext, $permitted_type)){
                move_uploaded_file($file_tmp_name, $uploaded_image);
                echo json_encode(array('msg' => 'Employee Added successfully!')); 
            } else {
                echo json_encode(array('msg' => 'Image not uploaded!'));
            }
        } else {
            echo json_encode(array('msg'=>'Oops! Employee register failed!'));
        }
    }
    
    //update employee
    public function update_employee($id) {
        $permitted_type = array('jpg', 'jpeg', 'png', 'gih');
        $file_name = $_FILES['prof_img']['name'];
        $file_tmp_name = $_FILES['prof_img']['tmp_name'];
        $file_size = $_FILES['prof_img']['size'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = 'uploads/'.$unique_image;

        $res = $this->Employee_Model->update_current_employee($id, $uploaded_image);
        if($res) {
            if(!empty($file_name) && $file_size<2000000 && in_array($file_ext, $permitted_type)){
                move_uploaded_file($file_tmp_name, $uploaded_image);
                echo json_encode(array('msg' => 'Employee Updated successfully!'));
            } else {
                echo json_encode(array('msg' => 'Image not updated!'));
            }
        } else {
            echo json_encode(array('msg'=>'Oops! Employee update failed!'));
        }
    }

    //image upload function
    public function image_upload() {

    }
    
    public function delete_employee() {
        $res = $this->Employee_Model->delete_current_employee();
        if($res){
            echo json_encode(array('success'=>'Employee deleted!'));
        } else {
           echo json_encode(array('error'=>'Something wrong!'));
        }
    }
}
