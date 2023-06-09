<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/css/auth.css">
</head>
<body class="text-center form-cover">
<main class="form-signin">
    <form action="auth.login" method="post" class="form-login">
        <img src="/public/images/siteLogo.png" class="mb-4" width="72" height="57" style="background-color: white">
        <h1 class="h3 mb-3 fw-normal">Вход</h1>
        <div class="form-floating">
            <input type="email" class="form-control" id="email" placeholder="Введите почту" name="email">
            <label for="email">Введите почту</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="password" placeholder="Введите пароль" name="password">
            <label for="password">Введите пароль</label>
        </div>
        <input type="submit" class="mt-3 w-100 btn btn-lg btn-primary" value="Войти">
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/public/js/jquery-3.6.4.min.js"></script>
<script src="/public/js/auth.js"></script>
</body>
</html>