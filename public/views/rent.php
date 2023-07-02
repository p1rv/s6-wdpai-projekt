<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="public/css/style.css" />
  <link rel="stylesheet" href="public/css/rent.css" />
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
      <?php if ($_SESSION['userRole'] == 0) : ?>
        <div class="rent-date-range">
          Okres wypożyczenia:
          <label class="label-start">
            <label>OD:</label>
            <input type="date" id="start" name="rent-start" />
          </label>
          <label class="label-end">
            <label>DO:</label>
            <input type="date" id="end" name="rent-end" />
          </label>
        </div>
        <div class="cars">

          <?php
          foreach ($cars as $car) :
          ?>
            <div class="car-container">
              <img class="car-img" src=<?= $car->getImage() ?> alt=<?= $car->getMake() ?> />
              <div class="description-wrapper">
                <div class="description-left">
                  <div class="car-row">
                    <div class="make"><?= $car->getMake() ?></div>
                    <div class="model"><?= $car->getModel() ?></div>
                  </div>
                  <div class="car-row">
                    <div class="color"><?= $car->getColor() ?></div>
                    <div class="year"><?= $car->getYear() ?></div>
                  </div>
                  <div class="car-row">
                    <div class="price"><?= $car->getPpd() ?>zł/dzień</div>
                  </div>
                </div>
                <button onclick="handleRent(<?= $car->getId() ?>)" class="btn rent-btn">WYPOŻYCZ</button>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <script src="public/js/rentClient.js"></script>
      <?php elseif ($_SESSION['userRole'] == 1) : ?>
        <?php
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: $url");
        ?>
      <?php elseif ($_SESSION['userRole'] > 1) : ?>
        <div class="rentals-title">
          Aktualnie trwające wypożyczenia:
        </div>
        <div class="rentals">
          <?php
          foreach ($rentals as $rental) :
          ?>
            <div class="rental-container">
              <img class="car-img" src=<?= $rental->getImage() ?> alt=<?= $rental->getMake() ?> />
              <div class="car-description">
                <div class="car-details"><?= $rental->getMake() ?> <?= $rental->getModel() ?> <b><?= $rental->getRegistration() ?></b></div>
                <div class="rental-details">OD: <?= $rental->getStart_date() ?> <span>DO: <?= $rental->getEnd_date() ?></span><b>CENA: <input id="<?= $rental->getId() ?>-rental" type="number" value="<?= $rental->getPrice() ?>" min="<?= $rental->getPrice() ?>" />zł</b></div>
                <div class="user-details"><?= $rental->getName() ?> <?= $rental->getSurname() ?> <b><?= $rental->getEmail() ?></b> <b><?= $rental->getPhone() ? $rental->getPhone() : "-" ?></b></div>
              </div>
              <button class="btn rent-btn" onclick="handleReturn(<?= $rental->getId() ?>,<?= $rental->getUserId() ?>,<?= $rental->getCarId() ?>)">ZATWIERDŹ ZWROT</button>
            </div>
          <?php endforeach; ?>
        </div>
        <script src="public/js/rentManagement.js"></script>
      <?php endif; ?>
    </div>
  </div>
</body>

</html>