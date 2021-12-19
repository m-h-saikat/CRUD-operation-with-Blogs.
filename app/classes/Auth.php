<?php


namespace App\classes;
use App\classes\Database;


class Auth extends Database
{
    private $email;
    private $password;
    private $con;
    private $sql;
    private $queryResult;
    private $data;

    public function __construct($data = null)
    {
        $this->con = $this->connect();
        if ($data){


            $this->email = $data['email'];
            $this->password = md5($data['password']);
        }
    }

    public function login(){
        $this->sql = "SELECT * FROM users WHERE email = '$this->email' AND password = '$this->password'";
        if ($this->queryResult = mysqli_query($this->con, $this->sql)){
            $this->data = mysqli_fetch_assoc($this->queryResult);
            if ($this->data){
                session_start();
                $_SESSION['id'] = $this->data['id'];
                $_SESSION['title'] = $this->data['title'];
                header('Location: home.php');
            }
            else{
                return "Sorry... email or password in invalid";
            }
        }
        else{
            die('Query Problem..'.mysqli_error($this->con));
        }
    }

    public function logout(){
        session_start();
        unset($_SESSION['id']);
        unset($_SESSION['title']);
        header('Location: action.php?status=index');
    }

}