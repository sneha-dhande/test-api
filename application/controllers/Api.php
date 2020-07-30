<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/Rest_controller.php');

class Api extends Rest_controller
{

       public function __construct() {
               parent::__construct();
               $this->load->model('user_model');

       }  

       public function employee_get(){
           $r = $this->user_model->read();
           $this->response($r); 
       }


       public function employee_put(){
           $id = $this->uri->segment(3);

           $r = $this->user_model->read();
           if($r->email)
           $data = array('first_name' => $this->input->get('first_name'),
           'last_name' => $this->input->get('last_name'),
           'password' => $this->input->get('password'),
           'phone_no' => $this->input->get('phone_no'),
           'email' => $this->input->get('email')
           );

            $r = $this->user_model->update($id,$data);
               $this->response($r); 
       }


       public function employee_post(){
           $data = array('first_name' => $this->input->get('first_name'),
           'last_name' => $this->input->get('last_name'),
           'password' => $this->input->get('password'),
           'phone_no' => $this->input->get('phone_no'),
           'email' => $this->input->get('email')
           );
           $r = $this->user_model->insert($data);
           $this->response($r); 
       }


       public function employee_delete(){
           $id = $this->uri->segment(3);
           $r = $this->user_model->delete($id);
           $this->response($r); 
       }
    

}
