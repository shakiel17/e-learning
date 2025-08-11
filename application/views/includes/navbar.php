<!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>            
            <a class="navbar-brand" href="<?=base_url('main');?>"> 
                <!-- <img alt="Charisma Logo" src="<?=base_url('design/img/logo20.png');?>" class="hidden-xs"/> -->
                <span>e-Learning</span>
            </a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> <?=$this->session->fullname;?></span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profile</a></li>
                    <li class="divider"></li>
                    <li><a href="#" data-toggle="modal" data-target="#logout">Logout</a></li>
                </ul>
            </div>
            <?php
            $user=$this->Learning_model->getStudentUser($this->session->username);
            ?>
            <div class="btn-group pull-right theme-container animated tada">
                <p>Login Date/Time: <?=date('m/d/Y',strtotime($user['date_login']));?> / <?=date('h:i A',strtotime($user['time_login']));?></p>
            </div>
        </div>
    </div>