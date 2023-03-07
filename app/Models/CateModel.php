<?php

class CateModel extends BaseModel{

    protected $table = "categories";
    //phương thức tạo mới
    function new($cateName) {
        if($this->table !== null) {
            $sql = "INSERT INTO $this->table (cateName) VALUES (?)";
            return $this->_query($sql)->execute([$cateName]);
        }
    }
    // Phương thức update
    function update($cateName,$id){
        if($this->table !== null) {
            $sql = "UPDATE $this->table SET cateName = ? WHERE id = ?";
            // _dump($sql);die;
            return $this->_query($sql)->execute([$cateName,$id]);
        }
    }
}
?>