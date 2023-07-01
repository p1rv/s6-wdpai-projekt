<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <link
      rel="stylesheet"
      href="public/css/style.css"
    />
    <link
      rel="stylesheet"
      href="public/css/account.css"
    />
    <title>TotalCarService</title>
  </head>
  <body>
    <?php
        if(!isset($_SESSION['userId']) || $_SESSION['userRole'] !== 0 || $_SESSION['userRole'] !== 3){
            $url = "http://$_SERVER[HTTP_HOST]/login";
            header("Location: $url");
        }
    ?>
    <div class="root">
      <div class="bg">
        <div class="bg-img"></div>
        <div class="bg-blur"></div>
      </div>
      <div class="container">
        <?php include('public/components/header.php')?>
        <?php if($_SESSION['userRole'] == 0): ?>
        <a href="services" class="btn">HISTORIA USŁUG</a>
        <?php elseif($_SESSION['userRole'] == 3):?>
        <a href="services" class="btn">WYKONANE USŁUGI</a>
            Zarząd
        <?php endif; ?>
      </div>
    </div>
  </body>
</html>
