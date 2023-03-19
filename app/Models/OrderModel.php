<?php

class OrderModel extends BaseModel {

    protected $table = "orders";
    
    
    function store($clientID,$dateBuy,$clientName,$address,$phone) {
        if($this->table !== null) {
            $sql = "INSERT INTO $this->table (clientID,dateBuy,clientName,address,phone)) VALUES(?,?,?,?,?)";
            return $this->_query($sql)->execute([$clientID,$dateBuy,$clientName,$address,$phone]);
        }
    }
}
?>