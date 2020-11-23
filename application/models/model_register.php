<?php


class Model_Register extends Model
{
    public function register($login, $email, $password)
    {
        mysqli_query($this->link, "INSERT INTO `users`(`login`, `email`, `password`) VALUE('$login', '$email', '$password')");
    }

    public function checkLogin($username)
    {
        return mysqli_query($this->link, "SELECT * FROM `users` WHERE `login` = '$username'");
    }

    public function validateUser($login, $password, $email, $lastLogin)
    {
        if ($lastLogin != $login) {
            if (mysqli_fetch_all($this->checkLogin($login)) != null) {
                echo "Пользователь с таким логином уже существует";
                exit();
            }
        }
        if (mb_strlen($password) < 6) {
            echo "Недопустимая длина пароля";
            exit();
        } elseif (mb_strlen($email) == 0) {
            echo "Введите email";
            exit();
        } elseif (mb_strlen($login) == 0) {
            echo "Введите логин";
            exit();
        }
    }
}