<?php

class OrderModel extends BaseModel {

    protected $table = "orders";
    protected $sub_table = "orderdetail";
    
    
    //Load all
    function loadOrderClient($clientID) {
        if($this->table !== null && $this->sub_table !== null) {
            $sql = "SELECT $this->sub_table.id,$this->sub_table.quantity,$this->sub_table.price AS priceOrder,($this->sub_table.price * $this->sub_table.quantity) AS sumPriceOrder,books.bookName,$this->table.dateBuy,$this->table.clientID FROM $this->sub_table LEFT JOIN $this->table ON $this->sub_table.orderID = $this->table.id LEFT JOIN books ON $this->sub_table.bookID = books.id WHERE clientID = ? ORDER BY id DESC ";
            $this->_query($sql)->execute([$clientID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    
    function store($clientID,$dateBuy,$clientName,$address,$phone,$carts) {
        if($this->table !== null && $this->sub_table !== null) {
            $sql = "INSERT INTO $this->table(clientID,dateBuy,clientName,address,phoneNumber) VALUES(?,?,?,?,?)";
            $this->_query($sql)->execute([$clientID,$dateBuy,$clientName,$address,$phone]);
            $orderID = $this->connect->lastInsertId();
            // _dump($sql);_dump($orderID);
            // _dump($clientID);die;
            $sql = "INSERT INTO $this->sub_table(orderID,bookID,quantity,price) VALUES(?,?,?,?)";
            $this->stmt = $this->_query($sql);
            foreach($carts as $itemCart) {
                $this->stmt->execute([$orderID,$itemCart['bookID'],$itemCart['quantity'],$itemCart['price']]);
            }
            // die($sqlOrderDetail);
            // return $this->connect->commit();
            return true;
        }
    }
}
?>