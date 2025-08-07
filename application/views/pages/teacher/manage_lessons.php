<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('teachermain');?>">My Dashboard</a>
        </li>        
        <li>
            Lesson Manager
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
                <h2><i class="glyphicon glyphicon-book"></i> Lesson List</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-round btn-default addLesson" title="Add New Lesson" data-toggle="modal" data-target="#ManageLesson"><i
                            class="glyphicon glyphicon-plus"></i></a>                    
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th>No.</th>                     
                        <th>Description</th>                        
                        <th>Quarter</th>                                                
                        <th>Topics</th>
                        <th>Status</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($users as $item){ 
                            if($item['status']=="pending"){
                                $post="";
                                $unpost="style='display:none;'";
                                $complete="style='display:none;'";
                            }else if($item['status']=="posted"){
                                $post="style='display:none;'";
                                $unpost="";
                                $complete="";
                            }else{
                                $post="style='display:none;'";
                                $unpost="style='display:none;'";
                                $complete="style='display:none;'";
                            }
                            // $quiz=$this->Learning_model->getAllQuizzesByLesson($item['id']);
                            // $assign=$this->Learning_model->getAllAssignmentsByLesson($item['id']);
                            $task=$this->Learning_model->getAllTask($item['id']);
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[description]</td>";
                                echo "<td>$item[quarter]</td>";
                                echo "<td align='center'><a href='".base_url('manage_topics/'.$item['id'])."' class='btn btn-info btn-sm'>".count($task)."</a></td>"; 
                                echo "<td>$item[status]</td>";
                                ?>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm editLesson" data-toggle="modal" data-target="#ManageLesson" data-id="<?=$item['id'];?>_<?=$item['description'];?>_<?=$item['quarter'];?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>                                    
                                    <a href="<?=base_url('update_lesson_status/'.$item['id']."/posted");?>" class="btn btn-primary btn-sm" onclick="return confirm('Do you wish to post this topic?');return false;" <?=$post;?>><i class="glyphicon glyphicon-upload"></i> Post</a>
                                    <a href="<?=base_url('update_lesson_status/'.$item['id']."/pending");?>" class="btn btn-info btn-sm" onclick="return confirm('Do you wish to unpost this topic?');return false;" <?=$unpost;?>><i class="glyphicon glyphicon-download"></i> Unpost</a>
                                    <a href="<?=base_url('update_lesson_status/'.$item['id']."/completed");?>" class="btn btn-success btn-sm" onclick="return confirm('Do you wish to complete this topic?');return false;" <?=$complete;?>><i class="glyphicon glyphicon-thumbs-up"></i> Complete</a>
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