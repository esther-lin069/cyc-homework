<?php 

class BlogController extends Controller{
    function index(){
        echo "home page of BlogController";
    }

    function show($name){
        $user = $this->model("User");
        $user->blog_name = $name;
        $this->view("Blog/show",$user);
    }
}

?>