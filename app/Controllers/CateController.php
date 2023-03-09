<?php

class CateController {

    use Controller;
    private $cate;
    function __construct()
    {
        $this->cate = $this->model("CateModel");
    }
    // index là nới load tất cả danh sách
    function index() {
        $this->view("admin.Views.Cate.list",["cates" => $this->cate->all()]);
    }
    // Phương thức tạo mới
    function new() {
        if(isset($_POST['btn-new'])) {
            $result = $this->cate->new($_POST['cateName']);
            if($result) {
                header("Location:".URL."Cate");
            }
            return false;
        }
        $this->view("admin.Views.Cate.add");
    }
    // Phương thức update
    function update($id) {
        if(isset($_POST['btn-update'])) {
            $result = $this->cate->update($_POST['cateName'],$id);
            if($result) {
                header("Location:".URL."Cate");
            }
            return false;
        }
        $this->view("admin.Views.Cate.update",['cate' => $this->cate->getOne($id)]);
    }
    // Phương thức delete
    function delete($id) {
        $result = $this->cate->delete($id);
        if($result) {
            header("Location".URL."Cate");
        }
        return false;
        $this->view("admin.Views.Cate.list",['cates' => $this->cate->all()]);
    }
}
?>