<?php defined('BASEPATH') OR exit('No direct script access allowed');
  
class Product_model extends CI_Model
{
  
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
  
  
    public function get_all_products()
    {
        $this->db->from('Employee');
        $query=$this->db->get();
        return $query->result();
    }
      
  
    public function get_by_id($id)
    {
        $this->db->from('products');
        $this->db->where('id',$id);
        $query = $this->db->get();
  
        return $query->row();
    }
  
       public function create($data){
         
           $this->db->insert('products', $data);
       return $this->db->insert_id();
       }
 
    public function update($data)
    {
        $where = array('id' => $this->input->post('product_id'));
         $this->db->update('products', $data, $where);
         return $this->db->affected_rows();
 
    }
  
    public function delete()
    {
        $id = $this->input->post('product_id');
        $this->db->where('id', $id);
        $this->db->delete('products');
    }
  
  
}

?>
