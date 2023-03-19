<?php

class CmtModel extends BaseModel {

    protected $table = "feeback";

    function addedCmt($note,$bookID,$clientID,$dateCreated) {

        if($this->table !== null) {
            $sql = "INSERT INTO $this->table (note,bookID,clientID,dateCreated) VALUES(?,?,?,?)";
            return $this->_query($sql)->execute([$note,$bookID,$clientID,$dateCreated]);
        }
    }
    function loadCmt($proID) {
        if($this->table !== null) {
            $sql = "SELECT $this->table.id,$this->table.note,$this->table.dateCreated,$this->table.bookID,$this->table.clientID,clients.username,clients.avatar FROM $this->table LEFT JOIN clients ON $this->table.clientID = clients.clientID WHERE bookID = ? ORDER BY $this->table.id DESC";
            $this->_query($sql)->execute([$proID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
}
?>