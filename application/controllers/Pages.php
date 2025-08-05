<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{

        //===============================User Module=========================================
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->admin_login){redirect(base_url('main'));}
            else{}
            $this->load->view('pages/'.$page);                 
        }  
        public function authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $data=$this->Clinic_model->authenticate($username,$password);
            if($data){
                $userdata=array(
                    'username' => $username,
                    'fullname' => $data['fullname'],
                    'admin_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url('main'));
            }else{
                redirect(base_url());
            }
        }
        public function logout(){
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('admin_login');
            redirect(base_url());
        }
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->admin_login){}
            else{redirect(base_url());}
            $data['services'] = $this->Clinic_model->getAllServices();
            $data['patient'] = $this->Clinic_model->getAllPatient();
            $data['admission'] = $this->Clinic_model->getAllAdmission();
            $data['active_patient'] = $this->Clinic_model->getAllActivePatient();
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        } 
        //===============================User Module=========================================
//====================================================================================================================================
        //===============================Teacher Module======================================

        //===============================Teacher Module======================================
//====================================================================================================================================
    //===================================Admin Module========================================        
        public function admin(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->admin_login){redirect(base_url('main'));}
            else{}
            $this->load->view('pages/admin/'.$page);                 
        }
        public function admin_authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $data=$this->Learning_model->admin_authenticate($username,$password);
            if($data){
                $userdata=array(
                    'username' => $username,
                    'fullname' => $data['fullname'],
                    'admin_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url('adminmain'));
            }else{
                $this->session->set_flashdata('error','Invalid username and password!');
                redirect(base_url('admin'));
            }
        }
        public function adminlogout(){
            $userdata=array('username','fullname','admin_login');
            $this->session->unset_userdata($userdata);
            redirect(base_url('admin'));
        }
         public function adminmain(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->admin_login){}
            else{redirect(base_url('admin'));}
            $data['students'] = $this->Learning_model->getAllRegisteredStudent();
            $data['lessons'] = $this->Learning_model->getAllLesson();
            $data['assignments'] = $this->Learning_model->getAllAssignment();
            $data['quizzes'] = $this->Learning_model->getAllQuizzes();
            $data['newstudent'] = $this->Learning_model->getAllNewStudent(date('Y-m-d'));
            $data['newlesson'] = $this->Learning_model->getAllNewLesson(date('Y-m-d'));
            $data['newassignment'] = $this->Learning_model->getAllNewAssignment(date('Y-m-d'));
            $data['newquizzes'] = $this->Learning_model->getAllNewQuizzes(date('Y-m-d'));
            $this->load->view('includes/header');
            $this->load->view('includes/admin/navbar');
            $this->load->view('includes/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('includes/admin/modal');
            $this->load->view('includes/footer');
        }
        public function manage_users(){
            $page = "manage_users";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->admin_login){}
            else{redirect(base_url('admin'));}
            $data['users'] = $this->Learning_model->getAllUsers();            
            $this->load->view('includes/header');
            $this->load->view('includes/admin/navbar');
            $this->load->view('includes/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('includes/admin/modal');
            $this->load->view('includes/footer');
        }
        public function save_users(){
            $save=$this->Learning_model->save_users();
            if($save){
                $this->session->set_flashdata('success','User details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save user details!');
            }
            redirect(base_url('manage_users'));
        }
        public function delete_users($id){
            $save=$this->Learning_model->delete_users($id);
            if($save){
                $this->session->set_flashdata('success','User details successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete user details!');
            }
            redirect(base_url('manage_users'));
        }

        public function manage_student(){
            $page = "manage_student";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->admin_login){}
            else{redirect(base_url('admin'));}
            $data['users'] = $this->Learning_model->getAllStudent();            
            $this->load->view('includes/header');
            $this->load->view('includes/admin/navbar');
            $this->load->view('includes/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('includes/admin/modal');
            $this->load->view('includes/footer');
        }
        public function save_student(){
            $save=$this->Learning_model->save_student();
            if($save){
                $this->session->set_flashdata('success','Student details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save student details!');
            }
            redirect(base_url('manage_student'));
        }
        public function delete_student($id){
            $save=$this->Learning_model->delete_student($id);
            if($save){
                $this->session->set_flashdata('success','Student details successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete student details!');
            }
            redirect(base_url('manage_student'));
        }
    //===================================Admin Module========================================
}
?>
