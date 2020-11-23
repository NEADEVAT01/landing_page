<?php


class Controller_Main extends Controller
{
    function action_index()
    {
        $this->view->generate('main_view.php', 'template_view.php','','Главная');
    }

    function action_exit()
    {
        session_destroy();
        header('Location:/');
    }
}
