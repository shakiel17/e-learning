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
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($users as $item){ 
                            if($item['document']==""){
                                $view="";
                                $upload = "<a href='#' class='btn btn-info btn-sm topicAttach' data-toggle='modal' data-target='#ManageTopicAttachment' data-id='$item[id]_$lesson[id]'>Add Attachment</a>";
                            }else{
                                $view="<a href='".base_url('view_topic/'.$item['id'])."' class='btn btn-primary btn-sm' target='_blank'><i class='glyphicon glyphicon-search'></i> View Attachment</a>";
                                $upload = "<a href='".base_url('remove_topic_attachment/'.$item['id']."/".$lesson['id'])."' class='btn btn-danger btn-sm'>Remove Attachment</a>";
                            }
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[description]</td>";                                
                                echo "<td>$upload</td>";
                                ?>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm editTopic" data-toggle="modal" data-target="#ManageTopic" data-id="<?=$item['id'];?>_<?=$item['description'];?>_<?=$lesson['id'];?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>                                    
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