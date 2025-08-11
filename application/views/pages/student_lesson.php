<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">My Dashboard</a>
        </li>        
        <li>
            My Lessons
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

                <!-- <div class="box-icon">
                    <a href="#" class="btn btn-round btn-default addLesson" title="Add New Lesson" data-toggle="modal" data-target="#ManageLesson"><i
                            class="glyphicon glyphicon-plus"></i></a>                    
                </div> -->
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>   
                        <th>No.</th>                     
                        <th>Description</th>                                                                                               
                        <th>Topics</th>                        
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($lessons as $item){                            
                            // $quiz=$this->Learning_model->getAllQuizzesByLesson($item['id']);
                            // $assign=$this->Learning_model->getAllAssignmentsByLesson($item['id']);
                            $task=$this->Learning_model->getAllTaskByStatus($item['id'],'posted');
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[description]</td>";                                
                                echo "<td align='center'>".count($task)."</td>";                                 
                                ?>
                                <td>
                                    <a href="<?=base_url('view_lesson_topic/'.$item['id']);?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-eye"></i> View</a>
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