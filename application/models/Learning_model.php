<?php
    date_default_timezone_set('Asia/Manila');
    class Learning_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function admin_authenticate($username,$password){
            $result=$this->db->query("SELECT * FROM users WHERE username='$username' AND `password`='$password' AND `role`='admin'");
            if($result->num_rows()>0){
                $date=date('Y-m-d');
                $time=date('H:i:s');
                $this->db->query("UPDATE users SET date_login='$date',time_login='$time' WHERE username='$username'");                
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getAllRegisteredStudent(){
            $result=$this->db->query("SELECT * FROM student WHERE username <> '' ORDER BY student_lastname ASC, student_firstname ASC");
            return $result->result_array();
        }
        public function getAllLesson(){
            $result=$this->db->query("SELECT * FROM lessons ORDER BY `quarter` ASC, id ASC");
            return $result->result_array();
        }
        public function getAllAssignment(){
            $result=$this->db->query("SELECT * FROM assignment ORDER BY `description` ASC");
            return $result->result_array();
        }
        public function getAllQuizzes(){
            $result=$this->db->query("SELECT * FROM quizzes ORDER BY `description` ASC");
            return $result->result_array();
        }
        public function getAllNewStudent($date){
            $result=$this->db->query("SELECT * FROM student WHERE datearray='$date' ORDER BY student_lastname ASC, student_firstname ASC");
            return $result->result_array();
        }
        public function getAllNewAssignment($date){
            $result=$this->db->query("SELECT * FROM assignment WHERE datearray='$date'");
            return $result->result_array();
        }
        public function getAllNewLesson($date){
            $result=$this->db->query("SELECT * FROM lessons WHERE datearray='$date'");
            return $result->result_array();
        }
        public function getAllNewQuizzes($date){
            $result=$this->db->query("SELECT * FROM quizzes WHERE datearray='$date'");
            return $result->result_array();
        }
        public function getAllUsers(){
            $result=$this->db->query("SELECT * FROM users");
            return $result->result_array();
        }
        public function save_users(){
            $id=$this->input->post('id');
            $fullname=$this->input->post('fullname');
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $role=$this->input->post('role');
            $check=$this->db->query("SELECT * FROM users WHERE username='$username' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                if($role=="teacher"){
                    if($id==""){
                        $result=$this->db->query("INSERT INTO users(fullname,username,`password`,`role`) VALUES('$fullname','$username','$password','$role')");
                    }else{
                        $result=$this->db->query("UPDATE users SET fullname='$fullname',username='$username',`password`='$password',`role`='$role' WHERE id='$id'");
                    }
                }
                if($result){
                    return true;
                }else{
                    return false;
                }
            }
        }
        public function getSingleUser($username){
            $result=$this->db->query("SELECT * FROM users WHERE username='$username'");
            return $result->row_array();
        }
        public function delete_users($id){
            $result=$this->db->query("DELETE FROM users WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllStudent(){
            $result=$this->db->query("SELECT * FROM student ORDER BY student_lastname ASC, student_firstname ASC");
            return $result->result_array();
        }

        public function save_student(){
            $id=$this->input->post('id');
            $student_id=$this->input->post('student_id');
            $lastname=$this->input->post('lastname');
            $firstname=$this->input->post('firstname');
            $middlename=$this->input->post('middlename');
            $gender=$this->input->post('gender');
            $check=$this->db->query("SELECT * FROM student WHERE student_id='$student_id' AND id <> '$id'");
            if($check->num_rows()>0){
                return false;
            }else{
                
                    if($id==""){
                        $result=$this->db->query("INSERT INTO student(student_id,student_lastname,student_firstname,student_middlename,student_gender) VALUES('$student_id','$lastname','$firstname','$middlename','$gender')");
                    }else{
                        $result=$this->db->query("UPDATE student SET student_id='$student_id',student_lastname='$lastname',student_firstname='$firstname',student_middlename='$middlename',student_gender='$gender' WHERE id='$id'");
                    }                
                if($result){
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function teacher_authenticate($username,$password){
            $result=$this->db->query("SELECT * FROM users WHERE username='$username' AND `password`='$password' AND `role`='teacher'");
            if($result->num_rows()>0){
                $date=date('Y-m-d');
                $time=date('H:i:s');
                $this->db->query("UPDATE users SET date_login='$date',time_login='$time' WHERE username='$username'");                
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function save_lessons(){
            $id=$this->input->post('id');
            $description=$this->input->post('description');
            $quarter=$this->input->post('quarter');
            $date=date('Y-m-d');
            if($id==""){
                $result=$this->db->query("INSERT INTO lessons(`description`,`quarter`,datearray) VALUES('$description','$quarter','$date')");
            }else{
                $result=$this->db->query("UPDATE lessons SET `description`='$description',`quarter`='$quarter' WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllQuizzesByLesson($id){
            $result=$this->db->query("SELECT l.description,q.* FROM quizzes q INNER JOIN lessons l ON l.id=q.lesson_id WHERE l.id='$id' ORDER BY q.datearray ASC");
            return $result->result_array();
        }
        public function getAllAssignmentsByLesson($id){
            $result=$this->db->query("SELECT l.description,q.* FROM assignment q INNER JOIN lessons l ON l.id=q.lesson_id WHERE l.id='$id' ORDER BY q.datearray ASC");
            return $result->result_array();
        }
        public function getAllTask($id){
            $result=$this->db->query("SELECT l.description as lesson,q.* FROM lessons_details q INNER JOIN lessons l ON l.id=q.lesson_id WHERE l.id='$id' ORDER BY q.datearray ASC");
            return $result->result_array();
        }
        public function getSingleLesson($id){
            $result=$this->db->query("SELECT * FROM lessons WHERE id='$id'");
            return $result->row_array();
        }
        public function save_topic(){
            $id=$this->input->post('id');
            $lesson_id=$this->input->post('lesson_id');
            $description=$this->input->post('description');            
            $date=date('Y-m-d');
            if($id==""){
                $result=$this->db->query("INSERT INTO lessons_details(`description`,lesson_id,datearray) VALUES('$description','$lesson_id','$date')");
            }else{
                $result=$this->db->query("UPDATE lessons_details SET `description`='$description' WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_topic_attachment(){
            $id=$this->input->post('id');
            $lesson_id=$this->input->post('lesson_id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('pdf');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE lessons_details SET document='$imgContent' WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getSingleTopic($id){
            $result=$this->db->query("SELECT * FROM lessons_details WHERE id='$id'");
            return $result->row_array();
        }
        public function remove_topic_attachment($id){
            $result=$this->db->query("UPDATE lessons_details SET document='' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function update_topic_status($id,$status){
            $result=$this->db->query("UPDATE lessons_details SET `status`='$status' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function update_lesson_status($id,$status){
            $result=$this->db->query("UPDATE lessons SET `status`='$status' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getAllAssignmentByTask($id){
            $result=$this->db->query("SELECT * FROM assignment WHERE topic_id='$id' ORDER BY datearray ASC,`description` ASC");
            return $result->result_array();
        }
        public function save_assignment(){
            $id=$this->input->post('id');
            $topic_id=$this->input->post('topic_id');
            $lesson_id=$this->input->post('lesson_id');
            $description=$this->input->post('description');            
            $points=$this->input->post('points');
            $date=date('Y-m-d');
            if($id==""){
                $result=$this->db->query("INSERT INTO assignment(`description`,lesson_id,topic_id,datearray,points) VALUES('$description','$lesson_id','$topic_id','$date','$points')");
            }else{
                $result=$this->db->query("UPDATE assignment SET `description`='$description',points='$points' WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_assignment_attachment(){
            $id=$this->input->post('id');
            $topic_id=$this->input->post('topic_id');
            $lesson_id=$this->input->post('lesson_id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('pdf');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE assignment SET document='$imgContent' WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getSingleAssignment($id){
            $result=$this->db->query("SELECT * FROM assignment WHERE id='$id'");
            return $result->row_array();
        }
        public function remove_assignment_attachment($id){
            $result=$this->db->query("UPDATE assignment SET document='' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function update_assignment_status($id,$status){
            $result=$this->db->query("UPDATE assignment SET `status`='$status' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function getAllQuizByTask($id){
            $result=$this->db->query("SELECT * FROM quizzes WHERE topic_id='$id' ORDER BY datearray ASC,`description` ASC");
            return $result->result_array();
        }
        public function save_quiz(){
            $id=$this->input->post('id');
            $topic_id=$this->input->post('topic_id');
            $lesson_id=$this->input->post('lesson_id');
            $description=$this->input->post('description');            
            $points=$this->input->post('points');
            $date=date('Y-m-d');
            if($id==""){
                $result=$this->db->query("INSERT INTO quizzes(`description`,lesson_id,topic_id,datearray,points) VALUES('$description','$lesson_id','$topic_id','$date','$points')");
            }else{
                $result=$this->db->query("UPDATE quizzes SET `description`='$description',points='$points' WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_quiz_attachment(){
            $id=$this->input->post('id');
            $topic_id=$this->input->post('topic_id');
            $lesson_id=$this->input->post('lesson_id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('pdf');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("UPDATE quizzes SET document='$imgContent' WHERE id='$id'");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getSingleQuiz($id){
            $result=$this->db->query("SELECT * FROM quizzes WHERE id='$id'");
            return $result->row_array();
        }
        public function remove_quiz_attachment($id){
            $result=$this->db->query("UPDATE quizzes SET document='' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function update_quiz_status($id,$status){
            $result=$this->db->query("UPDATE quizzes SET `status`='$status' WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function registration(){
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $student_id=$this->input->post('student_id');
            $lastname=$this->input->post('lastname');
            $firstname=$this->input->post('firstname');
            $check=$this->db->query("SELECT * FROM student WHERE username='$username'");
            if($check->num_rowS() > 0){
                return false;
            }else{
                $result=$this->db->query("UPDATE student SET username='$username',`password`='$password',datearray='$date' WHERE student_id='$student_id'");
                if($result){
                    return true;
                }else{
                    return false;
                }
            }        
        }
        public function authenticate($username,$password){
            $result=$this->db->query("SELECT * FROM student WHERE username='$username' AND `password`='$password'");
            if($result->num_rows()>0){
                $date=date('Y-m-d');
                $time=date('H:i:s');
                $this->db->query("UPDATE student SET date_login='$date',time_login='$time' WHERE username='$username'");                
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function getAllLessonByStatus($status){
            $result=$this->db->query("SELECT * FROM lessons WHERE `status`='$status' ORDER BY `quarter` ASC, id ASC");
            return $result->result_array();
        }
        public function getAllTaskByStatus($id,$status){
            $result=$this->db->query("SELECT l.description as lesson,q.* FROM lessons_details q INNER JOIN lessons l ON l.id=q.lesson_id WHERE l.id='$id' AND q.status='$status' ORDER BY q.datearray ASC");
            return $result->result_array();
        }        
        public function getAllQuizzesByLessonStatus($id,$status){
            $result=$this->db->query("SELECT l.description,q.* FROM quizzes q INNER JOIN lessons l ON l.id=q.lesson_id WHERE l.id='$id' AND q.status='$status' ORDER BY q.datearray ASC");
            return $result->result_array();
        }
        public function getAllAssignmentsByLessonStatus($id,$status){
            $result=$this->db->query("SELECT l.description,q.* FROM assignment q INNER JOIN lessons l ON l.id=q.lesson_id WHERE l.id='$id' AND q.status='$status' ORDER BY q.datearray ASC");
            return $result->result_array();
        }
        public function getAllAssignmentByTaskStatus($id,$status){
            $result=$this->db->query("SELECT * FROM assignment WHERE topic_id='$id' AND `status`='posted' ORDER BY datearray ASC,`description` ASC");
            return $result->result_array();
        }
        public function getAllQuizByTaskStatus($id,$status){
            $result=$this->db->query("SELECT * FROM quizzes WHERE topic_id='$id' AND `status`='$status' ORDER BY datearray ASC,`description` ASC");
            return $result->result_array();
        }
        public function getAllAssignmentByStudent($id,$student_id){
            $result=$this->db->query("SELECT * FROM assignment_details WHERE assignment_id='$id' AND student_id='$student_id'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function remove_student_assignment_attachment($id){
            $result=$this->db->query("DELETE FROM assignment_details WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function save_student_assignment_attachment(){
            $student_id=$this->session->student_id;
            $id=$this->input->post('id');
            $topic_id=$this->input->post('topic_id');
            $lesson_id=$this->input->post('lesson_id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('pdf');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("INSERT INTO assignment_details(assignment_id,student_id,document,score) VALUES('$id','$student_id','$imgContent','')");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getSingleAssignmentByStudent($id){
            $result=$this->db->query("SELECT * FROM assignment_details WHERE id='$id'");
            return $result->row_array();
        }
        public function getAllQuizzesByStudent($id,$student_id){
            $result=$this->db->query("SELECT * FROM quizzes_details WHERE quiz_id='$id' AND student_id='$student_id'");
            if($result->num_rows()>0){
                return $result->row_array();
            }else{
                return false;
            }
        }
        public function save_student_quiz_attachment(){
            $student_id=$this->session->student_id;
            $id=$this->input->post('id');
            $topic_id=$this->input->post('topic_id');
            $lesson_id=$this->input->post('lesson_id');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('pdf');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("INSERT INTO quizzes_details(quiz_id,student_id,document,score) VALUES('$id','$student_id','$imgContent','')");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getSingleQuizByStudent($id){
            $result=$this->db->query("SELECT * FROM quizzes_details WHERE id='$id'");
            return $result->row_array();
        }
        public function remove_student_quiz_attachment($id){
            $result=$this->db->query("DELETE FROM quizzes_details WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
    }
?>
