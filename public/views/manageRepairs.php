<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/manageRepairs.css" />
    <title>TotalCarService</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['userId']) || $_SESSION['userRole'] !== 1) {
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
            <form class="repair" action="apiAddRepair" method="POST">
                <label class="repair-input">
                    <select name="id">
                        <?php foreach ($users as $user) : ?>
                            <option value=<?= $user["id"] ?>><?= $user["email"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </label>
                <label class="repair-input">
                    <input required type="text" name="make" />
                    <label>Marka</label>
                </label>
                <label class="repair-input">
                    <input required type="text" name="car_registration" />
                    <label>Rejestracja</label>
                </label>
                <label class="repair-input">
                    <input required type="number" name="price" min="0" />
                    <label>Prognozowana cena</label>
                </label>
                <label class="repair-input">
                    <input type="date" name="end_date" placeholder="" />
                    <label>Prognozowane zakończenie</label>
                </label>
                <button class="btn">DODAJ NAPRAWĘ</button>
            </form>
            <div class="repairs">
                <?php foreach ($repairs as $repair) : ?>
                    <div class="repair-container">
                        <div>
                            <span><?= $repair->getEmail() ?></span>
                            <span>tel. <?= $repair->getPhone() ?></span>
                        </div>
                        <div>
                            <span><?= $repair->getMake() ?></span>
                            <span><?= $repair->getCar_registration() ?></span>
                            <span>Zakończenie <input type="date" value="<?= $repair->getEnd_date() ?>" name="<?= $repair->getId() ?>-update-date" /></span>
                        </div>
                        <div>
                            <span>Prognozowana cena: <input name="<?= $repair->getId() ?>-update-price" value=<?= $repair->getPrice() ?> type="number" /></span>
                            <span>Status: <select name="<?= $repair->getId() ?>-update-status">
                                    <option value="0" <?php if ($repair->getStatus() == 0) echo 'selected' ?>>PRZYJĘTE</option>
                                    <option value="1" <?php if ($repair->getStatus() == 1) echo 'selected' ?>>W NAPRAWIE</option>
                                    <option value="2" <?php if ($repair->getStatus() == 2) echo 'selected' ?>>DO ODBIORU</option>
                                    <option value="3" <?php if ($repair->getStatus() == 3) echo 'selected' ?>>ODEBRANY</option>
                                </select>
                            </span>
                        </div>
                        <div class="repair-btns">
                            <button class="btn" onclick="handleRepairUpdate(<?= $repair->getId() ?>, <?= $repair->getClient_id() ?>)">ZAKTUALIZUJ</button>
                            <button class="btn red" onclick="handleRepairDelete(<?= $repair->getId() ?>)">USUŃ</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script src="public/js/manageRepairs.js"></script>
</body>

</html>