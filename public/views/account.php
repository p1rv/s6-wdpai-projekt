<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/css/style.css" />
  <link rel="stylesheet" href="public/css/account.css" />
  <title>TotalCarService</title>
</head>

<body>
  <?php
  if (!isset($_SESSION['userId'])) {
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
      <?php include('public/components/header.php') ?>
      <?php if (isset($user)) : ?>
        <div class="user-info">
          <div class="user-info-title">Twoje dane:</div>
          <div><?= $user->getName() ?> <?= $user->getSurname() ?></div>
          <?php if ($user->getPesel()) : ?>
            <div><?= $user->getPesel() ?></div>
          <?php endif; ?>
          <div><?= $user->getCity() ?><?= $user->getStreet() ? ", " . $user->getStreet() : " " ?> <?= $user->getHouse_no() ?><?= $user->getFlat_no() ? "/" . $user->getFlat_no() : null ?>, <?= $user->getPostal_code() ?></div>
          <div><?= $user->getEmail() ?><?= $user->getPhone() ? ", tel. " . $user->getPhone() : null ?></div>
        </div>
      <?php endif; ?>
      <?php if ($_SESSION['userRole'] == 0) : ?>
        <a href="services" class="btn">HISTORIA USŁUG</a>
      <?php elseif ($_SESSION['userRole'] == 1) : ?>
        Mechanik
      <?php elseif ($_SESSION['userRole'] == 2) : ?>
        <a href="manageCars" class="btn">SAMOCHODY</a>
      <?php elseif ($_SESSION['userRole'] == 3) : ?>
        <a href="services" class="btn">WYKONANE USŁUGI</a>
        <a href="manageCars" class="btn">SAMOCHODY</a>
        <a href="users" class="btn">UŻYTKOWNICY</a>
      <?php endif; ?>
      <a href="logout" class="btn">WYLOGUJ SIĘ</a>
    </div>
  </div>
</body>

</html>