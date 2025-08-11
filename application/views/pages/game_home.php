<div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">        
        <li>
            <a href="<?=base_url('main');?>">My Dashboard</a>
        </li>
        <li>
            <a href="<?=base_url('games_list');?>">Gamification</a>
        </li>
        <li>
            Game Home <b>(<?=$game['description'];?> | <?=$game['category'];?>)</b>
        </li>
    </ul>
</div>
<div class=" row">
    <div class="col-12">
        <div class="well top-block">
            <b>INSTRUCTIONS: <?=$game['instructions'];?></b>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12">        
        <a data-toggle="tooltip" title="<?=$game['instructions'];?>" class="well top-block" href="<?=base_url('start_game/'.$game['id']."/Easy/".$game['category']);?>">            
            <i class="glyphicon glyphicon-flag green"></i>

            <div>Start Easy Round</div>
            
        </a>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <a data-toggle="tooltip" title="<?=$game['instructions'];?>" class="well top-block" href="<?=base_url('start_game/'.$game['id']."/Moderate/".$game['category']);?>">
            <i class="glyphicon glyphicon-flag yellow"></i>

            <div>Start Moderate Round</div>
            
        </a>
    </div>

    <div class="col-md-4 col-sm-4 col-xs-12">
        <a data-toggle="tooltip" title="<?=$game['instructions'];?>" class="well top-block" href="<?=base_url('start_game/'.$game['id']."/Difficult/".$game['category']);?>">
            <i class="glyphicon glyphicon-flag red"></i>

            <div>Start Difficult Round</div>
           
        </a>
    </div>

    
</div>

