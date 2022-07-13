<?php 
include("header.php");
session_start();
?>

<div class="login-wrapper">
      <form action="login.php" class="form" method="POST">
        <h2>Login</h2>
        <div class="input-group">
          <input type="text" name="email" id="email" required />
          <label for="email">Email</label>
        </div>
        <div class="input-group">
          <input type="password" name="loginPassword" id="pwd" required/>
          <label for="loginPassword">Password</label>
          <p>You dont have an account? <a href="sign-up.php">Sign Up</a></p>
          </br>
        </div>
        <input type="submit" value="Login" class="submit-btn" id="submit"/>
      </form>
    </div>

<?php include("footer.php"); ?>