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
        <header>Registration</header>
        <form action="<?=base_url('registration');?>" method="POST">          
          <div class="field space">
            <span class="fa fa-user"></span>
            <input type="text" required placeholder="Student ID" name="student_id" autocomplete="off">
          </div>
          <div class="field space">
            <span class="fa fa-user"></span>
            <input type="text" required placeholder="Last Name" name="lastname" autocomplete="off">
          </div>
          <div class="field space">
            <span class="fa fa-user"></span>
            <input type="text" required placeholder="First Name" name="firstname" autocomplete="off">
          </div>
          <div class="field space">
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
            <input type="submit" value="SIGNUP">
          </div>
        </form>   
        <br>     
        <div class="signup">Member already?
          <a href="<?=base_url();?>">Signin Now</a>
        </div>
      </div>
    </div>
  </body>
</html>
