<?php

class UserModel extends BaseModel {

    protected $table = 'clients';

    // đăng ký
    function register($username,$accountName,$email,$password,$address,$phoneNumber) {
        if($this->table !== null) {
            $sql = "INSERT INTO $this->table (username,accountName,email,password,address,phoneNumber) VALUES(?,?,?,?,?,?)";
            return $this->_query($sql)->execute([$username,$accountName,$email,$password,$address,$phoneNumber]);
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
    
    function getOneUser($id) {
        if($this->table !== null) {
            $sql = "SELECT * FROM $this->table WHERE clientID = ?";
            $this->_query($sql)->execute([$id]);
            $data = $this->stmt->fetch();
            return $data;
            // $data = $this->getOne($id);
            // return $data;
        }
    }
    function updateUser($email,$username,$accountName,$address,$phoneNumber,$avatar,$userID){
        if ($this->table !== null) {
            $sql = "UPDATE $this->table SET email = ?,username = ? ,accountName = ?,address = ?, phoneNumber = ?, avatar = ? WHERE clientID = ?";
            return $this->_query($sql)->execute([$email, $username, $accountName, $address, $phoneNumber, $avatar, $userID]);
        }
    }
}
?>