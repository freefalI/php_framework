<?php

class UserController extends Controller
{

   
    public function registration()
    {
        echo output("main/registration");
    }

    public function register()
    {
        if(!$_POST['g-recaptcha-response']){
            header('Location: /');
            return;
      }
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $fathersName = $_POST['fathersName'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phoneNumber'];
        $adress = $_POST['adress'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        if (strcmp($password, $password2)) {
            $url = 'name=' . $name . '&surname=' . $surname . '&fathersName=' . $fathersName . '&email=' .
                $email . '&phoneNumber=' . $phoneNumber . '&adress=' . $adress;
            header('Location: /registration?' . $url);
            // echo output("main/registration")
            return 0;
        }
        try {
            $a = Client::findByEmail($email);
        } catch (Exception $ex) {
            header('Location: /');
        //     return;
        // };
            $client = new Client([
                'email' => $email,
                'name' => $name,
                "surname" => $surname,
                "father_name" => $fathersName,
                "phone" => $phoneNumber,
                "adress" => $adress,
                "password" => $password,
                'is_verified' => 0
            ], true);
            $code = hash('sha256', $client);
            $client->save();

            $num = Client::select()->setValues('id')->execute();
            $num = $num[count($num) - 1]->id;

            $ver = new Verification(
                [
                    'user_id' => $num,
                    'code' => $code
                ],
                1
            );
            $ver->save();
            
            
            //success registration
            $message = '<p>Hello, ' .$name . " " . $surname . '.Please, confirm your email.</p> <p>To activate your account click on the link below.</p>
            <a href = "http://zebra/confirm?userId=' . $num . "&key=" . $code . '">Click here</a>';
            $text = '<!DOCTYPE HTML><html><head><title>Regidtration</title></head><body>' . $message . "</body></html>";
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
            mail($email, 'Registration in Zebra shop', $text, $headers);
        }
        header('Location: /');
        // return;
  
        // echo output("main/registration");
    }
    public function confirm()
    {
        $userId = $_GET['userId'];
        $key = $_GET['key'];
        try {
            $ver = Verification::find($userId);
            if (!strcmp($ver->code, $key)) {
                $c = Client::find($userId);
                $c->is_verified = 1;
                $c->save();
                $ver->delete();
            }

            //zayti

            $_SESSION['user'] = $c;
        } catch (Exception $ex) {
        }
        header('Location: /');
    }

    public function authorisation()
    {
        echo output("main/authorisation");
    }
    public function authorisate()
    {
       
        // if(!$_POST['g-recaptcha-response']){
        //       header('Location: /');
        //       return;
        // }
        
        // echo '<br>' . '6LeBel0UAAAAAAgEkETx7SMs3Yh99KYuWKo2YKy9';
        $email = $_POST['email'];
        $password = $_POST['password'];
        $client = Client::select()->where("email = " . $email . " and password = " . $password)->execute();
        if (!count($client)) {
            header('Location: /');
            return;
        }
        $client = $client[0];
        if ($client->is_verified){
            $_SESSION['user'] = $client;
        }     // print_r($client);
        // echo output("main/authorisation");
         header('Location: /');
    }

    public function unlogin()
    {
        unset($_SESSION['user']);
        header('Location: /');
    }
}