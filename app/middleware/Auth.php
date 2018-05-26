<?php
class Auth implements Middleware
{
    function handle()
    {
        session_start();
        if (isset($_POST["exit"])) {
            unset($_SESSION['admin']);
            session_destroy();
            echo output('admin/login', [],0);
            return false;
        }


        $arr = SQL::table('admin')->select()->execute();
        foreach ($arr as $key => $value) {
            if ($value['login'] == $_POST['login']
                and $value['password'] == $_POST['password']) {
                $_SESSION['admin'] = true;
            }
        }

        if (isset($_SESSION['admin']) and $_SESSION['admin']) {
            return true;
        } else {
            echo output('admin/login', [],0);
            return false;
        }
    }
    // function handle()
    // {
    //     session_start();
    //     if (isset($_POST["exit"])) {
    //         unset($_SESSION['admin']);
    //         session_destroy();
    //         echo output('admin/login', []);
    //         return false;
    //     }


    //     $arr = SQL::table('admin')->select()->execute();
    //     foreach ($arr as $key => $value) {
    //         if ($value['login'] == $_POST['login']
    //             and $value['password'] == $_POST['password']) {
    //             $_SESSION['admin'] = true;
    //         }
    //     }

    //     if (isset($_SESSION['admin']) and $_SESSION['admin']) {
    //         return true;
    //     } else {
    //         echo output('admin/login', []);
    //         return false;
    //     }
    // }
}