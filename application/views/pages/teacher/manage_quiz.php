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
            <a href="<?=base_url('manage_topics/'.$lesson['id']);?>">Topic Manager (<b><?=$lesson['description'];?></b>)</a>
        </li>
        <li>
            Quiz Manager (<?=$topic['description'];?>)
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
                <h2><i class="glyphicon glyphicon-book"></i> Quiz List</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-round btn-default addQuiz" title="Add New Quiz" data-toggle="modal" data-target="#ManageQuiz" data-id="<?=$topic['id'];?>_<?=$lesson['id'];?>"><i
                            class="glyphicon glyphicon-plus"></i></a>                    
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th>No.</th>                     
                        <th>Description</th>
                        <th>Total Points</th>
                        <th>Attachment</th>                        
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
                            if($item['document']==""){
                                $post="style='display:none;'";
                                $unpost="style='display:none;'";
                                $complete="style='display:none;'";
                                $view="";
                                $upload = "<a href='#' class='btn btn-info btn-sm quizAttach' data-toggle='modal' data-target='#ManageQuizAttachment' data-id='$item[id]_$topic[id]_$lesson[id]'>Add Attachment</a>";
                            }else{
                                $view="<a href='".base_url('view_quiz/'.$item['id'])."' class='btn btn-primary btn-sm' target='_blank'><i class='glyphicon glyphicon-search'></i></a>";
                                $upload = "<a href='".base_url('remove_quiz_attachment/'.$item['id']."/".$topic['id']."/".$lesson['id'])."' class='btn btn-danger btn-sm'>Remove Attachment</a>";
                            }                                            
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[description]</td>";                                
                                echo "<td>$item[points]</td>"; 
                                echo "<td align='center'>$upload $view</td>"; 
                                echo "<td>$item[status]</td>";
                                ?>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm editQuiz" data-toggle="modal" data-target="#ManageQuiz" data-id="<?=$item['id'];?>_<?=$topic['id'];?>_<?=$lesson['id'];?>_<?=$item['description'];?>_<?=$item['points'];?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>                                    
                                    <a href="<?=base_url('update_quiz_status/'.$item['id']."/".$topic['id']."/".$lesson['id']."/posted");?>" class="btn btn-primary btn-sm" onclick="return confirm('Do you wish to post this quiz?');return false;" <?=$post;?>><i class="glyphicon glyphicon-upload"></i> Post</a>
                                    <a href="<?=base_url('update_quiz_status/'.$item['id']."/".$topic['id']."/".$lesson['id']."/pending");?>" class="btn btn-info btn-sm" onclick="return confirm('Do you wish to unpost this quiz?');return false;" <?=$unpost;?>><i class="glyphicon glyphicon-download"></i> Unpost</a>
                                    <a href="<?=base_url('update_quiz_status/'.$item['id']."/".$topic['id']."/".$lesson['id']."/completed");?>" class="btn btn-success btn-sm" onclick="return confirm('Do you wish to complete this quiz?');return false;" <?=$complete;?>><i class="glyphicon glyphicon-thumbs-up"></i> Complete</a>
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