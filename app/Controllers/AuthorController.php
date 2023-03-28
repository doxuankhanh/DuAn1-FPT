<?php
class AuthorController{
    use Controller;
    private $author;
    function __construct()
    {
        $this->author = $this->model("AuthorModel");
    }
    function index() {
        $this->view("admin.Views.author.list",["authors" => $this->author->all()]);
    }
   function newAuthor(){
    if(isset($_POST['btn-new'])){
        $result = $this->author->newAuthor($_POST['authorName']);
        if($result){
            _redirectLo(URL. "Admin/listAuthor");
        }
        return false;
    }
    $this->view("admin.layout.Components.author.add");
}
   function updateAuthor($id){
    if(isset($_POST['btn-update'])){
        $result = $this->author->updateAuthor($_POST['authorName'],$id);
        if($result){
            _redirectLo(URL. "Admin/listAuthor");
        }
        return false;
    }
    $this->view("admin.layout.Components.Author.update", ['author' => $this->author->find($id)]);
}
   function deleteAuthor($id){
   
        $result = $this->author->delete($id);
        if($result){
            _redirectLo(URL. "Admin/listAuthor");
        }
        return false;
    
}
}


?>