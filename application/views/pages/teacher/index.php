<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>e-Learning Website</title>
    <link rel="stylesheet" href="<?=base_url('design/users/style.css');?>">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <link rel="shortcut icon" href="<?=base_url('design/img/favicon.ico');?>">
  </head>
  <body>
    <div class="bg-img">
      <div class="content">
        <header>Teacher Portal</header>
        <form action="<?=base_url('teacher_authenticate');?>" method="POST">
          <div class="field">
            <span class="fa fa-user"></span>
            <input type="text" required placeholder="Username" name="username" autocomplete="off">
          </div>
          <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" class="pass-key" required placeholder="Password" name="password" autocomplete="off">
            <!-- <span class="show">SHOW</span> -->
          </div>
          <div class="pass">
            <?php
            if($this->session->flashdata('error')){
                echo "<div style='color:red;'>".$this->session->error."</div>";
            }
            ?>
          </div>
          <div class="field">
            <input type="submit" value="LOGIN">
          </div>
        </form>        
        <!-- <div class="signup">Don't have account?
          <a href="#">Signup Now</a>
        </div> -->
      </div>
    </div>
  </body>
</html>
