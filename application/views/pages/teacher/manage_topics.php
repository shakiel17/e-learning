<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('teachermain');?>">My Dashboard</a>
        </li>        
        <li>
            <a href="<?=base_url('manage_lessons');?>">Lesson Manager</a>
        </li>
        <li>
            Topic Manager (<b><?=$lesson['description'];?></b>)
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
                <h2><i class="glyphicon glyphicon-book"></i> Topic List</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-round btn-default addTopic" title="Add New Topic" data-toggle="modal" data-target="#ManageTopic" data-id="<?=$lesson['id'];?>"><i
                            class="glyphicon glyphicon-plus"></i></a>                    
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th>No.</th>                     
                        <th>Description</th>
                        <th>Attachment</th>
                        <th>Assignment</th>
                        <th>Quizzes</th>
                        <th>Status</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($users as $item){ 
                            $quiz=$this->Learning_model->getAllQuizzesByLesson($lesson['id']);
                            $assign=$this->Learning_model->getAllAssignmentsByLesson($lesson['id']);
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
                            if($item['document']==""){
                                $post="style='display:none;'";
                                $unpost="style='display:none;'";
                                $complete="style='display:none;'";
                                $view="";
                                $upload = "<a href='#' class='btn btn-info btn-sm topicAttach' data-toggle='modal' data-target='#ManageTopicAttachment' data-id='$item[id]_$lesson[id]'>Add Attachment</a>";
                            }else{
                                $view="<a href='".base_url('view_topic/'.$item['id'])."' class='btn btn-primary btn-sm' target='_blank'><i class='glyphicon glyphicon-search'></i></a>";
                                $upload = "<a href='".base_url('remove_topic_attachment/'.$item['id']."/".$lesson['id'])."' class='btn btn-danger btn-sm'>Remove Attachment</a>";
                            }                            
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[description]</td>";
                                echo "<td>$upload $view</td>";
                                 echo "<td align='center'><a href='".base_url('manage_assignment/'.$item['id']."/".$lesson['id'])."' class='btn btn-info btn-sm'>".count($assign)."</a></td>"; 
                                echo "<td align='center'><a href='".base_url('manage_quiz/'.$item['id']."/".$lesson['id'])."' class='btn btn-info btn-sm'>".count($quiz)."</a></td>";
                                echo "<td>$item[status]</td>";
                                ?>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm editTopic" data-toggle="modal" data-target="#ManageTopic" data-id="<?=$item['id'];?>_<?=$item['description'];?>_<?=$lesson['id'];?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>                                                                        
                                    <a href="<?=base_url('update_topic_status/'.$item['id']."/".$lesson['id']."/posted");?>" class="btn btn-primary btn-sm" onclick="return confirm('Do you wish to post this topic?');return false;" <?=$post;?>><i class="glyphicon glyphicon-upload"></i> Post</a>
                                    <a href="<?=base_url('update_topic_status/'.$item['id']."/".$lesson['id']."/pending");?>" class="btn btn-info btn-sm" onclick="return confirm('Do you wish to unpost this topic?');return false;" <?=$unpost;?>><i class="glyphicon glyphicon-download"></i> Unpost</a>
                                    <a href="<?=base_url('update_topic_status/'.$item['id']."/".$lesson['id']."/completed");?>" class="btn btn-success btn-sm" onclick="return confirm('Do you wish to complete this topic?');return false;" <?=$complete;?>><i class="glyphicon glyphicon-thumbs-up"></i> Complete</a>                                    
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