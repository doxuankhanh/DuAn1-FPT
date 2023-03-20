<?php

class OrderModel extends BaseModel {

    protected $table = "orders";
    protected $sub_table = "orderdetail";
    
    
    function store($clientID,$dateBuy,$clientName,$address,$phone,$carts) {
        if($this->table !== null) {
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