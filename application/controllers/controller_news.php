<?php
require_once 'application/models/model_news.php';

class Controller_News extends Controller
{
    function __construct()
    {
        $this->model = new Model_News();
        $this->view = new View();
    }

    function action_index()
    {
        $data_n = $this->model->get_data('news');
        $data_c = $this->model->comments_get_data('comments');
        $data_u = $this->model->users_get_data('users');
        $data = [$data_n, $data_c, $data_u];
        $this->view->generate('news_view.php', 'template_view.php', $data,'Новости');
    }

    function action_del_data()
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] == $_POST['name'] || $_SESSION['status'] == 1) {
            if (isset($_POST, $_POST['del_com'])) {
                $this->model->delete_data("comments", $_POST['comment_id']);
                header('Location: /news');
            }
        }
        if (!isset($_SESSION['login']) || $_SESSION['login'] != $_POST['name']) {
            header('Location: /news');
        }
    }

    function action_insert_data()
    {
        if (isset($_POST,
            $_POST['com'],
            $_POST['send']
        )) {

            $com = $_POST['com'];
            $send = $_POST['send'];
            $news_id = $_POST['news_id'];
            $user_id = $_SESSION['id'];

            if (isset($_SESSION['login']) && isset($send)) {
                $this->model->insert_data(
                    'comments',
                    "user_id, news_id, comment",
                    "'$user_id', '$news_id', '$com'"
                );
            }
        }
        header("Location: /news ");
    }
}