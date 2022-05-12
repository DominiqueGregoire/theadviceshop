<?php
$filename = substr(strrchr($_SERVER['SCRIPT_NAME'], "/"), 1); // missing '' around index - notice error
$name = substr($filename, 0, strrpos($filename, ".")); ?>

<header id="pageHeader">
  <aside id="login">
      <form action="login.php?page=<?php echo $name; ?>" method="post">
          <a href="login.php?page=<?php echo $name; ?>"><button type="button" >Login</button></a>
          <a href="register.php"><button type="button">Sign Up</button></a>
      </form>
  </aside>
<a href="index.php"><h1><span class="glyphicon glyphicon-ok"></span> The Advice Shop</h1></a>
</header>
