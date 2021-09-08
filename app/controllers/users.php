<?php 

// make  connection to db
require(ROOT_PATH ."/app/database/db.php");

// email verification class
require_once("emailcontrollers.php");

// validate class
include(ROOT_PATH . "/app/helpers/validateUser.php");

include(ROOT_PATH . '/app/helpers/middleware.php');

$table = "users";
$username = '';
$email = '';
$password = '';
$password_retype = '';
$errors = [];
$role = "";
$user = "";
$id = "";
$token = "";
$verified = "";   

$users = selectAll($table);
$adminUsers = selectAll($table, ['admin' => true]);


// login action
function login($user) {

    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['role'] = $user['role'];
    $_SESSION['message'] = "You are now logged in";
    $_SESSION['type'] = "success";
    $_SESSION['verified'] = $user['verified'];



    if ($_SESSION['admin']) {
        
        header("location:" . BASE_URL . "/admin/dashboard.php");
    } else {
        
        header("location:" . BASE_URL . "/index.php");
    } 
    exit();

}

// create user action
if(isset($_POST["register-btn"]) || isset($_POST["create_admin"])) {
    
    $errors = validateUserForm($_POST);

    if (isset($_POST['role'])) {

        if (empty($_POST['role'])) {
            array_push($errors, "Please select a role");
        }

        if(count($errors) === 0) {
            global $token;

            unset($_POST["password-retype"], $_POST["create_admin"]);

            $_POST["admin"] = 1;
            $_POST["password"] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $_POST['token'] = bin2hex(random_bytes(50));
            $_POST['verified'] = false;


            $user_id = create($table, $_POST);

            $_SESSION['message'] = "Admin user created succesfully";
            $_SESSION['type'] = "success";
            header("location:" . BASE_URL . "/admin/users/index.php");

        }
        
        else {
            // if errors prepare placeholders for email and username

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = '';
            $password_retype = '';
            $role = $_POST['role'];

        }

    }

    else if(count($errors) === 0) {
        // if no errors prepare data and send to db

        unset($_POST["password-retype"], $_POST["register-btn"]);

        $_POST["admin"] = 0;
        $_POST["role"] = 'user';

        $_POST["password"] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['token'] = bin2hex(random_bytes(50));
        $_POST['verified'] = false;

        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);

        // log user in //
        login($user);  
    
    }

    else {
        // if errors prep placeholders for email and username

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = '';
        $password_retype = '';

    }
    
};

// select user to be edited
if (isset($_GET["id"])) {

    $user = selectOne($table, ["id" => $_GET['id']]);
    
    $username = $user['username'];
    $email = $user['email'];
    $role = $user['role'];
    $id = $user['id'];

}

// update user action through edit.php
if (isset($_POST['update_user'])) {
    adminOnly();

    $errors = validateUserForm($_POST);

    if (empty($_POST['role'])) {
        array_push($errors, "Please select a role");
    }

    if(count($errors) === 0) {

        $id = $_POST['id'];
        unset($_POST["password-retype"], $_POST["update_user"], $_POST['id']);

        // check if user is downgraded to user role
        if ($_POST['role'] == 'user') {

            // remove admin privileges
            $_POST["admin"] = 0;
            $_POST["password"] = password_hash($_POST['password'], PASSWORD_DEFAULT);

            // update the user info
            $count = update($table, $id, $_POST);
            $_SESSION['message'] = "Admin user updated succesfully";
            $_SESSION['type'] = "success";
            header("location:" . BASE_URL . "/admin/users/index.php");

        } else {

            $_POST["admin"] = 1;
            $_POST["password"] = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $count = update($table, $id, $_POST);
            $_SESSION['message'] = "Admin user updated succesfully";
            $_SESSION['type'] = "success";
            header("location:" . BASE_URL . "/admin/users/index.php");
 
        }

       
    }

    else {
        // if errors prep placeholders for email and username

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = '';
        $password_retype = '';
        $role = $_POST['role'];
        $id = $_POST["id"];

    }
}

// select user to be deleted
if (isset($_GET["del_id"])) {
    adminOnly();

    $id = $_GET["del_id"];
    delete($table, $id);

    $_SESSION['message'] = "User deleted succesfully";
    $_SESSION['type'] = "success";
    header("location:" . BASE_URL . "/admin/users/index.php");
}

// implementation of login form
if(isset($_POST["login-btn"])){

    $errors = validateLogin($_POST); 

    if (count($errors) === 0) {

        if (!strpos($_POST["username"], "@")) {
        
            $user = selectOne($table, ["username" => $_POST["username"]]);
        
            if ($user && password_verify($_POST["password"], $user["password"])) {
                login($user);
            }
            else {
                array_push($errors, "Invalid username or password");
            }

        }
        else {
            $user = selectOne($table, ["email" => $_POST["username"]]);
            
            if ($user && password_verify($_POST["password"], $user["password"])) {
                login($user);
            }
            else {
                array_push($errors, "Invalid username or password");
            }

        }

    }

    else {
        $username = $_POST["username"];
        $password = $_POST["password"];
    }
   
}

?>