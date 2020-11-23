<?php
require_once 'application/models/model_register.php';

class Controller_Register extends Controller
{
    function __construct()
    {
        $this->model = new Model_Register();
        $this->view = new View();
    }

    function action_index()
    {
        $this->action_register();
        $this->view->generate('register_view.php', 'template_view.php', '', 'Регистрация');
    }

    function action_register()
    {

        $model = new Model_Register();
        if (!isset($_SESSION)) session_start();

        if (isset($_POST['reg'])) {
            $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
            $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);

            $model->validateUser($login, $password, $email, '');
            $_SESSION['login'] = $login;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            $_SESSION['status'] = 0;
            $model->register($login, $email, $password);
            header('Location: /');
        }
    }
}