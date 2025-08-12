<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">        
        <li>
            <a href="<?=base_url('teachermain');?>">My Dashboard</a>
        </li>
    </ul>
</div>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?=count($newstudent);?> new registered students." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Registered Students</div>
            <div><?=count($students);?></div>
            <span class="notification"><?=count($newstudent);?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?=count($newlesson);?> new created lessons." class="well top-block" href="#">
            <i class="glyphicon glyphicon-book green"></i>

            <div>Lessons</div>
            <div><?=count($lessons);?></div>
            <span class="notification green"><?=count($newlesson);?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?=count($newassignment);?> posted assignment." class="well top-block" href="#">
            <i class="glyphicon glyphicon-file yellow"></i>

            <div>Assignments</div>
            <div><?=count($assignments);?></div>
            <span class="notification yellow"><?=count($newassignment);?></span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="<?=count($newquizzes);?> new posted quizzes." class="well top-block" href="#">
            <i class="glyphicon glyphicon-list-alt red"></i>

            <div>Quizzes</div>
            <div><?=count($quizzes);?></div>
            <span class="notification red"><?=count($newquizzes);?></span>
        </a>
    </div>
</div>
<div class="row">
<?php
$games=$this->Learning_model->getAllGames();
foreach($games as $game){
    $g=$this->Learning_model->getSingleGame($game['id']);
    $easy=$this->Learning_model->getLeaderboardsByCategory($game['id'],'Easy');
    $moderate=$this->Learning_model->getLeaderboardsByCategory($game['id'],'Moderate');
    $difficult=$this->Learning_model->getLeaderboardsByCategory($game['id'],'Difficult');
                    ?> 

    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-th-list"></i> Leaderboards (<?=$g['description'];?>)</h2>
            </div>
            <div class="box-content">
                <table width="100%" border="0">
                    <tr>
                        <td colspan="2"><b>EASY CATEGORY</b></td>
                    </tr>
                    <tr>
                        <td width="70%"><b>NAME</b></td>
                        <td width="30%"><b>SCORE</b></td>
                    </tr>
                <?php
                foreach($easy as $row){
                    $name=$this->Learning_model->getSingleStudent($row['student_id']);
                    ?>
                    <tr>
                        <td width="70%"><?=$name['student_firstname'];?> <?=$name['student_lastname'];?></td>
                        <td width="30%"><?=$row['score'];?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                        <td colspan="2"><b>MODERATE CATEGORY</b></td>
                    </tr>
                    <tr>
                        <td width="70%"><b>NAME</b></td>
                        <td width="30%"><b>SCORE</b></td>
                    </tr>
                <?php
                foreach($moderate as $row){
                    $name=$this->Learning_model->getSingleStudent($row['student_id']);
                    ?>
                    <tr>
                        <td width="70%"><?=$name['student_firstname'];?> <?=$name['student_lastname'];?></td>
                        <td width="30%"><?=$row['score'];?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                        <td colspan="2"><b>DIFFICULT CATEGORY</b></td>
                    </tr>
                    <tr>
                        <td width="70%"><b>NAME</b></td>
                        <td width="30%"><b>SCORE</b></td>
                    </tr>
                <?php
                foreach($difficult as $row){
                    $name=$this->Learning_model->getSingleStudent($row['student_id']);
                    ?>
                    <tr>
                        <td width="70%"><?=$name['student_firstname'];?> <?=$name['student_lastname'];?></td>
                        <td width="30%"><?=$row['score'];?></td>
                    </tr>
                    <?php
                }
                ?>
                </table>
            </div>
        </div>
    </div>


<?php
}
?>
</div>