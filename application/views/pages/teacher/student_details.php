<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('teachermain');?>">My Dashboard</a>
        </li>
        <li>
            <a href="<?=base_url('student_list');?>">Student List</a>
        </li>        
        <li>
            Student Profile
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
    <div class="box col-md-4 col-sm-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-user"></i> Student Profile</h2>                
            </div>
            <div class="box-content">
                <table width="100%" border="0">
                    <tr>                        
                        <td width="30%">Student ID:<td>
                        <td><?=$user['student_id'];?></td>
                    </tr>
                    <tr>                        
                        <td>Student Name:<td>
                        <td><?=$user['student_lastname'];?>, <?=$user['student_firstname'];?> <?=$user['student_middlename'];?></td>
                    </tr>
                    <tr>                        
                        <td>Gender:<td>
                        <td><?=$user['student_gender'];?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="box col-md-8 col-sm-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-book"></i> Assignment</h2>                
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>                                              
                        <th>Lesson</th>
                        <th>Topic</th>
                        <th>Assignment</th>                        
                        <th>Total Points</th>
                        <th>Score</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach($assignment as $item){
                            echo "<tr>";
                                echo "<td>$item[lesson]</td>";
                                echo "<td>$item[topic]</td>";
                                echo "<td>$item[description]</td>";
                                echo "<td>$item[items]</td>";
                                echo "<td>$item[score]</td>";
                                ?>
                                <td>
                                    <a href="<?=base_url('view_my_assignment/'.$item['aid']);?>" class="btn btn-success btn-sm" target="_blank"><i class="glyphicon glyphicon-search"></i> View</a>
                                    <a href="#" class="btn btn-primary btn-sm editAssignScore" data-toggle="modal" data-target="#ManageAssignScore" data-id="<?=$item['aid'];?>_<?=$student_id;?>_<?=$item['score'];?>"><i class="glyphicon glyphicon-edit"></i> Score</a>
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
    <div class="box col-md-4 col-sm-12">
        
    </div>
    <div class="box col-md-8 col-sm-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-book"></i> Quizzes</h2>                
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>                                           
                        <th>Lesson</th>
                        <th>Topic</th>
                        <th>Quiz</th>                        
                        <th>Total Points</th>
                        <th>Score</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($quizzes as $item){
                            echo "<tr>";
                                echo "<td>$item[lesson]</td>";
                                echo "<td>$item[topic]</td>";
                                echo "<td>$item[description]</td>";
                                echo "<td>$item[items]</td>";
                                echo "<td>$item[score]</td>";
                                ?>
                                <td>
                                    <a href="<?=base_url('view_my_quiz/'.$item['qid']);?>" class="btn btn-success btn-sm" target="_blank"><i class="glyphicon glyphicon-search"></i> View</a>
                                    <a href="#" class="btn btn-primary btn-sm editQuizScore" data-toggle="modal" data-target="#ManageQuizScore" data-id="<?=$item['qid'];?>_<?=$student_id;?>_<?=$item['score'];?>"><i class="glyphicon glyphicon-edit"></i> Score</a>
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