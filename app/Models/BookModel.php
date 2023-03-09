<?php

class BookModel extends BaseModel{
    // use BaseModel;
    protected $table = "books";

    // Methods load data left join vs category
    function loadAll() {
        if($this->table !== null) {
            $sql = "SELECT $this->table.id,$this->table.bookName,$this->table.image,$this->table.author,$this->table.price,$this->table.description,$this->table.cateID,categories.cateName FROM $this->table LEFT JOIN categories ON $this->table.cateID = categories.id";
            $this->_query($sql)->execute();
            $data = $this->stmt->fetchAll();
            return $data;
            // _dump($sql);die;
        }
    } 
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