<div class="modal fade" id="adminlogout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                <a href="<?=base_url('adminlogout');?>" class="btn btn-primary">Yes, Log me out</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ManageUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_users');?>" method="POST">
                <input type="hidden" name="id" id="user_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage User</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" id="user_fullname" placeholder="Enter Fullname" name="fullname">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="user_name" placeholder="Enter Username" name="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" id="user_password" placeholder="Enter Password" name="password">
                </div>
                <div class="form-group">
                    <label>User Type</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="role" id="user_teacher" value="teacher" checked>
                            Teacher
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="role" id="user_admin" value="admin">
                            Admin
                        </label>
                    </div>
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

<div class="modal fade" id="ManageStudent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_student');?>" method="POST">
                <input type="hidden" name="id" id="student_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Student</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Student ID</label>
                    <input type="text" class="form-control" id="stud_id" placeholder="Enter Student ID" name="student_id" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" id="stud_lastname" placeholder="Enter Lastname" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" id="stud_firstname" placeholder="Enter Firstname" name="firstname" required>
                </div> 
                <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input type="text" class="form-control" id="stud_middlename" placeholder="Enter Middlename" name="middlename">
                </div>              
                <div class="form-group">
                    <label>Gender</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="stud_male" value="male" checked>
                            Male
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender" id="stud_female" value="female">
                            Female
                        </label>
                    </div>
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

<div class="modal fade" id="ManageGame" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_game');?>" method="POST">
                <input type="hidden" name="id" id="game_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Manage Game</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Topic</label>
                    <input type="text" class="form-control" id="game_description" placeholder="(e.g. Vocabulary, Grammar, Reading Comprehension)" name="description">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <input type="text" class="form-control" id="game_category" placeholder="(e.g. Identification, Multiple Choice, Fill in the blanks)" name="category">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Instructions</label>
                    <textarea name="instructions" class="form-control" rows="3" id="game_instructions"></textarea>
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

<div class="modal fade" id="ManageQuestion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="<?=base_url('save_game_question');?>" method="POST">
                <input type="hidden" name="id" id="question_id">
                <input type="hidden" name="game_id" id="question_game_id">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Game Question (<?=$game['description'];?> | <?=$game['category'];?>)</h3>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Question</label>
                    <input type="text" class="form-control" id="question_description" placeholder="" name="description">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Choice 1</label>
                    <input type="text" class="form-control" id="question_choice1" placeholder="" name="choice1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Choice 2</label>
                    <input type="text" class="form-control" id="question_choice1" placeholder="" name="choice2">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Choice 3</label>
                    <input type="text" class="form-control" id="question_choice1" placeholder="" name="choice3">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Choice 4</label>
                    <input type="text" class="form-control" id="question_choice1" placeholder="" name="choice4">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer</label>
                    <input type="text" class="form-control" id="question_choice1" placeholder="" name="answer">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select name="category" class="form-control" required id="question_category">
                        <option value="">Select Category</option>
                        <option value="Easy">Easy</option>
                        <option value="Moderate">Moderate</option>
                        <option value="Difficult">Difficult</option>
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