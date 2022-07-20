<?php 
include("header.php");
require("function.php");
?>

<div class="login-wrapper">
      <form action="login.php" class="form" method="POST">
        <h2>Login</h2>
        <div class="input-group">
          <input type="text" name="email" id="email" required />
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <input type="password" name="password" id="pwd" required/>
          <label for="password">Password</label>
          <p>You dont have an account? <a href="sign-up.php">Sign Up</a></p>
          </br>
        </div>
        <input type="submit" name="submit" value="Login" class="submit-btn" id="submit"/>
        <p><?php echo_msg();?></p>
      </form>
      
    </div>

<?php include("footer.php"); ?>