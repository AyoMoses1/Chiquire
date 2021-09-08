<?php 


    // User Validator Class //

class UserValidator {

    // properties in the class //

    private $data;
    private $errors = [];
    private static $fields = ["username", "email", 'password',"password-retype", "role", "admin"];
    
    // construct function for new class //
    
    public function __construct($post_data) {
        $this->data = $post_data;
    }

    // function to validate the whole form //

    public function validateForm() {
        
        // check if all the input fields exist
        foreach(self::$fields as $field) {
            
            if(!array_key_exists($field, $this->data)){

                trigger_error("$field is not present in data");
                return;
            }
        }

        // call the rest of the validation
        $this->validateUsername();
        $this->validateEmail();
        $this->validatePass();
        return $this->errors;

    }

    // validate username

    private function validateUsername() {

        $values = trim($this->data["username"]);

        // check if username is empty
        if(empty($values)) {

            $this->addError("username", "Username is required");
        }

        // check if it is a valid username
        else if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $values)) {
                $this->addError("username", "Username should be alphanumeric and 6-12 chars");
        }

        // check for existing username
        $existingName = selectOne("users", ["username" => $this -> data["username"]]);
        
        if($existingName) {
            
            if (isset($this -> data['update_user']) && $existingName['id'] != $this -> data['id']) {
                $this->addError("username", "Username already exists");
            }
            if (isset($this -> data['create_admin']) || isset($this -> data['register-btn'])) {
                $this->addError("username", "Username already exists");
            }
        }

    }

    // validate email

    private function validateEmail() {

        $values = trim($this->data["email"]);

        //check if email is empty //
        if(empty($values)) {

            $this->addError("email", "Email is required");
        }

        else {

            // check if the email is valid//

            if(!filter_var($values, FILTER_VALIDATE_EMAIL)) {
                $this->addError("email", "Input a valid email");
            }
        }

        // check for existing email
        $existingMail = selectOne("users", ["email" => $_POST["email"]]);

        if($existingMail) {
            if (isset($this -> data['update_user']) && $existingMail['id'] != $this -> data['id']) {
                $this->addError("email", "Email already exists");
            }
            if (isset($this -> data['create_admin']) || isset($this -> data['register-btn'])) {
                $this->addError("email", "Email already exists");
            }
        }

    }

    // validate password

    private function validatePass() {

        $values = $this->data["password"];
        $passrtyp = $this->data["password-retype"];

        // check if password is empty //
        if(empty($values)) {

            $this->addError("password", "Password required");
        }

        // check if password length is 8 chars or more //
        else if(strlen($values) < 8) {

            $this->addError("password", "Password must be more than 8 chars");
        }

        // check password confirmation //
        else { 

            if($values !== $passrtyp) {

                $this->addError("password", "Passwords do not match");
            }
        }

    }

    // function to write errors //

    private function addError($key, $values) {
        $this->errors[$key] = $values;
    }

}


    // function to validate the whole form //

function validateUserForm($user_data) {
    
    $errors = [];
    $name = trim($user_data["username"]);
    $mail = trim($user_data["email"]);
    $pass = $user_data["password"];
    $passrtyp = $user_data["password-retype"];

    // check if username is empty
    if(empty($name)) {
        array_push($errors, "Username is required");
    }

    // check if it is a valid username
    else if(!preg_match('/^[a-zA-Z0-9]{6,12}$/', $name)) {
            array_push($errors, "Username should be alphanumeric and 6-12 chars");
    }

    // check for existing username
    $existingName = selectOne("users", ["username" => $user_data["username"]]);
    
    if($existingName) {
        
        if (isset($user_data['update_user']) && $existingName['id'] != $user_data['id']) {
            array_push($errors, "Username already exists");
        }
        if (isset($user_data['create_admin']) || isset($user_data['register-btn'])) {
            array_push($errors, "Username already exists");
        }
    }

    //check if email is empty //
    if(empty($mail)) {
        array_push($errors, "Email is required");
    }

    else {
        // check if the email is valid//
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Input a valid email");
        }
    }

    // check for existing email
    $existingMail = selectOne("users", ["email" => $user_data["email"]]);

    if($existingMail) {
        if (isset($user_data['update_user']) && $existingMail['id'] != $user_data['id']) {
            array_push($errors, "Email already exists");
        }
        if (isset($user_data['create_admin']) || isset($user_data['register-btn'])) {
            array_push($errors, "Email already exists");
        }
    }

    // check if password is empty //
    if(empty($pass)) {
        array_push($errors, "Password required");
    }

    // check if password length is 8 chars or more //
    else if(strlen($pass) < 8) {
        array_push($errors, "Password must be more than 8 chars");
    }

    // check password confirmation //
    else { 
        if ($pass !== $passrtyp) {
            array_push($errors, "Passwords do not match");
        }
    }

    return $errors;

}


// Login Validator Function //
function validateLogin($post_data) {

    $errors = [];         
    
    if (empty($post_data['username'])) {
        array_push($errors, "Username is required");
    }

    if (empty($post_data['password'])) {
        array_push($errors, "Password is required");
    }

    return $errors;

}
 
?>