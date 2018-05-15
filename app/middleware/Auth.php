<?php
class Auth extends Middleware
{

    function handle()
    {
        session_start();
        if (isset($_POST["exit"])) {
            unset($_SESSION['admin']);
            session_destroy();
            echo output('admin/login', []);
            return false;
        }

        if ($_POST['password'] = 123 and $_POST['login'] == "abc") {
            $_SESSION['admin'] = true;
        }

        if (isset($_SESSION['admin']) and $_SESSION['admin']) {
            return true;
        } else {
            echo output('admin/login', []);
            return false;
        }
    }
}