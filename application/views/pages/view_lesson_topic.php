<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">My Dashboard</a>
        </li>        
        <li>
            <a href="<?=base_url('student_lesson');?>">My Lesson</a>
        </li>
        <li>
            Lesson Topics (<b><?=$lesson['description'];?></b>)
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
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th>No.</th>                     
                        <th>Description</th>                        
                        <th>Assignment</th>
                        <th>Quizzes</th>                        
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($users as $item){ 
                            $quiz=$this->Learning_model->getAllQuizzesByLessonStatus($lesson['id'],'posted');
                            $assign=$this->Learning_model->getAllAssignmentsByLessonStatus($lesson['id'],'posted');
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
                            }else{
                                $view="<a href='".base_url('view_topic/'.$item['id'])."' class='btn btn-primary btn-sm' target='_blank'><i class='glyphicon glyphicon-search'></i> View</a>";
                            }                            
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[description]</td>";                                
                                 echo "<td align='center'><a href='".base_url('view_student_assignment/'.$item['id']."/".$lesson['id'])."' class='btn btn-info btn-sm'>".count($assign)."</a></td>"; 
                                echo "<td align='center'><a href='".base_url('view_student_quiz/'.$item['id']."/".$lesson['id'])."' class='btn btn-info btn-sm'>".count($quiz)."</a></td>";                                
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