<?php 
include("header.php");
require("function.php");
require("con_is_logged_in.php");
?>

<div class="login-wrapper">
      <form action="" class="form" method="POST">
        <h2>Register your serial number</h2>
        <div class="input-group">
          <input type="text" name="serial-num" id="serial-num" required />
          <label for="serial-num">Serial Number</label>
        </div>
        <div class="input-group">
          <input type="text" name="owner" id="owner" required />
          <label for="owner">Owner</label>
        </div>
        <div>
            <p>Is It Stolen?</p>
            <input type="radio" id="yes" name="cho2" value="Yes">
            <label for="yes">YES</label><br>
            <input type="radio" id="no" name="cho2" value="NO">
            <label for="no">NO</label><br>
        </div>
        </br>
        <input type="submit" name="submit" value="ADD" class="submit-btn" />
      </form>
    </div>

<?php include("footer.php"); ?>