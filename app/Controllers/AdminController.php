<?php

class AdminController{

    use Controller;
    protected $book;
    protected $cate;
    function __construct()
    {
        $this->book = $this->model("BookModel");
        $this->cate = $this->model("CateModel");
    }
    function index() {
        $this->view("admin.layout.index");
    }
    // function listBook() {
    //     $this->view("admin.Views.Book.list",['books' => $this->book->loadAll()]);
    // }
    // function listCate(){
    //     $this->view("admin.Views.Cate.list",['cates' => $this->cate->all()]);
    // }
}
?>