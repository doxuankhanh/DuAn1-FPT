<?php

class BaseModel {
    use Database;
    protected $table = "categories";
    protected $stmt;

    function all() {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table";
            $this->_query($sql)->execute();
            $data = $this->stmt->fetchAll();
            return $data;
        }
        return false;
    }

    function getOne($id) {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table WHERE id = ?";
            $this->_query($sql)->execute([$id]);
            $data = $this->stmt->fetch();
            return $data;
        }
        return false;
    }

    function delete($id) {
        if($this->table !== null) {
            $sql = "DELETE FROM $this->table WHERE id = ?";
            return $this->_query($sql)->execute([$id]);
        }
        return false;
    }
    protected function _query($sql) {
        $this->stmt = $this->connect->prepare($sql);
        return $this->stmt;
    }
}
?>