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
        $this->view("admin.layout.index",);
    }
    function listBook() {
        $page = $this->book->loadAll();
        $pages = ceil(count($page) / 6);
        $this->view("admin.layout.Components.Book.list",
        [   
            'books' => $this->book->loadAll(),
            'pages' => $pages,
        ]
    );
    }
    function listCate(){
        $page = $this->cate->all();
        $pages = ceil(count($page) / 6);
        // _dump($pages);
        $this->view("admin.layout.Components.Cate.list",
        [
            'cates' => $this->cate->getPage(),
            'pages' => $pages
        ]
    );
    
    }
}
?>