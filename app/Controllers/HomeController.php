<?php

class HomeController {

    use Controller;
    protected $home;
    function __construct()
    {
        $this->home = $this->model("BaseModel");
    }
    function index() {
        $this->home->all();
    }

}
?>