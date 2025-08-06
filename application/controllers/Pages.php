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
        public function teacher(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->teacher_login){redirect(base_url('main'));}
            else{}
            $this->load->view('pages/teacher/'.$page);                 
        }
        public function teacher_authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $data=$this->Learning_model->teacher_authenticate($username,$password);
            if($data){
                $userdata=array(
                    'username' => $username,
                    'fullname' => $data['fullname'],
                    'teacher_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url('teachermain'));
            }else{
                $this->session->set_flashdata('error','Invalid username and password!');
                redirect(base_url('teacher'));
            }
        }
        public function teacherlogout(){
            $userdata=array('username','fullname','teacher_login');
            $this->session->unset_userdata($userdata);
            redirect(base_url('teacher'));
        }
         public function teachermain(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->teacher_login){}
            else{redirect(base_url('teacher'));}
            $data['students'] = $this->Learning_model->getAllRegisteredStudent();
            $data['lessons'] = $this->Learning_model->getAllLesson();
            $data['assignments'] = $this->Learning_model->getAllAssignment();
            $data['quizzes'] = $this->Learning_model->getAllQuizzes();
            $data['newstudent'] = $this->Learning_model->getAllNewStudent(date('Y-m-d'));
            $data['newlesson'] = $this->Learning_model->getAllNewLesson(date('Y-m-d'));
            $data['newassignment'] = $this->Learning_model->getAllNewAssignment(date('Y-m-d'));
            $data['newquizzes'] = $this->Learning_model->getAllNewQuizzes(date('Y-m-d'));
            $this->load->view('includes/header');
            $this->load->view('includes/teacher/navbar');
            $this->load->view('includes/teacher/sidebar');
            $this->load->view('pages/teacher/'.$page,$data);
            $this->load->view('includes/teacher/modal');
            $this->load->view('includes/footer');
        }
        public function student_list(){
            $page = "student_list";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->teacher_login){}
            else{redirect(base_url('teacher'));}
            $data['users'] = $this->Learning_model->getAllStudent();            
            $this->load->view('includes/header');
            $this->load->view('includes/teacher/navbar');
            $this->load->view('includes/teacher/sidebar');
            $this->load->view('pages/teacher/'.$page,$data);
            $this->load->view('includes/teacher/modal');
            $this->load->view('includes/footer');
        }
        public function manage_lessons(){
            $page = "manage_lessons";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->teacher_login){}
            else{redirect(base_url('teacher'));}
            $data['users'] = $this->Learning_model->getAllLesson();            
            $this->load->view('includes/header');
            $this->load->view('includes/teacher/navbar');
            $this->load->view('includes/teacher/sidebar');
            $this->load->view('pages/teacher/'.$page,$data);
            $this->load->view('includes/teacher/modal');
            $this->load->view('includes/footer');
        }
        public function save_lessons(){
            $save=$this->Learning_model->save_lessons();
            if($save){
                $this->session->set_flashdata('success','Lesson details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save lesson details!');
            }
            redirect(base_url('manage_lessons'));
        }
        public function manage_topics($id){
            $page = "manage_topics";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->teacher_login){}
            else{redirect(base_url('teacher'));}
            $data['users'] = $this->Learning_model->getAllTask($id);  
            $data['lesson'] = $this->Learning_model->getSingleLesson($id);            
            $this->load->view('includes/header');
            $this->load->view('includes/teacher/navbar');
            $this->load->view('includes/teacher/sidebar');
            $this->load->view('pages/teacher/'.$page,$data);
            $this->load->view('includes/teacher/modal');
            $this->load->view('includes/footer');
        }
        public function save_topic(){
            $id=$this->input->post('lesson_id');
            $save=$this->Learning_model->save_topic();
            if($save){
                $this->session->set_flashdata('success','Task details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save task details!');
            }
            redirect(base_url('manage_topics/'.$id));
        }
        public function save_topic_attachment(){
            $id=$this->input->post('lesson_id');
            $save=$this->Learning_model->save_topic_attachment();
            if($save){
                $this->session->set_flashdata('success','Task attachment details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save task attachment details!');
            }
            redirect(base_url('manage_topics/'.$id));
        }
        public function view_topic($id){
            $page = "view_topic";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->teacher_login){}
            else{redirect(base_url('main'));}
            $data['document'] = $this->Learning_model->getSingleTopic($id);
            $this->load->view('pages/teacher/'.$page,$data);                 
        }
        public function remove_topic_attachment($id,$lesson_id){            
            $save=$this->Learning_model->remove_topic_attachment($id);
            if($save){
                $this->session->set_flashdata('success','Task attachment details successfully removed!');
            }else{
                $this->session->set_flashdata('failed','Unable to remove task attachment details!');
            }
            redirect(base_url('manage_topics/'.$lesson_id));
        }
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
