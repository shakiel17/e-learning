<div class="modal fade" id="teacherlogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <a href="<?=base_url('teacherlogout');?>" class="btn btn-primary">Yes, Log me out</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageLesson" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_lessons');?>" method="POST">
                <input type="hidden" name="id" id="lesson_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Lesson</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" rows="3" class="form-control" id="lesson_description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quarter</label>
                    <select name="quarter" class="form-control" id="lesson_quarter" required>
                        <option value="">Select Quarter</option>
                        <option value="Q1">Quarter 1</option>
                        <option value="Q2">Quarter 2</option>
                        <option value="Q3">Quarter 3</option>
                        <option value="Q4">Quarter 4</option>
                    </select>
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

<div class="modal fade" id="ManageTopic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_topic');?>" method="POST">
                <input type="hidden" name="id" id="topic_id">
                <input type="hidden" name="lesson_id" id="topic_lesson_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Topic</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" rows="3" class="form-control" id="topic_description" required></textarea>
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

<div class="modal fade" id="ManageTopicAttachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_topic_attachment');?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="topic_attach_id">
                <input type="hidden" name="lesson_id" id="topic_attach_lesson_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Topic</h3>
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

<div class="modal fade" id="ManageAssignment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_assignment');?>" method="POST">
                <input type="hidden" name="id" id="assign_id">
                <input type="hidden" name="topic_id" id="assign_topic_id">                
                <input type="hidden" name="lesson_id" id="assign_lesson_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Add Assignment</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" rows="3" class="form-control" id="assign_description" required></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Total Points</label>
                    <input type="text" name="points" class="form-control" id="assign_points">
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

<div class="modal fade" id="ManageAssignmentAttachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_assignment_attachment');?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="assign_attach_id">
                <input type="hidden" name="lesson_id" id="assign_attach_lesson_id">
                <input type="hidden" name="topic_id" id="assign_topic_attach_lesson_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Assignment</h3>
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

<div class="modal fade" id="ManageQuiz" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_quiz');?>" method="POST">
                <input type="hidden" name="id" id="quiz_id">
                <input type="hidden" name="topic_id" id="quiz_topic_id">                
                <input type="hidden" name="lesson_id" id="quiz_lesson_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Add Quiz</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description" rows="3" class="form-control" id="quiz_description" required></textarea>
                </div>                                
                <div class="form-group">
                    <label for="exampleInputEmail1">Total Points</label>
                    <input type="text" name="points" class="form-control" id="quiz_points">
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

<div class="modal fade" id="ManageQuizAttachment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_quiz_attachment');?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="quiz_attach_id">
                <input type="hidden" name="lesson_id" id="quiz_attach_lesson_id">
                <input type="hidden" name="topic_id" id="quiz_topic_attach_lesson_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Quiz</h3>
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

<div class="modal fade" id="ManageAssignScore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_assignment_score');?>" method="POST">
                <input type="hidden" name="id" id="assign_score_id">               
                <input type="hidden" name="student_id" id="assign_score_student_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Update Assignment Score</h3>
            </div>
            <div class="modal-body">                                                
                <div class="form-group">
                    <label for="exampleInputEmail1">Total Points</label>
                    <input type="text" name="score" class="form-control" id="assign_score">
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
<div class="modal fade" id="ManageQuizScore" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_quiz_score');?>" method="POST">
                <input type="hidden" name="id" id="quiz_score_id">               
                <input type="hidden" name="student_id" id="quiz_score_student_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Update Quiz Score</h3>
            </div>
            <div class="modal-body">                                                
                <div class="form-group">
                    <label for="exampleInputEmail1">Total Points</label>
                    <input type="text" name="score" class="form-control" id="quiz_score">
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