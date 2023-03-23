<?php

class AdminController{

    use Controller;
    protected $book;
    protected $cate;
    protected $client;
    protected $feedback;
    protected $author;
    protected $order;
    function __construct()
    {
        $this->book = $this->model("BookModel");
        $this->cate = $this->model("CateModel");
        $this->client = $this->model("UserModel");
        $this->feedback = $this->model("CmtModel");
        $this->author = $this->model("AuthorModel");
        $this->order = $this->model("OrderModel");
        
        if(!isset($_SESSION['userID']) || $_SESSION['role'] !== '0') {
            _redirectLo(URL."Home");
        }
    }
    function index() {
        $this->view("admin.layout.Components.home",
        [
            'statistical' => $this->book->statistical()
        ]
    );
    }
    function listBook() {
        $page = $this->book->loadAll();
        $pages = ceil(count($page) / 6);
        
        if($_SERVER['REQUEST_METHOD'] === "POST") {
            if(isset($_POST['btn-search'])) {
                $books = $this->book->searchBook($_POST['bookName'],$_POST['cateID']);
            }
        }else {
            $books = $this->book->loadAll();
        }
        $this->view("admin.layout.Components.Book.list",
        [   
            'books' => $books,
            'cates' => $this->cate->all(),
            'pages' => $pages,
           
        ]
    );
    }
    function listCate(){
        $page = $this->cate->all();
        $pages = ceil(count($page) / 6);
        // _dump($pages);
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cate = $this->cate->searchCate($_POST['cateID']);
        }else {
            $cate = $this->cate->all();
        }
        $this->view("admin.layout.Components.Cate.list",
        [
            'cates' => $cate,
            'pages' => $pages
        ]
    );
    
    }

    function listClient(){
        $page = $this->client->all();
        $pages = ceil(count($page) / 6);
        $this->view("admin.layout.Components.Client.list",
        [
            'clients' =>$this->client->all(),
            'pages' => $pages
        ]
    );
    }
    
    function listFeedBack(){
        $page = $this->feedback->loadAll();
        $pages = ceil(count($page) / 6);
        $this->view("admin.layout.Components.Feedback.list",
        [
            'feedbacks' =>$this->feedback->loadAll(),
            'pages' => $pages
        ]
    );
    }
    function listAuthor(){
        $this->view("admin.layout.Components.Author.list",
        [
            'authors'=>$this->author->all(),
        ]
    );
    }

    function listOrder(){
        
        $this->view("admin.layout.Components.Orders.list",
        [
            'orders' =>$this->order->loadAllStatusOrder(),
        ]
        );
    }
    
}
?>