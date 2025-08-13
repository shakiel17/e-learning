<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="<?=base_url('main');?>">My Dashboard</a>
        </li>        
        <li>
            Gamification
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
                <h2><i class="glyphicon glyphicon-headphones"></i> Games List</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-round btn-default addGame" title="Add New Games" data-toggle="modal" data-target="#ManageGame"><i
                            class="glyphicon glyphicon-plus"></i></a>                    
                </div>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                    <thead>
                    <tr>
                        <th>Topic</th>                        
                        <th>Category</th>                        
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($games as $item){                            
                            echo "<tr>";
                                echo "<td>$item[description]</td>";
                                echo "<td>$item[category]</td>";                                
                                ?>
                                <td>                                    
                                    <a href="<?=base_url('enter_game/'.$item['id']);?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-inbox"></i> Enter Game</a>                                    
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