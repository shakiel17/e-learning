<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('adminmain');?>">My Dashboard</a>
        </li>        
        <li>
            Student Manager
        </li>
    </ul>
</div>
<?php
if($this->session->flashdata('success')){
    echo "<div class='alert alert-success'>".$this->session->flashdata('success')."</div>";
}
if($this->session->flashdata('failed')){
    echo "<div class='alert alert-danger'>".$this->session->flashdata('failed')."</div>";
}
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-user"></i> Student List</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-round btn-default addStudent" title="Add New Student" data-toggle="modal" data-target="#ManageStudent"><i
                            class="glyphicon glyphicon-plus"></i></a>                    
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Username</th>
                        <th>Date/Time Login</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($users as $item){
                            
                            echo "<tr>";
                                echo "<td>$item[student_id]</td>";
                                echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                                echo "<td>$item[student_gender]</td>";
                                echo "<td>$item[username]</td>";
                                echo "<td>$item[date_login] $item[time_login]</td>";
                                ?>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm editStudent" data-toggle="modal" data-target="#ManageStudent" data-id="<?=$item['id'];?>_<?=$item['student_id'];?>_<?=$item['student_lastname'];?>_<?=$item['student_firstname'];?>_<?=$item['student_middlename'];?>_<?=$item['student_gender'];?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <a href="<?=base_url('delete_student/'.$item['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this student?');return false;"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                </td>
                                <?php
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>