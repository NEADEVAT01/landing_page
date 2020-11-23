<?php if ($_SESSION['status'] == 1): ?>
    <h1>Панель администрирования</h1>
    <h2>Выберите раздел</h2>
    <div class="admin_categories">
        <a href="/redact_portfolio">
            <img src="/images/portfolio-admin.png">
            <p>Портфолио</p>
        </a>
        <a href="/redact_news">
            <img src="/images/news-admin.png">
            <p>Новости</p>
        </a>
        <a href="/redact_user">
            <img src="/images/users-admin.png">
            <p>Пользователи</p>
        </a>


    </div>
<?php else: header("location: /"); ?>
<?php endif; ?>

