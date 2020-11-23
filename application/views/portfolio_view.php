<div>
    <h1>Портфолио</h1>
    <table cellspacing="0">
        <p class="main_description">Все проекты в следующей таблице являются вымышленными, поэтому даже не пытайтесь
            перейти по приведенным
            ссылкам.</p>
        <tr>
            <td>Год</td>
            <td>Проект</td>
            <td>Описание</td>
        </tr>
        <?php

        foreach ($data as $row) {
            echo '<tr><td>' . $row['year'] . '</td><td>' . $row['site'] . '</td><td>' . $row['description'] . '</td></tr>';
        }
        ?>
    </table>
</div>