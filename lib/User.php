<?php

include_once 'Session.php';
include 'Database.php';

class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function userRegistration($data)
    {
        $name = $data['name'];
        $username = $data['username'];
        $email = $data['email'];
        $checkEmail = $this->emailCheck($email);
        $password = $data['password'];

        if($name == "" || $username == "" || $email == "" || $password == "")
        {
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>
            Field must not be empty </div>";
            return $msg;
        }
        
        if(strlen($username)<3)
        {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong>
            Username is too stort!</div>";
            return $msg;
        }
        
        else if(preg_match('/[^a-z0-9_-]+/i',$username))
        {
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>
            Username must only contain alphanumerical, deshes and underscores</div>";
            return $msg;
        }
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
        {
             $msg = "<div class='alert alert-danger'><strong>Error! </strong>
            Invalid Email Address</div>";
            return $msg;
        }
        
       if(strlen($password)<7)
        {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Must be use 6 letter for password</div>";
            return $msg;
        }
        
        if($checkEmail === true)
        {
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>
            Email Address Already Exist</div>";
            return $msg;
        }
        
    }
    
    public function emailCheck($email)
    {
        $sql = "SELECT email FROM tbl_user WHERE email = :email";
        $check_email = $this->db->pdo->prepare($sql);
        $check_email->bindValue(':email',$email);
        $check_email->execute();
        
        if($check_email->rowCount() >0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
}

?>
