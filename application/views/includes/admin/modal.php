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
                    <input type="text" class="form-control" id="stud_id" placeholder="Enter Lastname" name="student_id" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" id="stud_lastname" placeholder="Enter Student ID" name="lastname" required>
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