<?php

class BookModel extends BaseModel
{
    // use BaseModel;
    protected $table = "books";

    // Methods load data left join vs category
    function loadAll()
    {
        if ($this->table !== null) {
            $sql = $this->_selectQuery() . " ORDER BY id DESC";
            $this->_query($sql)->execute();
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    // Methods Limit 10 sp mới nhất theo status
    function limit10FollowStatus($statusID)
    {
        if ($this->table !== null) {
            $sql = $this->_selectQuery() . " WHERE statusID = ? LIMIT 10";
            $this->_query($sql)->execute([$statusID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    // Methods load book follow categories
    function bookFollowCategories($cateID)
    {
        if ($this->table !== null) {
            $sql = $this->_selectQuery() . " WHERE cateID = ?";
            $this->_query($sql)->execute([$cateID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    // book details
    function bookDetail($id)
    {
        if ($this->table !== null) {
            $sql = $this->_selectQuery() . " WHERE $this->table.id = ?";
            $this->_query($sql)->execute([$id]);
            $data = $this->stmt->fetch();
            return $data;
        }
    }
    // Methods tạo mới
    function new($cateID, $bookName, $image, $authorID, $dateAdded, $price, $description, $status)
    {
        if ($this->table !== null) {
            $sql = "INSERT INTO $this->table (cateID,bookName,image,authorID,dateAdded,price,description,statusID) VALUES(?,?,?,?,?,?,?,?)";
            return $this->_query($sql)->execute([$cateID, $bookName, $image, $authorID, $dateAdded, $price, $description, $status]);
        }
        return false;
    }
    // Methods update
    function update($cateID, $bookName, $image, $authorID, $dateAdded, $price, $description, $statusID, $id)
    {
        if ($this->table !== null) {
            $sql = "UPDATE $this->table SET cateID = ?,bookName = ? ,image = ?,authorID = ? ,dateAdded = ?, price = ?, description = ? , statusID = ? WHERE id = ?";
            return $this->_query($sql)->execute([$cateID, $bookName, $image, $authorID, $dateAdded, $price, $description, $statusID, $id]);
        }
    }

    //Phân trang
    function searchAndPaging($bookName = '', $cateID = '')
    {
        if ($this->table !== null) {
            
            if(isset($_GET['page'])) {
                $page = $_GET['page'];
            }else {
                $page = 1;
            }
            // $page = 1;
            $end = 6;
            $from = ($page - 1) * $end;
            if($bookName !== null) {
                $sql = $this->_selectQuery() . " AND $this->table.bookName LIKE '%$bookName%' ORDER BY $this->table.id LIMIT $from,$end";
            }
            if($cateID > 0) {
                $sql = $this->_selectQuery() ." AND $this->table.cateID LIKE '%$cateID%' ORDER BY $this->table.id LIMIT $from,$end";
            }
            $sql = $this->_selectQuery(). " ORDER BY $this->table.id LIMIT $from,$end";
            $this->stmt = $this->connect->prepare($sql);
            $this->stmt->execute();
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }

    // Search Sản phẩm
    function searchBook($bookName = '', $cateID = '')
    {
        if ($this->table !== null) {
            if($bookName !== null) {
                $sql = $this->_selectQuery() . " WHERE 1 AND $this->table.bookName LIKE '%$bookName%'";
            }
            if($cateID > 0) {
                $sql = $this->_selectQuery() . " WHERE 1 AND $this->table.cateID LIKE '%$cateID%'";
            }
            // $sql = $this->_selectQuery() . " AND $this->table.bookName LIKE '%$bookName%' AND $this->table.cateID LIKE '%$cateID%' ";
            // _dump($sql);die;
            $this->stmt = $this->connect->prepare($sql);
            $this->stmt->execute();
            $data = $this->stmt->fetchAll();
            // $this->_query($sql)->execute([$bookName,$cateID]);
            // $data = $this->stmt->fetchAll();
            return $data;
        }
    }

    // Update views
    function updateView($id)
    {
        if ($this->table !== null) {
            $sql = "UPDATE $this->table SET $this->table.view=view+1 WHERE id =?";
            return $this->_query($sql)->execute([$id]);
        }
    }
    //load books theo lượt xem
    function bookView()
    {
        if ($this->table !== null) {
            $sql = $this->_selectQuery() . " WHERE $this->table.view > 10";
            $this->_query($sql)->execute();
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }


    // Thống kê sản phẩm
    public function statistical()
    {
        $sql = "SELECT categories.id,categories.cateName,";
        $sql .= " COUNT($this->table.id) AS sumPro, MIN($this->table.price) AS minPrice,MAX($this->table.price) as maxPrice,AVG($this->table.price) AS avgPrice";
        $sql .= " FROM $this->table LEFT JOIN categories ON categories.id = $this->table.cateID GROUP BY categories.id ORDER BY categories.id DESC";
        $this->stmt = $this->connect->prepare($sql);
        $this->stmt->execute();
        $data = $this->stmt->fetchAll();
        return $data;
    }

    // Sách cùng danh mục
    function similarBook($id, $cateID)
    {
        if ($this->table !== null) {
            $sql = $this->_selectQuery() . " WHERE $this->table.id <> ? AND $this->table.cateID = ?";
            $this->_query($sql)->execute([$id, $cateID]);
            $data = $this->stmt->fetchAll();
            return $data;
        }
    }
    //sách cùng tác giả
    function selectAuthor($authorID){
        if ($this->table !== null) {
            $sql = $this->_selectQuery() . " WHERE authors.authorName = ?";
            $this->_query($sql)->execute([$authorID]);
           $data = $this->stmt->fetchAll();
           _dump($data);
          
        }
    
    }
    // câu lệnh truy vấn thường xuyên đc dùng
    private function _selectQuery()
    {
        $sql = "SELECT $this->table.id,$this->table.bookName,$this->table.image,$this->table.authorID,$this->table.dateAdded,$this->table.price,$this->table.description,$this->table.cateID,$this->table.view,$this->table.statusID,categories.cateName,authors.authorName,status.statusName FROM $this->table LEFT JOIN categories ON $this->table.cateID = categories.id LEFT JOIN status ON $this->table.statusID = status.id LEFT JOIN authors ON $this->table.authorID = authors.authorID";
        return $sql;
    }
}
