
<script src="<?=base_url('design/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>

<!-- library for cookie management -->
<script src="<?=base_url('design/js/jquery.cookie.js');?>"></script>
<!-- calender plugin -->
<script src='<?=base_url('design/bower_components/moment/min/moment.min.js');?>'></script>
<script src='<?=base_url('design/bower_components/fullcalendar/dist/fullcalendar.min.js');?>'></script>
<!-- data table plugin -->
<script src='<?=base_url('design/js/jquery.dataTables.min.js');?>'></script>

<!-- select or dropdown enhancer -->
<script src="<?=base_url('design/bower_components/chosen/chosen.jquery.min.js');?>"></script>
<!-- plugin for gallery image view -->
<script src="<?=base_url('design/bower_components/colorbox/jquery.colorbox-min.js');?>"></script>
<!-- notification plugin -->
<script src="<?=base_url('design/js/jquery.noty.js');?>"></script>
<!-- library for making tables responsive -->
<script src="<?=base_url('design/bower_components/responsive-tables/responsive-tables.js');?>"></script>
<!-- tour plugin -->
<script src="<?=base_url('design/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js');?>"></script>
<!-- star rating plugin -->
<script src="<?=base_url('design/js/jquery.raty.min.js');?>"></script>
<!-- for iOS style toggle switch -->
<script src="<?=base_url('design/js/jquery.iphone.toggle.js');?>"></script>
<!-- autogrowing textarea plugin -->
<script src="<?=base_url('design/js/jquery.autogrow-textarea.js');?>"></script>
<!-- multiple file upload plugin -->
<script src="<?=base_url('design/js/jquery.uploadify-3.1.min.js');?>"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?=base_url('design/js/jquery.history.js');?>"></script>
<!-- application script for Charisma demo -->
<script src="<?=base_url('design/js/charisma.js');?>"></script>

