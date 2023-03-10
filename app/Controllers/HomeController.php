<?php

class HomeController {

    use Controller;
    private $cate;
    private $book;
    function __construct()
    {
        $this->cate = $this->model("CateModel");
        $this->book = $this->model("BookModel");
    }
    function index() {
        $this->view("client.layout.index",
        ['cates' => $this->cate->all(),
        'books' => $this->book->limit10FollowStatus(1)
        ]
    );
    }

}
?>