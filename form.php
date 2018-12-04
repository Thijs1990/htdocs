<?php
    // verschil opzoeken
    // $email = $_REQUEST["user_email"];
    //echo "$_POST";
    //validatie van formulier hier regelen
?>
<form action="index.php" method="post">
  <p>Input email address: <input type="email" name="user_email" placeholder="enter a valid email address" required></p>
  <p>Input username: <input type="text" name="user_name" placeholder="" required></p>
  <p>Input password: <input type="text" name="user_pass" placeholder="" required></p>
  <p><input type="submit"></p>
</form>
<?php

// else if(isset($_POST["user_name"])) {
//   echo "It appears no name has been entered.";
// }
