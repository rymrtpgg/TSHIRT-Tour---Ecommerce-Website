<?php declare(strict_types = 1);

namespace core\users;

session_start();
require_once(dirname(dirname(__DIR__)). "/vendor/autoload.php");

use core\config\Db;

class Register extends Db
{

    protected $username;
    protected $email;
    protected $password;
    protected $confirm_password;
    protected $hashPassword;

    public function requireAllFields(): boolean {

        if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirm_password)){
            return false;
        }

        return true;
        
    }

    public function validateUsername(): boolean {

        if(!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/', $this->username)){
            return false;
        }

        return true;

    }

    public function validateEmail(): boolean {

        if(!filter_var($this->email ,FILTER_VALIDATE_EMAIL)){
            return false;
        }

        return true;

    }

    public function validatePassword(): boolean {

        if(strlen($this->password) < 8){
            return false;
        }

        return true;

    }

    public function validateConfirmPassword(): boolean {

        if($this->password !== $this->confirm_password){
            return false;
        }

        return true;

    }

    public function hashPassword(): void {

        $this->hashPassword =  password_hash($this->password, PASSWORD_DEFAULT);
                                

    }

    public function registerUser(): boolean {

        $sql = "INSERT INTO users(user_name, user_email, user_password)VALUES(:user_name, :user_email, :user_password)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":user_name", $this->username, PDO::PARAM_STR);
        $stmt->bindParam(":user_email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":user_password", $this->password, PDO::PARAM_STR);

        if($stmt->execute()){
            return true;
        }

        return false;

    }

    

}