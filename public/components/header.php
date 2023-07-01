
<div class="header">
<a href="/" class="btn header-btn">TotalCarService</a>
<div class="help-counter">
  <?php 
  if (isset($headerMessage)){echo $headerMessage;} else {echo "Wszystko, czego potrzebujesz w jednym miejscu";}?>
</div>
<?php if($_SESSION['userEmail']): ?>
<a class="btn header-btn" href="account">
  <?php 
      echo $_SESSION['userEmail'];
  ?>
</a>
<?php else: ?>
<a class="btn header-btn" href="login">
  <?php 
      echo "ZALOGUJ SIĘ";
  ?>
</a>
<?php endif; ?>
</div>