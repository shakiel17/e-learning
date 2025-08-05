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
            $result=$this->db->query("SELECT * FROM lessons ORDER BY `quarter` ASC, `description` ASC");
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
    }
?>
