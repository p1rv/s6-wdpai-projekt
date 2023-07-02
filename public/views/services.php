<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/css/style.css" />
  <link rel="stylesheet" href="public/css/services.css" />
  <title>TotalCarService</title>
</head>

<body>
  <?php
  if (!isset($_SESSION['userId']) || ($_SESSION['userRole'] !== 0 && $_SESSION['userRole'] !== 3)) {
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
      <?php if ($_SESSION['userRole'] == 0) : ?>
        <?php if (count($rentalHistory) > 0) : ?>
          <div class="service">
            <div class="service-title">TWOJE WYPOŻYCZENIA</div>
            <?php foreach ($rentalHistory as $rental) : ?>
              <div class="service-container">
                <div class="service-row">
                  <span><?= $rental->getMake() ?> <b><?= $rental->getModel() ?></b></span>
                  <span><b><?= $rental->getStart_date() ?> - <?= $rental->getEnd_date() ?></b></span>
                </div>
                <?php if ($rental->getInvoice_no()) : ?>
                  <div class="service-row">
                    <span>Numer faktury: <b><?= $rental->getInvoice_no() ?></b></span>
                    <span>Całkowity koszt: <b><?= $rental->getTotal() ?> zł</b></span>
                    <div>
                      <span class="service-status">ZWRÓCONO</span>
                    </div>
                  </div>
                <?php endif; ?>
              </div>
            <? endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if (count($repairHistory) > 0) : ?>
          <div class="service">
            <div class="service-title">TWOJE NAPRAWY</div>
            <?php foreach ($repairHistory as $repair) : ?>
              <div class="service-container">
                <div class="service-row">
                  <span><?= $repair->getMake() ?></span>
                  <span> <b><?= $repair->getCar_registration() ?></b></span>
                </div>
                <div class="service-row">
                  <span>Przyjęty <b><?= $repair->getStart_date() ?></b></span>
                  <?php if ($repair->getEnd_date()) : ?>
                    <span>Zakończono <b><?= $repair->getEnd_date() ?></b></span>
                  <?php endif; ?>
                  <?php if (!$repair->getInvoice_no()) : ?>
                    <span>Aktualny koszt <b><?= $repair->getPrice() ?></b></span>
                  <?php endif; ?>
                  <div>
                    <span class="service-status">
                      <?php
                      $status = $repair->getStatus();
                      if ($status == 0) echo "PRZYJĘTY";
                      elseif ($status == 1) echo "W NAPRAWIE";
                      elseif ($status == 2) echo "GOTOWY DO ODBIORU";
                      elseif ($status == 3) echo "ODEBRANY";
                      ?>
                    </span>
                  </div>
                </div>
                <?php if ($repair->getInvoice_no()) : ?>
                  <div class="service-row">
                    <span>Numer faktury: <b><?= $repair->getInvoice_no() ?></b></span>
                    <span>Całkowity koszt: <b><?= $repair->getTotal() ?> zł</b></span>
                  </div>
                <?php endif; ?>
              </div>
            <? endforeach; ?>
          </div>
        <?php endif; ?>
      <?php elseif ($_SESSION['userRole'] == 3) : ?>
        <?php if (count($rentalHistory) > 0) : ?>
          <div class="service">
            <div class="service-title">HISTORIA WYPOŻYCZEŃ</div>
            <?php foreach ($rentalHistory as $rental) : ?>
              <div class="service-container admin">
                <div class="service-row">
                  <span><?= $rental->getMake() ?> <?= $rental->getModel() ?></span>
                  <span><?= $rental->getRegistration() ?></span>
                </div>
                <div class="service-row">
                  <span><?= $rental->getName() ?> <?= $rental->getSurname() ?></span>
                  <span><b><?= $rental->getStart_date() ?> - <?= $rental->getEnd_date() ?></b></span>
                </div>
                <?php if ($rental->getInvoice_no()) : ?>
                  <div class="service-row">
                    <span>Numer faktury: <b><?= $rental->getInvoice_no() ?></b></span>
                    <span>Koszt: <b><?= $rental->getTotal() ?> zł</b></span>
                  </div>
                  <div class="service-row">
                    <span>Wystawione przez: <b><?= $rental->getIssuername() ?> <?= $rental->getIssuersurname() ?></b></span>
                    <span>dnia <b><?= $rental->getInvoice_date() ?></b></span>
                  </div>
                <?php endif; ?>
              </div>
            <? endforeach; ?>
          </div>
        <?php endif; ?>

        <?php if (count($repairHistory) > 0) : ?>
          <div class="service">
            <div class="service-title">HISTORIA NAPRAW</div>
            <?php foreach ($repairHistory as $repair) : ?>
              <div class="service-container admin">
                <div class="service-row">
                  <span><?= $repair->getMake() ?></span>
                  <span><b><?= $repair->getCar_registration() ?></b></span>
                </div>
                <div class="service-row">
                  <span><?= $repair->getName() ?> <?= $repair->getSurname() ?></span>
                  <span><b><?= $repair->getStart_date() ?> - <?= $repair->getEnd_date() ?></b></span>
                  <span class="service-status">
                    <?php
                    $status = $repair->getStatus();
                    if ($status == 0) echo "PRZYJĘTY";
                    elseif ($status == 1) echo "W NAPRAWIE";
                    elseif ($status == 2) echo "GOTOWY DO ODBIORU";
                    elseif ($status == 3) echo "ODEBRANY";
                    ?>
                  </span>
                </div>
                <div class="service-row">
                  <span>Mechanik: <b><?= $repair->getMechanicname() ?> <?= $repair->getMechanicsurname() ?></b></span>
                  <?php if (!$repair->getInvoice_no()) : ?>
                    <span>Aktualny koszt <b><?= $repair->getPrice() ?></b></span>
                </div>
              <?php endif; ?>
              <?php if ($repair->getInvoice_no()) : ?>
                <span>Koszt: <b><?= $repair->getTotal() ?> zł</b></span>
              </div>
              <div class="service-row">
                <span>Numer faktury: <b><?= $repair->getInvoice_no() ?></b></span>
                <span>dnia <b><?= $repair->getInvoice_date() ?></b></span>
              </div>
            <?php endif; ?>
          </div>
        <?php endforeach; ?>
    </div>
  <?php endif; ?>
<?php endif; ?>
  </div>
</body>

</html>