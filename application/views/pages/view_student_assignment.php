<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('teachermain');?>">My Dashboard</a>
        </li>        
        <li>
            <a href="<?=base_url('student_lesson');?>">My Lesson</a>
        </li>
        <li>
            <a href="<?=base_url('view_lesson_topic/'.$lesson['id']);?>">Lesson Topic (<b><?=$lesson['description'];?></b>)</a>
        </li>
        <li>
            My Assignment (<?=$topic['description'];?>)
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
                <h2><i class="glyphicon glyphicon-book"></i> Assignment List</h2>

                <!-- <div class="box-icon">
                    <a href="#" class="btn btn-round btn-default addAssignment" title="Add New Assignment" data-toggle="modal" data-target="#ManageAssignment" data-id="<?=$topic['id'];?>_<?=$lesson['id'];?>"><i
                            class="glyphicon glyphicon-plus"></i></a>                    
                </div> -->
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th>No.</th>                     
                        <th>Description</th>
                        <th>Total Points</th>
                        <th>Uploads</th>
                        <th>My Score</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($users as $item){
                            $assign=$this->Learning_model->getAllAssignmentByStudent($item['id'],$this->session->student_id);
                            $score=0;
                            if($assign){
                                $score=$assign['score'];
                                if($assign['score'] == 0){
                                    $upload = "<a href='".base_url('remove_student_assignment_attachment/'.$assign['id']."/".$topic['id']."/".$lesson['id'])."' class='btn btn-danger btn-sm'>Remove Attachment</a>";   
                                }else{
                                    $upload="";
                                }             
                                $myview="<a href='".base_url('view_my_assignment/'.$assign['id'])."' class='btn btn-primary btn-sm' target='_blank'><i class='glyphicon glyphicon-search'></i></a>";
                            }else{
                                $myview="";
                                $upload = "<a href='#' class='btn btn-info btn-sm assignStudentAttach' data-toggle='modal' data-target='#ManageStudentAssignment' data-id='$item[id]_$topic[id]_$lesson[id]'>Add Attachment</a>";
                            }
                            if($item['document']==""){                                
                                $view="";                                                                
                            }else{
                                $view="<a href='".base_url('view_assignment/'.$item['id'])."' class='btn btn-primary btn-sm' target='_blank'><i class='glyphicon glyphicon-search'></i> View Assignment</a>";                                
                            }                               
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[description]</td>";                                                                
                                echo "<td>$item[points]</td>";
                                echo "<td>$upload $myview</td>";
                                echo "<td>$score</td>";
                                ?>
                                <td>
                                    <?=$view;?>
                                </td>
                                <?php
                            echo "</tr>";
                            $x++;
                        }
                        ?>
                    </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>