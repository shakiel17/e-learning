<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Logout</h3>
            </div>
            <div class="modal-body">
                <h2>Do you wish to logout?</h2>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">No, I will stay</a>
                <a href="<?=base_url('logout');?>" class="btn btn-primary">Yes, Log me out</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ManageStudentAssignment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_student_assignment_attachment');?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="assign_student_attach_id">
                <input type="hidden" name="lesson_id" id="assign_student_attach_lesson_id">
                <input type="hidden" name="topic_id" id="assign_student_topic_attach_lesson_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Assignment Attachment</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload Document</label>
                    <input type="file" name="file" class="form-control" accept="application/pdf">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="ManageStudentQuiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_student_quiz_attachment');?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="quiz_student_attach_id">
                <input type="hidden" name="lesson_id" id="quiz_student_attach_lesson_id">
                <input type="hidden" name="topic_id" id="quiz_student_topic_attach_lesson_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Quiz Attachment</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload Document</label>
                    <input type="file" name="file" class="form-control" accept="application/pdf">
                </div>                                
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>