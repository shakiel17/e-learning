<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('adminmain');?>">My Dashboard</a>
        </li>        
        <li>
            <a href="<?=base_url('manage_games');?>">Games Manager</a>
        </li>
        <li>
            Game Details <b>(<?=$game['description'];?> | <?=$game['category'];?>)</b>
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
                <h2><i class="glyphicon glyphicon-question-sign"></i> Questions List</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-round btn-default addQuestion" title="Add New Question" data-toggle="modal" data-target="#ManageQuestion" data-id="<?=$game['id'];?>"><i
                            class="glyphicon glyphicon-plus"></i></a>                    
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>
                        <th>Question</th>                        
                        <th>Choice 1</th>
                        <th>Choice 1</th>
                        <th>Choice 1</th>
                        <th>Choice 1</th>
                        <th>Answer</th>
                        <th>Category</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($games as $item){                            
                            echo "<tr>";
                                echo "<td>$item[game_question]</td>";
                                echo "<td>$item[choice1]</td>";
                                echo "<td>$item[choice2]</td>";
                                echo "<td>$item[choice3]</td>";
                                echo "<td>$item[choice4]</td>";
                                echo "<td>$item[answer]</td>";
                                echo "<td>$item[category]</td>";
                                ?>
                                <td>
                                    <a href="#" class="btn btn-warning btn-sm editQuestion" data-toggle="modal" data-target="#ManageQuestion" data-id="<?=$item['id'];?>)_<?=$item['game_id'];?>_<?=$item['game_question'];?>_<?=$item['choice1'];?>_<?=$item['choice2'];?>_<?=$item['choice3'];?>_<?=$item['choice4'];?>_<?=$item['answer'];?>_<?=$item['category'];?>"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                    <a href="<?=base_url('delete_game/'.$item['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this question?');return false;"><i class="glyphicon glyphicon-trash"></i> Delete</a>
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