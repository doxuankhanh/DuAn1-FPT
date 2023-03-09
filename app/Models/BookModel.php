<?php

class BookModel extends BaseModel{
    // use BaseModel;
    protected $table = "books";

    // Methods tạo mới
    function new($cateID,$bookName,$image,$author,$dateAdded,$price,$description) {
        if($this->table !== null) {
            $sql = "INSERT INTO $this->table (cateID,bookName,image,author,dateAdded,price,description) VALUES(?,?,?,?,?,?,?)";
            return $this->_query($sql)->execute([$cateID,$bookName,$image,$author,$dateAdded,$price,$description]);
        }
        return false;
    }
    // Methods update
    function update($cateID,$bookName,$image,$author,$dateAdded,$price,$description,$id) {
        if($this->table !== null) {
            $sql = "UPDATE $this->table SET cateID = ?,bookName = ? ,image = ?,author = ? ,dateAdded = ?, price = ?, description = ? WHERE id = ?";
            return $this->_query($sql)->execute([$cateID,$bookName,$image,$author,$dateAdded,$price,$description,$id]);
        }
    }
}
?>