<?php

class HomeController {

    use Controller;
    private $home;
    function __construct()
    {
        $this->home = $this->model("CateModel");
    }
    function index() {
        $this->view("client.layout.index");
    }

}
?>