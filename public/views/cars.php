<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/cars.css" />
    <title>TotalCarService</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['userId']) || $_SESSION['userRole'] < 2) {
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
            <?php if (isset($message)) : ?>
                <div class="message"><?= $message ?></div>
            <?php endif; ?>
            <form class="car" action="apiAddCar" method="POST">
                <label class="car-input">
                    <input required type="text" name="make" />
                    <label>Marka</label>
                </label>
                <label class="car-input">
                    <input required type="text" name="model" />
                    <label>Model</label>
                </label>
                <label class="car-input">
                    <input required type="number" name="year" />
                    <label>Rok produkcji</label>
                </label>
                <label class="car-input">
                    <input required type="text" name="color" />
                    <label>Kolor</label>
                </label>
                <label class="car-input">
                    <input required type="text" name="image" />
                    <label>Obraz (base64)</label>
                </label>
                <label class="car-input">
                    <input required type="text" name="registration" />
                    <label>Rejestracja</label>
                </label>
                <label class="car-input">
                    <input required type="number" name="ppd" min="0" />
                    <label>Cena/dzień</label>
                </label>
                <button class="btn">DODAJ SAMOCHÓD</button>
            </form>
            <div class="cars">
                <?php foreach ($cars as $car) : ?>
                    <div class="car-container">
                        <div>
                            <span><?= $car->getMake() ?></span>
                            <span><?= $car->getModel() ?></span>
                            <span><?= $car->getYear() ?></span>
                            <span><?= $car->getColor() ?></span>
                        </div>
                        <div>
                            <span>obraz base64: <input name="<?= $car->getId() ?>-update-image" value=<?= $car->getImage() ?> type="text" /></span>
                            <span><?= $car->getRegistration() ?></span>
                            <span>cena: <input name="<?= $car->getId() ?>-update-ppd" value=<?= $car->getPpd() ?> type="number" min="0" /></span>
                        </div>
                        <div class="car-btns">
                            <button class="btn" onclick="handleCarUpdate(<?= $car->getId() ?>)">ZAKTUALIZUJ</button>
                            <button class="btn red" onclick="handleCarDelete(<?= $car->getId() ?>)">USUŃ</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src=" public/js/cars.js"></script>
</body>

</html>