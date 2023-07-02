<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/users.css" />
    <title>TotalCarService</title>
</head>

<body>
    <?php
    if (!isset($_SESSION['userId']) || $_SESSION['userRole'] !== 3) {
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
            <div class="users">
                <?php foreach ($users as $user) : ?>
                    <div class="user">
                        <div class="user-row">
                            <span><?= $user->getName() ?></span>
                            <span><?= $user->getSurname() ?></span>
                            <span>tel. <?= $user->getPhone() ?></span>
                        </div>
                        <div class="user-row">
                            <span>adres:</span>
                            <?php if ($user->getStreet()) : ?>
                                <span><?= $user->getStreet() ?> <?= $user->getHouse_no() ?><?php if ($user->getFlat_no()) echo "/" . $user->getFlat_no(); ?></span>
                                <span><?= $user->getCity() ?> <?= $user->getPostal_code() ?></span>
                            <?php else : ?>
                                <span><?= $user->getCity() ?> <?= $user->getHouse_no() ?> <?php if ($user->getFlat_no()) echo "/" . $user->getFlat_no(); ?>, <?= $user->getPostal_code() ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="user-row">
                            <span><?= $user->getEmail() ?></span>
                            <span>PESEL <?= $user->getPesel() ?></span>
                            <select onchange="handleUserRoleChange(event,<?= $user->getId() ?>)">
                                <option value="0" <?php if ($user->getRole() == 0) echo 'selected'; ?>>Klient</option>
                                <option value="1" <?php if ($user->getRole() == 1) echo 'selected'; ?>>Mechanik</option>
                                <option value="2" <?php if ($user->getRole() == 2) echo 'selected'; ?>>Biuro</option>
                                <option value="3" <?php if ($user->getRole() == 3) echo 'selected'; ?>>Menadżer</option>
                            </select>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>
    <script src="public/js/usersManagement.js"></script>
</body>

</html>