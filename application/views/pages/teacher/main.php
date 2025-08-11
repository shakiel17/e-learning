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
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-th-list"></i> Leaderboards</h2>

                <!-- <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div> -->
            </div>
            <div class="box-content">
                
            </div>
        </div>
    </div>
</div>