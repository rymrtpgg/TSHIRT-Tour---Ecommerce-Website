<?php declare(strict_types = 1);

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

    public function requireAllFields(): void {

        if(empty($this->username) || empty($this->email) || empty($this->password) || empty($this->confirm_password)){
            header("location:../../Form/signup.php?error=input all fields");
            exit;
        }
        
    }

    public function validateUsername(): void {

        if(!preg_match('/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/', $this->username)){
            header("location:../../Form/signup.php?error=invalid format username");
            exit;
        }

    }

    public function validateEmail(): void {

        if(!filter_var($this->email ,FILTER_VALIDATE_EMAIL)){
            header("location:../../Form/signup.php?error=invalid email format");
            exit;
        }

    }

    public function validatePassword(): void {

        if(strlen($this->password) < 8){
            header("location:../../Form/signup.php?error=minimum 8 character");
            exit;
        }

    }

    public function validateConfirmPassword(): void {

        if($this->password !== $this->confirm_password){
            header("location:../../Form/signup.php?error=password doesn't match");
            exit;
        }

    }

    public function hashPassword(): void {

        $this->hashPassword =  password_hash($this->password, PASSWORD_DEFAULT);

    }

    public function registerUser(): void {

        $sql = "INSERT INTO users(user_name, user_email, user_password)VALUES(:user_name, :user_email, :user_password)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":user_name", $this->username, PDO::PARAM_STR);
        $stmt->bindParam(":user_email", $this->email, PDO::PARAM_STR);
        $stmt->bindParam(":user_password", $this->password, PDO::PARAM_STR);

        if($stmt->execute()){
            header("location:../../Form/signup.php?success=successfully created user");
            exit;
        }

    }

    

}