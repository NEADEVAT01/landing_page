<?php if ($_SESSION['status'] == 1): ?>
    <h1>Пользователи</h1>

    <form method="post" action="redact_user/insert_data">
        <label for="login">Логин</label>
        <input type="text" name="user_login">
        <label for="email">Email</label>
        <input type="email" name="user_email">
        <label for="password">Пароль</label>
        <input type="text" name="user_password">
        <label for="status">Статус</label><br>
        <label for="user" class="radio_labels">Пользователь</label>
        <input type="radio" value="0" id="user" name="status" checked class="radio_buttons">
        <label for="admin" class="radio_labels">Админ</label>
        <input type="radio" value="1" id="admin" name="status" class="radio_buttons">

        <input type="submit" value="Создать" name="create_user" class="submit_button">
    </form>


    <table>
        <tr>
            <td>Логин</td>
            <td>Почта</td>
            <td>Пароль</td>
            <td>Статус</td>
        </tr>
        <br>
        <br>
        <?php

        while ($row = mysqli_fetch_assoc($data)) {
            ?>
            <tr>
                <form action="redact_user/update_data" method="post">
                    <td>

                        <input type="text" placeholder="Логин" name="update_login_user" value="<?= $row['login'] ?>">
                    </td>
                    <td>
                        <input placeholder="Email" name="update_email_user" value="<?= $row['email'] ?>">
                    </td>
                    <td>

                        <input type="text" name="update_password_user" placeholder="Пароль"
                               value="<?= $row['password'] ?>">
                    </td>
                    <td>
                        <label class="radio_labels">Пользователь</label>
                        <?php if ($row['status'] == 0) { ?>
                            <input type="radio" value="0" id="update_user" name="update_status_user"
                                   class="radio_buttons" checked>
                            <label class="radio_labels">Админ</label>
                            <input type="radio" value="1" id="update_admin" name="update_status_user"
                                   class="radio_buttons">
                        <?php } else { ?>
                            <input type="radio" value="0" id="update_user" name="update_status_user"
                                   class="radio_buttons">
                            <label class="radio_labels">Админ</label>
                            <input type="radio" value="1" id="update_admin" name="update_status_user"
                                   class="radio_buttons" checked>
                        <?php } ?>
                        <input type="submit" value="Изменить" name="update_user" class="submit_button_news">
                        <input type="hidden" name="update_id_user" value="<?= $row['user_id']; ?>">
                        <input type="hidden" name="update_last_login" value="<?= $row['login']; ?>">

                </form>
                <form action="redact_user/del_data" method="post" class="delete_button_form">
                    <input type="submit" value="Удалить" name="del_user">
                    <input type="hidden" name="del_id_user" value="<?= $row['user_id']; ?>">
                </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
<?php else:header("Location: /"); ?>
<?php endif; ?>

