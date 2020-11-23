<?php

require_once 'application/models/model_redact_user.php';
require_once 'application/models/model_register.php';
class Controller_Redact_User extends Controller
{
    public function __construct()
    {
        $this->view = new View();
        $this->model = new Model_Redact_User();
    }

    public function action_index()
    {
        $data = $this->model->get_data('users');
        $this->view->generate('redact_user_view.php', 'template_view.php', $data,'Редактирование пользователей');
    }

    public function action_insert_data()
    {
        if (isset($_POST,
            $_POST['user_login'],
            $_POST['user_email'],
            $_POST['user_password'],
            $_POST['status']
        )) {
            $login = $_POST['user_login'];
            $email = $_POST['user_email'];
            $password = $_POST['user_password'];
            $status = $_POST['status'];

            $model_reg = new Model_Register();
            $model_reg->validateUser($login, $password, $email,'');

            if (isset($_POST['create_user'])) {
                $this->model->insert_data(
                    "users",
                    "login, email, password, status",
                    "'$login', '$email', '$password', '$status'"
                );
                header("Location: /redact_user");
            }
        }
    }

    public function action_del_data()
    {
        if (isset($_POST, $_POST['del_user'])) ;
        $this->model->delete_data("users", $_POST['del_id_user']);
        header('Location: /redact_user');
    }

    public function action_update_data()
    {
        if (isset($_POST,
            $_POST['update_login_user'],
            $_POST['update_email_user'],
            $_POST['update_password_user'],
            $_POST['update_id_user'],
            $_POST['update_status_user'],
            $_POST['update_last_login']
        )) {

            $update_login_user = $_POST['update_login_user'];
            $update_email_user = $_POST['update_email_user'];
            $update_password_user = $_POST['update_password_user'];
            $update_user_id = $_POST['update_id_user'];
            $update_status_user = $_POST['update_status_user'];
            $update_last_login = $_POST['update_last_login'];
            $model_reg = new Model_Register();
            $model_reg->validateUser($update_login_user, $update_password_user, $update_email_user, $update_last_login);

            if ($_POST['update_user']) {
                $this->model->update_data(
                    "users",
                    "login = '$update_login_user', email = '$update_email_user', password = '$update_password_user', status = '$update_status_user' ",
                    $update_user_id
                );
                header('Location: /redact_user');
            }
        }
    }
}