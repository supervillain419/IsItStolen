<?php include("header.php"); ?>

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
          <p>You already have an account? <a href="login-form.php">Log In</a></p>
          </br>
        </div>
        <input type="submit" name="submit" value="Sign Up" class="submit-btn" />
      </form>
    </div>

<?php include("footer.php"); ?>