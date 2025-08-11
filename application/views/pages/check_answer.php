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
            <a href="<?=base_url('enter_game/'.$game_id);?>">Game Home <b>(<?=$game['description'];?> | <?=$game['category'];?>)</b></a>
        </li>
        <li>
            Game Start
        </li>
    </ul>
</div>
<div class=" row">
    <div class="col-12">
        <div class="well top-block">
            <b style="font-size:18px;">INSTRUCTIONS: <?=$game['instructions'];?></b>
        </div>
    </div>
    <div class="col-12">
        <div class="well top-block">
            <center>
            <?php
            if($youranswer==$correctanswer){
                echo "<h2>Your answer is Correct! You have ".$this->session->game_score." points.</h2>";
                ?>
                <a href="<?=base_url('start_game/'.$game_id."/".$category."/".$game_category);?>" class="btn btn-primary" style="font-size:18px;">Next Question</a>
                <?php
            }else{
                echo "<h2>Your answer is Wrong! You have ".$this->session->game_score." points.</h2>";
                ?>
                <a href="<?=base_url('save_result/'.$game_id."/".$category."/".$game_category."/".$this->session->game_score);?>" class="btn btn-info" style="font-size:18px;">Save Result</a>
                <?php
                $this->session->game_score=0;
            }
            ?>
            </center>
        </div>
    </div>
</div>

