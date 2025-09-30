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
            if($this->session->admin_login){
                redirect(base_url('adminmain'));
            }else if($this->session->user_login){
                redirect(base_url('main'));
            }else if($this->session->teacher_login){redirect(base_url('teachermain'));}
            else{}
            $this->load->view('pages/'.$page);                 
        }  
        public function authenticate(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $type=$this->input->post('type');
            if($type=="student"){            
                $data=$this->Learning_model->authenticate($username,$password);
                if($data){
                    $userdata=array(
                        'username' => $username,
                        'student_id' => $data['student_id'],
                        'fullname' => $data['student_firstname']." ".$data['student_lastname'],
                        'user_login' => true
                    );
                    $this->session->set_userdata($userdata);
                    redirect(base_url('main'));
                }else{
                    $this->session->set_flashdata('error','Invalid username and password!');
                    redirect(base_url());
                }
            }else if($type=="teacher"){
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
                    redirect(base_url());
                }
            }else{
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
                    redirect(base_url());
                }
            }
        }
        public function logout(){
            $this->session->unset_userdata('fullname');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('student_id');
            $this->session->unset_userdata('user_login');
            redirect(base_url());
        }
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['students'] = $this->Learning_model->getAllRegisteredStudent();
            $data['lessons'] = $this->Learning_model->getAllLesson();
            $data['assignments'] = $this->Learning_model->getAllAssignment();
            $data['quizzes'] = $this->Learning_model->getAllQuizzes();
            $data['newstudent'] = $this->Learning_model->getAllNewStudent(date('Y-m-d'));
            $data['newlesson'] = $this->Learning_model->getAllNewLesson(date('Y-m-d'));
            $data['newassignment'] = $this->Learning_model->getAllNewAssignment(date('Y-m-d'));
            $data['newquizzes'] = $this->Learning_model->getAllNewQuizzes(date('Y-m-d'));
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        } 
        public function signup(){
            $page = "signup";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->admin_login){redirect(base_url('main'));}
            else{}
            $this->load->view('pages/'.$page);                 
        }
        public function registration(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $register=$this->Learning_model->registration();
            if($register){
                $data=$this->Learning_model->authenticate($username,$password);
                if($data){
                    $userdata=array(
                        'username' => $username,
                        'student_id' => $data['student_id'],
                        'fullname' => $data['student_firstname']." ".$data['student_lastname'],
                        'user_login' => true
                    );
                    $this->session->set_userdata($userdata);
                    redirect(base_url('main'));
                }else{
                    redirect(base_url());
                }
            }else{                
                $this->session->set_flashdata('error','Unable to save registration details!');
                redirect(base_url('signup'));
            }            
        }
        public function student_lesson(){
            $page = "student_lesson";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['lessons'] = $this->Learning_model->getAllLessonByStatus('posted');
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        } 
        public function view_lesson_topic($id){
            $page = "view_lesson_topic";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['users'] = $this->Learning_model->getAllTaskByStatus($id,'posted');  
            $data['lesson'] = $this->Learning_model->getSingleLesson($id);            
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');
        }
        public function view_student_assignment($id,$lesson_id){
            $page = "view_student_assignment";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['users'] = $this->Learning_model->getAllAssignmentByTaskStatus($id,'posted');  
            $data['topic'] = $this->Learning_model->getSingleTopic($id);
            $data['lesson'] = $this->Learning_model->getSingleLesson($lesson_id);            
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');
        }
        public function view_student_quiz($id,$lesson_id){
            $page = "view_student_quiz";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['users'] = $this->Learning_model->getAllQuizByTaskStatus($id,'posted');  
            $data['topic'] = $this->Learning_model->getSingleTopic($id);
            $data['lesson'] = $this->Learning_model->getSingleLesson($lesson_id);            
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');
        }
        public function remove_student_assignment_attachment($id,$topic_id,$lesson_id){            
            $save=$this->Learning_model->remove_student_assignment_attachment($id);
            if($save){
                $this->session->set_flashdata('success','Assignment attachment details successfully removed!');
            }else{
                $this->session->set_flashdata('failed','Unable to remove assignment attachment details!');
            }
            redirect(base_url('view_student_assignment/'.$topic_id."/".$lesson_id));
        }
        public function save_student_assignment_attachment(){
            $id=$this->input->post('lesson_id');
            $topic_id=$this->input->post('topic_id');
            $save=$this->Learning_model->save_student_assignment_attachment();
            if($save){
                $this->session->set_flashdata('success','Assignment attachment details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save assignment attachment details!');
            }
            redirect(base_url('view_student_assignment/'.$topic_id."/".$id));
        }
        public function view_my_assignment($id){
            $page = "view_topic";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                                 
            $data['document'] = $this->Learning_model->getSingleAssignmentByStudent($id);
            $this->load->view('pages/teacher/'.$page,$data);                 
        }
        public function save_student_quiz_attachment(){
            $id=$this->input->post('lesson_id');
            $topic_id=$this->input->post('topic_id');
            $save=$this->Learning_model->save_student_quiz_attachment();
            if($save){
                $this->session->set_flashdata('success','Quiz attachment details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save quiz attachment details!');
            }
            redirect(base_url('view_student_quiz/'.$topic_id."/".$id));
        }
        public function view_my_quiz($id){
            $page = "view_topic";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                                 
            $data['document'] = $this->Learning_model->getSingleQuizByStudent($id);
            $this->load->view('pages/teacher/'.$page,$data);                 
        }
        public function games_list(){
            $page = "games_list";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['games'] = $this->Learning_model->getAllGames();
            $gamedata=array('game_score');
            $this->session->unset_userdata($gamedata);
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function enter_game($id){
            $page = "game_home";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['game'] = $this->Learning_model->getSingleGame($id);
            $gamedata=array('game_score');
            $this->session->unset_userdata($gamedata);
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function start_game($id,$category,$game_category){
            $game_category=str_replace('%20',' ',$game_category);
            if($game_category=="Multiple Choice"){
                $page = "start_game_choice";
                $data['games'] = $this->Learning_model->getAllGamesByIdChoice($id,$category);
            }else{
                $page = "start_game";
                $data['games'] = $this->Learning_model->getAllGamesById($id,$category);
            }            
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['game'] = $this->Learning_model->getSingleGame($id);                     
            if(!isset($this->session->game_score)){
                $this->session->set_userdata('game_score', 0);
            }            
            $data['game_category'] = $game_category;
            $data['category'] = $category;
            $data['game_id'] = $id;
            
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function submit_answer(){
            $game_id = $this->input->post('game_id');
            $game_category = $this->input->post('game_category');
            $category = $this->input->post('category');
            $correctanswer = strtolower($this->input->post('correctanswer'));
            $youranswer = strtolower($this->input->post('youranswer'));   
            if($correctanswer==$youranswer){
                $this->session->game_score++;
            } 
            if($youranswer==""){
                $youranswer="-";
            }
            redirect(base_url('check_answer/'.$game_id."/".$category."/".$game_category."/".$youranswer."/".$correctanswer));
        }
         public function check_answer($game_id,$category,$game_category,$youranswer,$correctanswer){
            $page = "check_answer";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                        
            if($this->session->user_login){}
            else{redirect(base_url());}
            $data['game'] = $this->Learning_model->getSingleGame($game_id);
            $data['game_id'] = $game_id;
            $data['game_category'] = $game_category;
            $data['category'] = $category;
            $data['correctanswer'] = $correctanswer;
            $data['youranswer'] = $youranswer;
            $this->load->view('includes/header'); 
            $this->load->view('includes/navbar');           
            $this->load->view('includes/sidebar');            
            $this->load->view('pages/'.$page,$data);    
            $this->load->view('includes/modal');     
            $this->load->view('includes/footer');               
        }
        public function save_result($game_id,$category,$game_category,$score){
            $save=$this->Learning_model->save_result($game_id,$category,$score);
            if($save){
                $this->session->set_flashdata('success','Result details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save result details!');
            }
            redirect(base_url('games_list'));
        }
        //===============================User Module=========================================
//====================================================================================================================================
        //===============================Teacher Module======================================
        public function teacher(){
            // $page = "index";
            // if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
            //     show_404();
            // }                                     
            // if($this->session->teacher_login){redirect(base_url('main'));}
            // else{}
            // $this->load->view('pages/teacher/'.$page);                 
            redirect(base_url());
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
                redirect(base_url());
            }
        }
        public function teacherlogout(){
            $userdata=array('username','fullname','teacher_login');
            $this->session->unset_userdata($userdata);
            redirect(base_url());
        }
         public function teachermain(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->teacher_login){}
            else{redirect(base_url());}
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
            else{redirect(base_url());}
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
            else{redirect(base_url());}
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
            else{redirect(base_url());}
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
        public function update_topic_status($id,$lesson_id,$status){            
            $save=$this->Learning_model->update_topic_status($id,$status);
            if($save){
                $this->session->set_flashdata('success','Topic success '.$status."!");
            }else{
                $this->session->set_flashdata('failed','Unable to update topic status!');
            }
            redirect(base_url('manage_topics/'.$lesson_id));
        }
        public function update_lesson_status($id,$status){            
            $save=$this->Learning_model->update_lesson_status($id,$status);
            if($save){
                $this->session->set_flashdata('success','Lesson success '.$status."!");
            }else{
                $this->session->set_flashdata('failed','Unable to update lesson status!');
            }
            redirect(base_url('manage_lessons'));
        }
        public function manage_assignment($id,$lesson_id){
            $page = "manage_assignment";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->teacher_login){}
            else{redirect(base_url());}
            $data['users'] = $this->Learning_model->getAllAssignmentByTask($id);  
            $data['topic'] = $this->Learning_model->getSingleTopic($id);
            $data['lesson'] = $this->Learning_model->getSingleLesson($lesson_id);            
            $this->load->view('includes/header');
            $this->load->view('includes/teacher/navbar');
            $this->load->view('includes/teacher/sidebar');
            $this->load->view('pages/teacher/'.$page,$data);
            $this->load->view('includes/teacher/modal');
            $this->load->view('includes/footer');
        }

        public function save_assignment(){
            $id=$this->input->post('lesson_id');
            $topic_id=$this->input->post('topic_id');
            $save=$this->Learning_model->save_assignment();
            if($save){
                $this->session->set_flashdata('success','Assignment details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save assignment details!');
            }
            redirect(base_url('manage_assignment/'.$topic_id."/".$id));
        }
        public function save_assignment_attachment(){
            $id=$this->input->post('lesson_id');
            $topic_id=$this->input->post('topic_id');
            $save=$this->Learning_model->save_assignment_attachment();
            if($save){
                $this->session->set_flashdata('success','Assignment attachment details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save assignment attachment details!');
            }
            redirect(base_url('manage_assignment/'.$topic_id."/".$id));
        }
        public function view_assignment($id){
            $page = "view_topic";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                                 
            $data['document'] = $this->Learning_model->getSingleAssignment($id);
            $this->load->view('pages/teacher/'.$page,$data);                 
        }
        public function remove_assignment_attachment($id,$topic_id,$lesson_id){            
            $save=$this->Learning_model->remove_assignment_attachment($id);
            if($save){
                $this->session->set_flashdata('success','Assignment attachment details successfully removed!');
            }else{
                $this->session->set_flashdata('failed','Unable to remove assignment attachment details!');
            }
            redirect(base_url('manage_assignment/'.$topic_id."/".$lesson_id));
        }

        public function update_assignment_status($id,$topic_id,$lesson_id,$status){            
            $save=$this->Learning_model->update_assignment_status($id,$status);
            if($save){
                $this->session->set_flashdata('success','Topic success '.$status."!");
            }else{
                $this->session->set_flashdata('failed','Unable to update topic status!');
            }
            redirect(base_url('manage_assignment/'.$topic_id."/".$lesson_id));
        }

        public function manage_quiz($id,$lesson_id){
            $page = "manage_quiz";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->teacher_login){}
            else{redirect(base_url());}
            $data['users'] = $this->Learning_model->getAllQuizByTask($id);  
            $data['topic'] = $this->Learning_model->getSingleTopic($id);
            $data['lesson'] = $this->Learning_model->getSingleLesson($lesson_id);            
            $this->load->view('includes/header');
            $this->load->view('includes/teacher/navbar');
            $this->load->view('includes/teacher/sidebar');
            $this->load->view('pages/teacher/'.$page,$data);
            $this->load->view('includes/teacher/modal');
            $this->load->view('includes/footer');
        }

        public function save_quiz(){
            $id=$this->input->post('lesson_id');
            $topic_id=$this->input->post('topic_id');
            $save=$this->Learning_model->save_quiz();
            if($save){
                $this->session->set_flashdata('success','Quiz details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save quiz details!');
            }
            redirect(base_url('manage_quiz/'.$topic_id."/".$id));
        }
        public function save_quiz_attachment(){
            $id=$this->input->post('lesson_id');
            $topic_id=$this->input->post('topic_id');
            $save=$this->Learning_model->save_quiz_attachment();
            if($save){
                $this->session->set_flashdata('success','Quiz attachment details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save quiz attachment details!');
            }
            redirect(base_url('manage_quiz/'.$topic_id."/".$id));
        }
        public function view_quiz($id){
            $page = "view_topic";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                               
            $data['document'] = $this->Learning_model->getSingleQuiz($id);
            $this->load->view('pages/teacher/'.$page,$data);                 
        }
        public function remove_quiz_attachment($id,$topic_id,$lesson_id){            
            $save=$this->Learning_model->remove_quiz_attachment($id);
            if($save){
                $this->session->set_flashdata('success','Quiz attachment details successfully removed!');
            }else{
                $this->session->set_flashdata('failed','Unable to remove quiz attachment details!');
            }
            redirect(base_url('manage_quiz/'.$topic_id."/".$lesson_id));
        }
        public function update_quiz_status($id,$topic_id,$lesson_id,$status){            
            $save=$this->Learning_model->update_quiz_status($id,$status);
            if($save){
                $this->session->set_flashdata('success','Topic success '.$status."!");
            }else{
                $this->session->set_flashdata('failed','Unable to update topic status!');
            }
            redirect(base_url('manage_quiz/'.$topic_id."/".$lesson_id));
        }
        public function student_details($student_id){
            $page = "student_details";
            if(!file_exists(APPPATH.'views/pages/teacher/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->teacher_login){}
            else{redirect(base_url());}
            $data['user'] = $this->Learning_model->getSingleStudent($student_id);
            $data['assignment'] = $this->Learning_model->getStudentAssignment($student_id);
            $data['quizzes'] = $this->Learning_model->getStudentQuiz($student_id);
            $data['student_id'] = $student_id;
            $this->load->view('includes/header');
            $this->load->view('includes/teacher/navbar');
            $this->load->view('includes/teacher/sidebar');
            $this->load->view('pages/teacher/'.$page,$data);
            $this->load->view('includes/teacher/modal');
            $this->load->view('includes/footer');
        }
        public function save_assignment_score(){
            $id=$this->input->post('student_id');            
            $save=$this->Learning_model->save_assignment_score();
            if($save){
                $this->session->set_flashdata('success','Assignment score details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save assignment score details!');
            }
            redirect(base_url('student_details/'.$id));
        }
        public function save_quiz_score(){
            $id=$this->input->post('student_id');            
            $save=$this->Learning_model->save_quiz_score();
            if($save){
                $this->session->set_flashdata('success',' score details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save quiz score details!');
            }
            redirect(base_url('student_details/'.$id));
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
            redirect(base_url());
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
        public function manage_games(){
            $page = "manage_games";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->admin_login){}
            else{redirect(base_url('admin'));}
            $data['games'] = $this->Learning_model->getAllGames();            
            $this->load->view('includes/header');
            $this->load->view('includes/admin/navbar');
            $this->load->view('includes/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('includes/admin/modal');
            $this->load->view('includes/footer');
        }
        public function save_game(){
            $save=$this->Learning_model->save_game();
            if($save){
                $this->session->set_flashdata('success','Game details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save game details!');
            }
            redirect(base_url('manage_games'));
        }
        public function delete_game($id){
            $save=$this->Learning_model->delete_game($id);
            if($save){
                $this->session->set_flashdata('success','Game details successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete game details!');
            }
            redirect(base_url('manage_games'));
        }
        public function manage_games_question($id){
            $page = "manage_games_details";
            if(!file_exists(APPPATH.'views/pages/admin/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->admin_login){}
            else{redirect(base_url('admin'));}
            $data['games'] = $this->Learning_model->getAllGamesDetails($id);            
            $data['game'] = $this->Learning_model->getSingleGame($id);
            $this->load->view('includes/header');
            $this->load->view('includes/admin/navbar');
            $this->load->view('includes/admin/sidebar');
            $this->load->view('pages/admin/'.$page,$data);
            $this->load->view('includes/admin/modal',$data);
            $this->load->view('includes/footer');
        }
        public function save_game_question(){
            $id=$this->input->post('game_id');
            $save=$this->Learning_model->save_game_question();
            if($save){
                $this->session->set_flashdata('success','Game question details successfully saved!');
            }else{
                $this->session->set_flashdata('failed','Unable to save game question details!');
            }
            redirect(base_url('manage_games_question/'.$id));
        }
    //===================================Admin Module========================================
}
?>
