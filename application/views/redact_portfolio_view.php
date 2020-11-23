<?php if ($_SESSION['status'] == 1): ?>
    <h1>Портфолио</h1>

    <form method="post" action="redact_portfolio/insert_data" class="portfolio_create_form">
        <label for="year">Год создания:</label>
        <input id="year" type="number" placeholder="2020" name="year" min="1" max="<?= date("Y") ?>" required>
        <label for="site">Ссылка на сайт:</label>
        <input id="site" type="url" placeholder="http://example.ru" name="site" required>
        <label for='description'>Описание:</label>
        <textarea id="description" name="description"></textarea>
        <input type="submit" value="Создать" name="create_portfolio">
    </form>

    <p>
    <table>
        <tr>
            <td>Год</td>
            <td>Сайт</td>
            <td>Описание</td>
        </tr>
        <br>
        <br>
        <?php

        while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <form action="redact_portfolio/update_data" method="post">
                    <td>
                        <input type="text" placeholder="Год" name="update_year" value="<?= $row['year'] ?>"></td>
                    <td>
                        <input type="text" placeholder="Сайт" name="update_site" value="<?= $row['site'] ?>"></td>
                    <td>
                        <textarea placeholder="Описание" name="update_description" class="update_portfolio_description"><?= $row['description']?></textarea>
                        <input type="submit" value="Изменить" name="update_portfolio">
                        <input type="hidden" name="update_id" value="<?=$row['id']; ?>">
                </form>
                <form action="redact_portfolio/del_data" method="post" class="delete_button_form">
                    <input type="submit" value="Удалить" name="del_portfolio">
                    <input type="hidden" name="del_id" value="<?= $row['id']; ?>">
                </form>
                </td>
            </tr>
            <?php
        }

        ?>
    </table>
    </p>
<?php else:header("Location: /"); ?>
<?php endif; ?>

