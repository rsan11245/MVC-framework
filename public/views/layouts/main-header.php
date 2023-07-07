<header>
    <a href="/" class="logo">Главная</a>
    <ul class="navigation">
        <?php if(isset($_SESSION['user']) && $_SESSION['user']['role'] === 2) {?>
        <li><a href="profile" class="profile-button">Панель администратора</a></li>
        <?php }?>
        <li><a href="profile" class="profile-button">Профиль</a></li>
    </ul>
</header>

