<?php
/**
 * Created by PhpStorm.
 * User: Web App Develop-PHP
 * Date: 12/9/2021
 * Time: 9:59 AM
 */

namespace App\classes;


class Blog
{
    private $title;

    private $description;
    private $imageName;
    private $directory;
    private $file;
    private $link;
    private $sql;
    private $queryResult;
    private $row;
    private $data = [];
    private $i;
    private $imgURL;
    public static $con;


    public function __construct($data = null, $file = null)
    {
        if ($data) {
            $this->title = $data['title'];
            $this->description = $data['description'];
        }

        if ($file) {
            $this->file = $file;
        }

    }


    public function save()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'blog_project');
        if ($this->link) {
            if (empty($this->file['image']['name'])){
                $this->imgURL = '';
            }
            else{
                $this->imgURL = $this->getImageURL();
            }

            $this->sql = "INSERT INTO blogs (title, description, image) VALUES ('$this->title','$this->description','$this->imgURL')";
            if (mysqli_query($this->link, $this->sql)) {
                return 'Blog Post Successfully';
            }
            else {
                die ('Query Problem....'.mysqli_error($this->link));
            }


        }
    }

    protected function getImageURL()
    {
        $this->imageName = $this->file['image']['name'];
        $this->directory = '../assets/img/' . $this->imageName;
        move_uploaded_file($this->file['image']['tmp_name'], $this->directory);
        return $this->directory;
    }

    public function getAllBlogs()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'blog_project');
        if ($this->link){
            $this->sql = "SELECT * FROM blogs";
            if (mysqli_query($this->link, $this->sql)){
                $this->queryResult = mysqli_query($this->link, $this->sql);
                $this->i = 0;
                while ($this->row = mysqli_fetch_assoc($this->queryResult)){
                    $this->data[$this->i]['id'] = $this->row['id'];
                    $this->data[$this->i]['title'] = $this->row['title'];
                    $this->data[$this->i]['description'] = $this->row['description'];
                    $this->data[$this->i]['image'] = $this->row['image'];
                    $this->i++;

                }
                return $this->data;
            }
            else{
                die('Query problem..'.mysqli_error($this->link));
            }
        }

    }
    public function getInfoById($id){
        $this->link = mysqli_connect('localhost', 'root', '', 'blog_project');
        if ($this->link){
            $this->sql = "SELECT * FROM blogs WHERE id = '$id'";
            if (mysqli_query($this->link, $this->sql)){
                $this->queryResult = mysqli_query($this->link, $this->sql);
                return mysqli_fetch_assoc($this->queryResult);
            }
            else{
                die('Query problem..'.mysqli_error($this->link));
            }
        }

    }

    public function updateBlogInfoById($blogInfo)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'blog_project');

        if ($this->link){

            if (empty($this->file['image']['name'])){

                $this->imgURL = $blogInfo['image'];


            }
            else{
                if (file_exists($blogInfo['image'])){
                    unlink($blogInfo['image']);
                }

                $this->imgURL = $this->getImageURL();


            }
            $this->sql = "UPDATE blogs SET title = '$this->title', description = '$this->description', image = '$this->imgURL' WHERE id = '$blogInfo[id]'";
            if (mysqli_query($this->link, $this->sql)){
                session_start();
                $_SESSION['message'] = 'Blog info updated successfully';
                header("Location: action.php?status=manage");
            }
            else{
                die('Query problem..'.mysqli_error($this->link));
            }

        }

    }

    public function deleteBlogInfoById($id)
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'blog_project');

        if ($this->link){
            $this->row =  $this->getInfoById($id);
            if (file_exists($this->row['image'])){
                unlink($this->row['image']);
            }
            $this->sql = "DELETE FROM blogs WHERE id = '$id'";
            if (mysqli_query($this->link, $this->sql)){
                session_start();
                $_SESSION['message'] = "Blogs  deleted";
                header("Location: action.php?status=manage");
            }
            else{
                die("query problem..".mysqli_error($this->link));

            }
        }


    }


}