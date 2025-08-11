<?php
if($category=="Easy"){
    $time=5;
}
if($category=="Moderate"){
    $time=10;
}
if($category=="Difficult"){
    $time=15;
}
?>
<script>
        let timeLeft = <?=$time;?>; // seconds
        function startTimer() {
            let timer = setInterval(function(){
                document.getElementById("timer").innerHTML = timeLeft;
                timeLeft--;
                if(timeLeft < 0){
                    clearInterval(timer);
                    document.getElementById("answer").value = "-";
                    document.getElementById("quizForm").submit();
                }
            }, 1000);
        }
        window.onload = startTimer;
    </script>
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
            <a href="<?=base_url('enter_game/'.$game['id']);?>">Game Home <b>(<?=$game['description'];?> | <?=$game['category'];?>)</b></a>
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
            <table width="100%" border="0" style="font-size:18px;">
                <tr>
                    <td><b>Your Score: <?=$this->session->game_score;?></b></td>
                </tr>
                <tr>
                    <td><b>Time Left: <span id="timer"></span> seconds</b></td>
                </tr>
            </table>
            <h2><?=$games['game_question'];?></h2>
            <center>
            <form action="<?=base_url('submit_answer');?>" method="POST" id="quizForm">
                <input type="hidden" name="correctanswer" value="<?=$games['answer'];?>">
                <input type="hidden" name="game_id" value="<?=$games['game_id'];?>">
                <input type="hidden" name="game_category" value="<?=$game_category;?>">
                <input type="hidden" name="category" value="<?=$category;?>">
                    <input type="text" name="youranswer" class="form-control mb-2" id="answer" style="width:300px;height:50px; margin-bottom:10px;text-align:center;font-size:18px;">
                    <input type="submit" class="btn btn-primary" value="Submit" style="width:100px; height:50px; font-size:18px;">
            </form>
            </center>
        </div>
    </div>
</div>

