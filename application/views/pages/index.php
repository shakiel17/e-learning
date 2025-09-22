<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>e-Learning Website</title>    
    <link rel="stylesheet" href="<?=base_url('design/users/style.css');?>">
   <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
   <link rel="shortcut icon" href="<?=base_url('design/img/favicon.ico');?>">
  </head>
  <body>
    <div class="bg-img">
      <div class="content">
        <header>e-Learning Portal</header>
        <form action="<?=base_url('authenticate');?>" method="POST">
          <div class="field">
            <span class="fa fa-user"></span>
            <input type="text" required placeholder="Username" name="username" autocomplete="off">
          </div>
          <div class="field space">
            <span class="fa fa-lock"></span>
            <input type="password" class="pass-key" required placeholder="Password" name="password" id="pwd" autocomplete="off">            
          </div>
          <div class="pass">
            <div class="signup">
              <input type="checkbox" onclick="pwd.type =  checked ? 'text' : 'password'"> Show Password
            </div>
            <?php
            if($this->session->flashdata('error')){
                echo "<div style='color:red;'>".$this->session->error."</div>";
            }
            ?>
          </div>                                  
          <div class="pass">
            <div class="signup">
             Login as:<br><br>
             &nbsp;&nbsp;&nbsp;<input type="radio" name="type" value="student" required> Student&nbsp;&nbsp;&nbsp;
             <input type="radio" name="type" value="teacher" required> Teacher&nbsp;&nbsp;&nbsp;
             <input type="radio" name="type" value="admin" required> Admin<br>
          </div>          
          <div class="field space">
            <input type="submit" value="LOGIN">
          </div>
        </form>      
        <br>  
        <div class="signup">Don't have account?
          <a href="<?=base_url('signup');?>">Signup Now</a>
        </div>
      </div>
    </div>
  </body>
</html>
