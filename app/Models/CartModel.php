<?php

class CartModel extends BaseModel {

    protected $table = "carts";

    function store($bookName,$clientID,$bookID,$image,$price,$quantity){
        if($this->table !== null) {
            $sql = "INSERT INTO () VALUES (?,?,?,?,?,?)";
        }
    }
}
?>