<h1>Новости</h1>
<?php
for ($row = array(); $row_n = $data[0]->fetch_assoc(); $row[] = $row_n) ; // новости
for ($res = array(); $res_c = $data[1]->fetch_assoc(); $res[] = $res_c) ; // комменты
for ($ros = array(); $ros_u = $data[2]->fetch_assoc(); $ros[] = $ros_u) ; // пользователи

for ($i = 0;
     $i < count($row);
     $i++) { ?>
    <div class="news_block">
        <h2 class='news_title'><?= $row[$i]['title'] ?></h2>
        <p class=news_desc><?= $row[$i]['description'] ?></p>
        <h4 class="comments_title">Комментарии</h4>
        <?php if (isset($_SESSION["status"])) { ?>
        <form action="news/insert_data" method="post" class="comment_form">
            <textarea name="com" placeholder="Оставить комментарий" ></textarea>
            <input type="hidden" name="news_id" value="<?= $row[$i]['id'] ?>">
            <input type="submit" name="send">
        </form>
        <?php } ?>
        <?php for ($j = 0;
        $j < count($res);
        $j++) { ?>
        <?php if ($res[$j]['news_id'] == $row[$i]['id']) : ?>
        <form action="news/del_data" method="post" class="comment_plate">
            <?php for ($k = 0;
                       $k < count($ros);
                       $k++) { ?>
                <?php if ($res[$j]['user_id'] == $ros[$k]['user_id']) : ?>
                    <p class="comment_username"><?= $ros[$k]['login'] ?></p>
                <?php if(isset($_SESSION) && $ros[$k]['login'] == $_SESSION['login'] || $_SESSION['status'] == '1') : ?>
                    <input type="submit" value="X" name="del_com" class="delete_button">
                    <input type="hidden" name="name" value="<?= $ros[$k]['login'] ?>">
                <?php endif; ?>
                <?php endif; ?>
            <?php } ?>
            <p class="comment"><?= $res[$j]['comment'] ?></p>
            <input type="hidden" name="comment_id" value="<?= $res[$j]['comment_id']; ?>">
        </form>
            <?php endif; ?>
            <?php } ?>


    </div>
    <?php
}
?>
