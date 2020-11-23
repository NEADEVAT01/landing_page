<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="icon" href="/images/favicon.png" type="image/x-icon">
</head>
<body>
<header>
    <a href="main">Главная</a>
    <a href="services">Услуги</a>
    <a href="portfolio">Портфолио</a>
    <a href="contacts">Контакты</a>
    <a href="news">Новости</a>
    <?php if (!isset($_SESSION['login'])) : ?>
    <div class="header_buttons">
        <a href="register">Зарегистрироваться</a>
        <a href="auth" class="header_login">Войти</a>
    </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['login'])) : ?>
        <div class="header_buttons">
            <a><?php echo $_SESSION['login'] ?></a>
            <?php if ($_SESSION['status'] == 1) : ?>
            <a href="/admin">Админ-панель</a>
            <?php endif; ?>
            <form class="exit-input-block" action="main/exit" method="post">
                <input class="exit-input" type="submit" name="exit" value="Выход">
            </form>
        </div>
    <?php endif; ?>
</header>
<main>
    <?php include 'application/views/' . $content_view; ?>
</main>
</body>
</html>
