<?php include("header.php");
include("function.php"); ?>

<div class="login-wrapper">
      <form action="signup.php" class="form" method="POST">
        <h2>Register</h2>
        <div class="input-group">
          <input type="text" name="username" id="username" required />
          <label for="username">Username</label>
        </div>
        <div class="input-group">
          <input type="text" name="email" id="email" required />
          <label for="email">Email</label>
        </div>
        
        <div class="input-group">
          <input type="password" name="password" id="pwd" required/>
          <label for="password">Password</label>
        </div>
        <div class="input-group">
          <input type="password" name="passwordre" id="pwdre" required/>
          <label for="passwordre">Confirm Password</label>
          <div class="g-recaptcha" data-sitekey="6LesNk0hAAAAAACcHWLaNgI7zwLeMTv5o7vsJmQ-"></div>
          </br>
          <p>You already have an account? <a href="login-form.php">Log In</a></p>
          </br>
          
          <?php echo_msg();?>
        </div>
        <button type="submit" name="submit" value="Sign Up" class="submit-btn">SIGN UP </button>
      </form>
    </div>

<?php include("footer.php"); ?>