<?php if ($_SESSION['status'] == 1): ?>
    <h1>Новости</h1>
    <form action="redact_news/create_news" method="post" class="portfolio_create_form">
        <label for="title">Заголовок</label>
        <input type="text" placeholder="Заголовок" name="title_r" required id="title">
        <label for="descriprion">Описание</label>
        <textarea placeholder="Описание" name="description_r" required id="descriprion"></textarea>
        <input type="submit" name="create_news_r" value="Создать новость" required>
    </form>
    <table>
        <tr>
            <td>Заголовок</td>
            <td>Описание</td>
        </tr>
        <?php
        for ($row = array(); $row_n = $data[0]->fetch_assoc(); $row[] = $row_n) ; // новости
        for ($i = 0;
             $i < count($row);
             $i++) { ?>
            <tr>
                <form action="redact_news/update_data" method="post">
                    <td>
                        <input type="text" name="update_title" value="<?= $row[$i]['title'] ?>">
                    </td>

                <td>
                        <textarea name="update_description"
                                  class="update_portfolio_description"><?= $row[$i]['description'] ?></textarea>
                        <input type="submit" name="update_news" value="Изменить">
                        <input type="hidden" name="update_id_news" value="<?= $row[$i]['id'] ?>">
                    </form>
                    <form action="redact_news/del_news" method="post" class="delete_button_form">
                        <input type="submit" name="del_news" value="Удалить" >
                        <input type="hidden" name="id_news_r" value="<?= $row[$i]['id'] ?>">
                    </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
<?php else:header("Location: /"); ?>
<?php endif; ?>

