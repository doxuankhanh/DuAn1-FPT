<?php

class BookModel extends BaseModel{
    // use BaseModel;
    protected $table = "books";

    // Methods load data left join vs category
    function loadAll() {
        if($this->table !== null) {
            $sql = $this->_selectQuery() ." ORDER BY id ASC";
            $this->_query($sql)->execute();
            $data = $this->stmt->fetchAll();
            return $data;
        }
    } 
    // Methods Limit 10 sp mới nhất theo status
    function limit10FollowStatus($statusID) {
        if($this->table !== null) {
            $sql = $this->_selectQuery(). " WHERE statusID = ? LIMIT 10";
            $this->_query($sql)->execute([$statusID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    // Methods load book follow categories
    function bookFollowCategories($cateID) {
        if($this->table !== null) {
            $sql = $this->_selectQuery() . " WHERE cateID = ?";
            $this->_query($sql)->execute([$cateID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    // book details
    function bookDetail($id) {
        if($this->table !== null)  {
            $sql = $this->_selectQuery() . " WHERE $this->table.id = ?";
            $this->_query($sql)->execute([$id]);
            $data = $this->stmt->fetch();
            return $data;
        }
    }
    // Methods tạo mới
    function new($cateID,$bookName,$image,$author,$dateAdded,$price,$description,$status) {
        if($this->table !== null) {
            $sql = "INSERT INTO $this->table (cateID,bookName,image,author,dateAdded,price,description,statusID) VALUES(?,?,?,?,?,?,?,?)";
            return $this->_query($sql)->execute([$cateID,$bookName,$image,$author,$dateAdded,$price,$description,$status]);
        }
        return false;
    }
    // Methods update
    function update($cateID,$bookName,$image,$author,$dateAdded,$price,$description,$statusID,$id) {
        if($this->table !== null) {
            $sql = "UPDATE $this->table SET cateID = ?,bookName = ? ,image = ?,author = ? ,dateAdded = ?, price = ?, description = ? , statusID = ? WHERE id = ?";
            return $this->_query($sql)->execute([$cateID,$bookName,$image,$author,$dateAdded,$price,$description,$statusID,$id]);
        }
    }

    //Phân trang
    function searchAndPaging($bookName='',$cateID ='') {
        if($this->table !== null) {
            if(isset($_REQUEST['page'])) {
                $page = $_REQUEST['page'];
            }else {
                $page = 1;
            }
            $end = 6;
            $from = ($page - 1) * $end;
            $sql = $this->_selectQuery(). " AND $this->table.bookName LIKE ? AND $this->table.cateID LIKE ?";
            $sql.= " ORDER BY $this->table.id LIMIT $from,$end";
            $this->_query($sql)->execute([$bookName,$cateID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }

    // Search Sản phẩm
    // function searchBook($bookName = '', $cateID = '') {
    //     if($this->table !== null) {
    //         $sql = $this->_selectQuery() . " AND $this->table.bookName LIKE ? AND $this->table.cateID LIKE ?";
    //         $this->_query($sql)->execute([$bookName,$cateID]);
    //         $data = $this->stmt->fetchAll();
    //         return $data;
    //     }
    // }

    private function _selectQuery() {
        $sql = "SELECT $this->table.id,$this->table.bookName,$this->table.image,$this->table.author,$this->table.price,$this->table.description,$this->table.cateID,$this->table.view,$this->table.statusID,categories.cateName,status.statusName FROM $this->table LEFT JOIN categories ON $this->table.cateID = categories.id JOIN status ON $this->table.statusID = status.id";
        return $sql;
    }
}
?>