<script>
    $('.addUser').click(function(){
        document.getElementById('user_id').value='';
        document.getElementById('user_fullname').value='';
        document.getElementById('user_name').value='';
        document.getElementById('user_password').value='';
        document.getElementById('user_teacher').checked = true;
    });
    $('.editUser').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('user_id').value=id[0];
        document.getElementById('user_fullname').value=id[1];
        document.getElementById('user_name').value=id[2];
        document.getElementById('user_password').value=id[3];
        if(id[4]=="teacher"){
            document.getElementById('user_teacher').checked = true;
        }else{
            document.getElementById('user_admin').checked = true;
        }
    });

    $('.addStudent').click(function(){
        document.getElementById('student_id').value='';
        document.getElementById('stud_id').value='';
        document.getElementById('stud_lastname').value='';
        document.getElementById('stud_firstname').value='';
        document.getElementById('stud_middlename').value='';
        document.getElementById('stud_male').checked = true;
    });
    $('.editStudent').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');        
        document.getElementById('student_id').value=id[0];
        document.getElementById('stud_id').value=id[1];
        document.getElementById('stud_lastname').value=id[2];
        document.getElementById('stud_firstname').value=id[3];
        document.getElementById('stud_middlename').value=id[4];     
        if(id[5]=="male"){
            document.getElementById('stud_male').checked = true;
        }else{
            document.getElementById('stud_female').checked = true;
        }
    });
    $('.addLesson').click(function(){
        document.getElementById('lesson_id').value='';
        document.getElementById('lesson_description').value='';
        document.getElementById('lesson_quarter').value='';
    });
    $('.editLesson').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('lesson_id').value=id[0];
        document.getElementById('lesson_description').value=id[1];
        document.getElementById('lesson_quarter').value=id[2];
    });
    $('.addTopic').click(function(){
        var id=$(this).data('id');
        document.getElementById('topic_id').value='';
        document.getElementById('topic_description').value='';        
        document.getElementById('topic_lesson_id').value=id;
    });
    $('.editTopic').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('topic_id').value=id[0];
        document.getElementById('topic_description').value=id[1];        
        document.getElementById('topic_lesson_id').value=id[2];
    });
    $('.topicAttach').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('topic_attach_id').value=id[0];        
        document.getElementById('topic_attach_lesson_id').value=id[1];
    });
    $('.addAssignment').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('assign_topic_id').value=id[0];        
        document.getElementById('assign_lesson_id').value=id[1];
    });
    $('.editAssignment').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('assign_id').value=id[0];        
        document.getElementById('assign_topic_id').value=id[1];
        document.getElementById('assign_lesson_id').value=id[2];
        document.getElementById('assign_description').value=id[3];
        document.getElementById('assign_points').value=id[4];
    });
    $('.assignmentAttach').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('assign_attach_id').value=id[0];        
        document.getElementById('assign_topic_attach_lesson_id').value=id[1];
        document.getElementById('assign_attach_lesson_id').value=id[2];
    });

    $('.addQuiz').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('quiz_topic_id').value=id[0];        
        document.getElementById('quiz_lesson_id').value=id[1];
    });
    $('.editQuiz').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('quiz_id').value=id[0];        
        document.getElementById('quiz_topic_id').value=id[1];
        document.getElementById('quiz_lesson_id').value=id[2];
        document.getElementById('quiz_description').value=id[3];
        document.getElementById('quiz_points').value=id[4];
    });
    
    $('.quizAttach').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('quiz_attach_id').value=id[0];        
        document.getElementById('quiz_topic_attach_lesson_id').value=id[1];
        document.getElementById('quiz_attach_lesson_id').value=id[2];
    });
    $('.assignStudentAttach').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('assign_student_attach_id').value=id[0];        
        document.getElementById('assign_student_topic_attach_lesson_id').value=id[1];
        document.getElementById('assign_student_attach_lesson_id').value=id[2];
    });
    $('.quizStudentAttach').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('quiz_student_attach_id').value=id[0];        
        document.getElementById('quiz_student_topic_attach_lesson_id').value=id[1];
        document.getElementById('quiz_student_attach_lesson_id').value=id[2];
    });
    $('.editAssignScore').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('assign_score_id').value=id[0];        
        document.getElementById('assign_score_student_id').value=id[1];
        document.getElementById('assign_score').value=id[3];                
    });
    $('.editQuizScore').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('quiz_score_id').value=id[0];        
        document.getElementById('quiz_score_student_id').value=id[1];
        document.getElementById('quiz_score').value=id[3];                
    });
    $('.addGame').click(function(){
        document.getElementById('game_id').value='';
        document.getElementById('game_description').value='';
        document.getElementById('game_category').value='';        
    });
    $('.editGame').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('game_id').value=id[0];
        document.getElementById('game_description').value=id[1];
        document.getElementById('game_category').value=id[2];
        document.getElementById('game_instructions').value=id[3];
    });
    $('.addQuestion').click(function(){
        var data=$(this).data('id');
        document.getElementById('question_id').value='';
        document.getElementById('question_game_id').value= data;
        document.getElementById('question_description').value='';
        document.getElementById('question_choice1').value='';
        document.getElementById('question_choice2').value='';
        document.getElementById('question_choice3').value='';
        document.getElementById('question_choice4').value='';
        document.getElementById('question_answer').value='';
        document.getElementById('question_category').value='';
    });
    $('.editQuestion').click(function(){
        var data=$(this).data('id');
        var id=data.split('_');
        document.getElementById('question_id').value=id[0];
        document.getElementById('question_game_id').value=id[1];
        document.getElementById('question_description').value=id[2];
        document.getElementById('question_choice1').value=id[3];
        document.getElementById('question_choice2').value=id[4];
        document.getElementById('question_choice3').value=id[5];
        document.getElementById('question_choice4').value=id[6];
        document.getElementById('question_answer').value=id[7];
        document.getElementById('question_category').value=id[8];
    });
</script>


</body>
</html>
