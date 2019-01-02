<?php
class Pages_model extends CI_Model 
{

   public function __construct()
   {
        parent::__construct();
        $this->load->database();
        

   }


   public function reg_insert($data)
   {
     //print_r($data); die;
      if($data!="") 
      {
           $query = $this->db->query("select user_name from users where user_name='".$data['user_name']."'");
           $num_rows = $query->num_rows(); 
           //echo $num_rows; die;
           if($num_rows > 0) 
           {
            return false;
           }else 
           {
           $this->db->insert('users',$data);
           return true;
           }
      }
   }


   public function display_user($user_id)
   {

         //echo $user_id; exit;
         $this->db->where('id',$user_id);
         $query=$this->db->get('users');

         return $query->result();

   }


   public function update_user($data,$id)
   {
          $this->db->where('id',$id);
          $this->db->update('users',$data);

          //echo 'hello'; exit;

          return true;

   }

}   
?>