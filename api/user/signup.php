<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once('../../vendor/autoload.php');

use core\users\Register;

$register = new Register();

if(isset($_POST['username'])){

    $register->username = $_POST['username'];
    $register->email = $_POST['email'];
    $register->password = $_POST['password'];
    $register->conf_password = $_POST['conf_password'];

    if($register->requireAllFields()){
        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Require all fields!</strong>.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
        exit;
    }

    if($register->validateUsername()){
        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Invalid Username!</strong>.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
        exit;
    }

    if($register->validateEmail()){
        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Invalid Email!</strong>.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
        exit;
    }

    if($register->validatePassword()){
        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Password length must be greater than or equal to 8!</strong>.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
        exit;
    }

    if($register->validateConfirmPassword()){
        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Password must match!</strong>.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";
        exit;
    }

    $register->hashPassword();

    if($register->registerUser()){

        echo "  <div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Successfully Register!</strong>.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";

    }else{

        echo "  <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Something went wrong! Try again</strong>.
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                    </button>
                </div>";

    }


}


