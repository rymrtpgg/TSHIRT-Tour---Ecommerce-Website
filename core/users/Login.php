<?php declare(strict_types = 1);

namespace core\users;

session_start();
require_once(dirname(dirname(__DIR__)). "/vendor/autoload.php");

use core\config\Db;

class Login extends Db
{
    protected $email;
    protected $password;

    public function requiredInputFields() :void {

        if(empty($this->email) || empty($this->password)) {
            header("location:../../index.php?error=input all fields");
            exit;
        }

    }

    public function validateEmail() :void {

        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            header("location:../../index.php?error=invalid email format");
            exit;
        }

    }

    public function loginUser() :void {

        $sql = "SELECT * FROM ecomm WHERE user_email = :user_email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":user_email", $this->email, PDO::PARAM_STR);
        $result = $stmt->execute();



        if($result->rowCount() > 0){

            while($user = $stmt->fetch(PDO::FETCH_ASSOC)){

                if(password_verify($this->password, $user['user_password']))
                {
                    // Create sessions
                    $_SESSION['id'] = $user['user_id'];

                    // Redirect to home page
                    header("location:../../home.php");
                    exit;
                }else{
                    // Incorrect Password
                    header("location:../../index.php?error=incorrect password");
                    exit;
                }

            }

        }else{

            // Incorrect Email
            header("location:../../index.php?error=incorrect email");
            exit;
        }

    }

}

$db = new Db();

echo $db->connect();exit;

