<?php

require_once 'application/models/model_redact_news.php';


class Controller_Redact_News extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Redact_News();
    }

    function action_index()
    {
        $data_n = $this->model->get_data('news');
        $data = [$data_n];
        $this->view->generate('redact_news_view.php', 'template_view.php', $data, 'Редактирование новостей');
    }

    function action_del_news()
    {
        $id_news_r = $_POST['id_news_r'];


        $query = "DELETE FROM `news` WHERE id = $id_news_r";

        $res = mysqli_query($this->model->link, $query);

        if ($res) {
            header("Location: /redact_news ");
        } else {
            die(mysqli_error($this->model->link));
        }

    }

    public function action_create_news()
    {
        $create_news = $_POST['create_news_r'];
        $title_r = strip_tags($_POST['title_r']);
        $description_r = strip_tags($_POST['description_r']);

        if (isset($create_news)) {
            $this->model->insert_data(
                'news',
                "title, description",
                "'$title_r', '$description_r'"
            );
        }
        header("Location: /redact_news ");
    }

    public function action_update_data()
    {
        if (isset($_POST,
            $_POST['update_id_news'],
            $_POST['update_title'],
            $_POST['update_description']
        )) {

            $update_title = strip_tags($_POST['update_title']);
            $update_description = strip_tags($_POST['update_description']);
            $update_id_news = $_POST['update_id_news'];

            if ($_POST['update_news']) {
                $this->model->update_data(
                    "news",
                    "title = '$update_title', description = '$update_description'",
                    $update_id_news
                );
                header('Location: /redact_news');
            }
        }
    }
}