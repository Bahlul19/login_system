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
    
     /*User Registration Method*/
    
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
        
        if($checkEmail == true)
        {
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>
            Email Address Already Exist</div>";
            return $msg;
        }
        
        $sql = "INSERT INTO tbl_user (name,username,email,password) VALUES(:name,:username,:email,:password)";
        $value = $this->db->pdo->prepare($sql);
        $value->bindValue(':name',$name);
        $value->bindValue(':username',$username);
        $value->bindValue(':email',$email);
        $value->bindValue(':password',$password);
        $value->execute();
        
        if($value)
        {
             $msg = "<div class='alert alert-success'><strong>Thank you! </strong>
            You complete your registration.</div>";
            return $msg;
        }
        else
        {
            $msg = "<div class='alert alert-alert'><strong>OOPS! </strong>
            Something wrong during registration.</div>";
            return $msg;
        }
    }
    
    
    /*User Email_Check Method*/
    
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
    
    /*User Email and Login Method For Login*/
    
    public function getLoginUser($email, $password)
    {
        $sql = "SELECT * FROM tbl_user WHERE email = :email AND password = :password limit 1";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':email', $email);
        $query->bindValue(':password', $password);
        $query->execute();
        $value = $query->fetch(PDO::FETCH_OBJ);
        return $value;
    }
    
    /*User Login Method*/
    
    public function userLogin($data)
    {
        $email = $data['email'];
        $password = md5($data['password']);
        $checkEmail = $this->emailCheck($email);
        
        if($email == "" || $password == "")
        {
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>
            Field must not be empty </div>";
            return $msg;
        }
        
        if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
        {
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>
            Invalid Email Address</div>";
            return $msg;
        }
 
        if($checkEmail == false)
        {
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>
            Email Not Exist</div>";
            return $msg;
        }
        
        $value = $this->getLoginUser($email, $password);
        
        if($value)
        {
            Session::init();
            Session::set("login", true);
            Session::set("id", $value->id);
            Session::set("name", $value->name);
            Session::set("username", $value->username);
            Session::set("loginMsg", "<div class='alert alert-success'><strong>Success! </strong>
            You are logged in.</div>");
            header("Location: index.php");
        }
        else
        {
            $msg = "<div class='alert alert-danger'><strong>Error! </strong>
            Data not found.</div>";
            return $msg;
        }
    }
}

?>
