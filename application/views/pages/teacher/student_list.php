<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('teachermain');?>">My Dashboard</a>
        </li>        
        <li>
            Student List
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
                                ?>
                                <td>  
                                    <a href="<?=base_url('student_details/'.$item['student_id']);?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-th-list"></i> Manage</a>                                  
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