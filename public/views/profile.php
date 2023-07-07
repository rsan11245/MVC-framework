<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/public/css/profile.css">
    <link rel="stylesheet" href="/public/css/header.css">
</head>
<body>
<div class="profile">
    <?php include 'public/views/layouts/main-header.php' ?>
    <main class="main-profile">
        <div class="profile-item image-section">
            <img src="/public/images/userDelault.png" alt="" class="profile-img">
            <p class="profile-name"><?php echo $vars['first_name'] . " " . $vars['last_name']?></p>
            <p class="profile-email"><?php echo $vars['email']?></p>
            <button class="change-profile-image-button">Изменить фото</button>
        </div>
        <div class="profile-item profile-data">
            <form action="" class="form-edit">
                <div class="form-group">
                    <label for="first_name">Имя</label>
                    <input type="text" name="first_name" id="first_name"
                           value="<?php echo $vars['first_name']?>" readonly="readonly">
                </div>

                <div class="form-group">
                    <label for="last_name">Фамилия</label>
                    <input type="text" name="last_name" id="last_name"
                           value="<?php echo $vars['last_name']?>" readonly="readonly">
                </div>

                <input type="button" value="Изменить профиль" class="change-profile-data-button">
                <input type="button" value="Сохранить изменения" class="save-change-profile-data-button">
                <button class="delete-profile">Удалить учетную запись</button>
            </form>
        </div>
        <div class="profile-item"></div>
    </main>

</div>

<script src="/public/js/jquery-3.6.4.min.js"></script>
<script src="/public/js/profile.js"></script>
<script>
</script>
</body>
</html>