<?php

class BookController  {

    use Controller;
    private $book;
    private $cate;
    private $status;
    function __construct()
    {
        $this->book = $this->model("BookModel");
        $this->cate = $this->model("CateModel");
        $this->status = $this->model("StatusModel");
    }
    function index() {
        $this->view("admin.layout.Components.Book.list",
        [
        'books' => $this->book->loadAll(),
        'cates' => $this->cate->all(),
        ]
    );
    }
    //Methods new 

    function new() {
        if(isset($_POST['btn-new'])) {
            $img = $_FILES['image']['name'];
            $result = $this->book->new($_POST['cateID'],$_POST['bookName'],$img,$_POST['author'],date("Y/m/d H:i:a"),$_POST['price'],$_POST['description'],$_POST['statusID']);
            move_uploaded_file($_FILES['image']['tmp_name'], "Public/upload/" . basename($img));
            if($result) {
                header("Location:".URL."Admin/listBook");
            }
        }
        $this->view("admin.layout.Components.Book.add",
        ['cates' => $this->cate->all(),
        'status' => $this->status->all()
        ]
    );
    }

    //Methods Update
    function update($id) {
        $book = $this->book->getOne($id);
        if(isset($_POST['btn-update'])) {
            if($_FILES['image']['size'] === 0) {
                $img = $book['image'];
            }else {
                $img = $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], "Public/upload/".basename($img));
            }
            $result = $this->book->update($_POST['cateID'],$_POST['bookName'],$img,$_POST['author'],date("Y/m/d H:i:a"),$_POST['price'],$_POST['description'],$_POST['statusID'],$id);
            // _dump($result);die;
            if($result) {
                header("Location:".URL."Admin/listBook");
            }
        }
        $this->view("admin.layout.Components.Book.update",
        [
            'book' => $this->book->getOne($id),
            'cates' => $this->cate->all(),
            'status' => $this->status->all()
        ]
    );
    }
    //Methods Delete
    function delete($id) {
        $result = $this->book->delete($id);
        if($result) {
            header("Location:".URL."Admin/listBook");
            $this->view("admin.layout.Components.Book.list",['books' => $this->book->all()]);
        }
    }
    
    
}

?>