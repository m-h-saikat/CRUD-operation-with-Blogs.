<?php
require_once '../vendor/autoload.php';

use App\classes\Blog;
use App\classes\Auth;

if (isset($_POST['btn'])) {
    $blog = new Blog($_POST, $_FILES);
    $message = $blog->save();
    include 'home.php';
}
else if (isset($_GET['status'])){
    if ($_GET['status'] == 'manage') {
        $blog = new Blog();
        $blogs =  $blog->getAllBlogs();
        include 'manage.php';
    }
    else if ($_GET['status'] == 'edit'){
        $id = $_GET['id'];
        $blog = new Blog();
        $blogInfo = $blog->getInfoById($id);
        extract($blogInfo);
        include 'edit.php';
    }
    else if ($_GET['status'] == 'delete'){
        $id = $_GET['id'];
        $blog = new Blog();
        $blog->deleteBlogInfoById($id);

    }
    else if ($_GET['status']=='index'){
        $blog = new Blog();
        $blogs = $blog->getAllBlogs();
        include 'index.php';
    }
    else if ($_GET['status']=='detail'){
        $id = $_GET['id'];
        $blog = new Blog();
        $blogInfo = $blog->getInfoById($id);
        include 'detail.php';
    }
    else if ($_GET['status'] == 'logout'){
        $auth = new Auth();
        $auth->logout();
    }

}

else if (isset($_POST['updateBtn'])){

    $id = $_POST['id'];
    $blog = new Blog($_POST, $_FILES);
    $blogInfo =  $blog->getInfoById($id);
    $blog->updateBlogInfoById($blogInfo);

}

else if (isset($_POST['loginBtn'])){
    $auth = new Auth($_POST);
    $message = $auth->login();
    include "login.php";
}
