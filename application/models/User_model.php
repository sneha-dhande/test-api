<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/**

*

*/

class User_model extends CI_Model

{

public function read(){

   

       $query = $this->db->query("select * from `Employee`");

       return $query->result_array();

   }



   public function insert($data){

       

       $this->first_name    = $data['first_name']; 

       $this->last_name    = $data['last_name'];

       $this->password  = $data['password'];

       $this->email = $data['email'];

       $this->phone_no = $data['phone_no'];


       if($this->db->insert('Employee',$this))

       {    

           return 'Data is inserted successfully';

       }

         else

       {

           return "Error has occured";

       }

   }



   public function update($id,$data){

   

      $this->first_name    = $data['first_name']; 

       $this->last_name    = $data['last_name'];

       $this->password  = $data['password'];

       $this->email = $data['email'];

       $this->phone_no = $data['phone_no'];
       
       $result = $this->db->update('Employee',$this,array('emp_id' => $id));

       if($result)

       {

           return "Data is updated successfully";

       }

       else

       {

           return "Error has occurred";

       }

   }



   public function delete($id){

   

       $result = $this->db->query("delete from `Employee` where user_id = $id");

       if($result)

       {

           return "Data is deleted successfully";

       }

       else

       {

           return "Error has occurred";

       }

   }



}
