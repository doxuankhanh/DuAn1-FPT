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
    function index($id = '') {
        $this->view("client.layout.index",
        ['cates' => $this->cate->all(),
        'books' => $this->book->limit10FollowStatus(1),
        // 'book' => $this->book->bookDetail($id),
        // 'pages' => 'client/layout/bookDetail'
        ]
    );
    }
    // Detail 
    
    

}
?>