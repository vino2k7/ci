<?php
class Pages extends CI_Controller 
{

   public function __construct()
   {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Pages_model');
        $this->load->library('session');

   }
   public function view($page = 'home')
   {
   	    //echo APPPATH; die; 
        if (! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
   }


   public function register($page='register')
   {

        //print_r($_POST);

        if($this->input->post('reg')!="")
        {
            //print_r($_POST);
            $data = array('fname' =>$this->input->post('fname'),
                          'lname'=>$this->input->post('lname'),
                          'user_name'=>$this->input->post('uname'),
                          'pword'=>$this->input->post('pword'),
                          'email'=>$this->input->post('email'),
                          'mobile'=>$this->input->post('mob')  
                          ); 

             $res=$this->Pages_model->reg_insert($data);  
             //echo $res; die;
             if($res==true)
             {
                  $this->session->set_flashdata('msg_success', 'User inserted Successfully');
                  redirect('Pages/view');
                  
             }elseif($res==false)  
             {
                  $this->session->set_flashdata('msg_exists_err','Username Already exists!!!');


             }             
        }
                  $data['title'] = ucfirst($page); 
                  $this->load->view('templates/header', $data);
                  $this->load->view('pages/'.$page, $data);
                  $this->load->view('templates/footer', $data);

        
   }

   public function login($page='login')
   {
             //print_r($_POST);        
                 if($this->input->post('submit')!="")
                 {

                     $user_name = $this->input->post('uname');
                     $pword     = $this->input->post('pword');

                     $this->db->where('user_name',$user_name);
                     $this->db->where('pword',$pword);

                     $query=$this->db->get('users');

                     if($query->num_rows()==1)
                     {
                            $row = $query->row();

                            $data = array('ID'=>$row->id,
                                          'Username'=>$row->user_name
                                         );
                            $this->session->set_userdata($data);
                            redirect('Pages/dashboard');

                     }

                            $data['error'] = "Invalid login Details"; 

                 }


                  $data['title'] = ucfirst($page); 
                  $this->load->view('templates/header', $data);
                  $this->load->view('pages/'.$page, $data);
                  $this->load->view('templates/footer', $data);
   }


   public function dashboard($page='profile')
   {
        
         //print_r($this->session->userdata);
                 $user_id = $this->session->userdata('ID');
                 $data['res'] = $this->Pages_model->display_user($user_id);
                
                  $data['title'] = ucfirst($page); 
                  $this->load->view('templates/header', $data);
                  $this->load->view('pages/'.$page, $data);
                  $this->load->view('templates/footer', $data);

   }


   public function update($page='profile')
   {
                  //print_r($this->input->post()); 
                  $user_id = $this->session->userdata('ID');
                  if($this->input->post('upd')!="") 
                  {
                  $data = array('fname' =>$this->input->post('fname'),
                          'lname'=>$this->input->post('lname'),
                          'user_name'=>$this->input->post('uname'),
                          'pword'=>$this->input->post('pword'),
                          'email'=>$this->input->post('email'),
                          'mobile'=>$this->input->post('mob')  
                          );
                  
                  $res = $this->Pages_model->update_user($data,$user_id);
                  
                  if($res==true)
                  {
                      $this->session->set_flashdata('msg_success', 'User Updated Successfully');
                      redirect('Pages/dashboard');
                  }

                  }   
                   
                  $data['title'] = ucfirst($page); 
                  $this->load->view('templates/header', $data);
                  $this->load->view('pages/'.$page, $data);
                  $this->load->view('templates/footer', $data);
                  
   }

   public function logout()
   {
       $arr = array('ID'=>'','Username'=>'');
       $this->session->unset_userdata($arr);
       $this->session->sess_destroy();
       redirect('Pages/view');
   }

} 
?>