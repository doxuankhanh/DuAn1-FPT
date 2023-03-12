<?php

class UserModel extends BaseModel {

    protected $table = 'clients';

    // đăng ký
    function register($fullname,$email,$password,$address,$phoneNumber) {
        if($this->table !== null) {
            $sql = "INSERT INTO $this->table (fullname,email,password,address,phoneNumber) VALUES(?,?,?,?,?)";
            return $this->_query($sql)->execute([$fullname,$email,$password,$address,$phoneNumber]);
        }
    }
    function login($email) {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table WHERE email = ?";
            $this->_query($sql)->execute([$email]);
            $data = $this->stmt->fetch();
            return $data;
        }
    }
}
?>