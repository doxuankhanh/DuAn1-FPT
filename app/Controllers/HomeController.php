<?php

class HomeController
{

    use Controller;
    private $cate;
    private $book;
    private $user;
    private $cart;
    private $cmt;
    function __construct()
    {
        $this->cate = $this->model("CateModel");
        $this->book = $this->model("BookModel");
        $this->user = $this->model("UserModel");
        $this->cart = $this->model("CartModel");
        $this->cmt = $this->model("CmtModel");
    }
    function index()
    {
        
        $this->view(
            "client.layout.Pages.Components.home",
            [
                'cates' => $this->cate->all(),
                
                'bookNew' => $this->book->limit10FollowStatus(1),
                'bookSeller' => $this->book->limit10FollowStatus(2),
                'literatureVN' => $this->book->bookFollowCategories(10),
                'literature' => $this->book->bookFollowCategories(11),
                'children' => $this->book->bookFollowCategories(12),

            ]
        );
    }
    // chi tiết sản phẩm
    function bookDetail($id, $cateID)
    {
        $bookDetail = $this->book->bookDetail($id);
        $cates = $this->cate->all();
        $checkCart = $this->cart->checkCartIsset(bookID: $bookDetail['id'], clientID: $_SESSION['userID'] ?? '');
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            // giỏ hàng
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'bookName' => $bookDetail['bookName'] ?? '',
                'clientID' => $_SESSION['userID'] ?? '',
                'bookID' => $bookDetail['id'] ?? '',
                'image' => $bookDetail['image'] ?? '',
                'price' => $bookDetail['price'] ?? '',
                'quantity' => trim($_POST['quantity'] ?? ''),
                // bình luận
                'note' => trim($_POST['note'] ?? ''),
                'timeAdded' => date("Y/m/d H:i:a"),

            ];
            if ($data) {
                //$bookName,$clientID,$bookID,$image,$price,$quantity
                if(isset($_POST['btn-add-cart'])) {
                    if (!isset($_SESSION['userID'])) {
                        $_SESSION['msgEmptyID'] = "Bạn phải đăng nhập để mua sắm";
                    } else {
                        if ($checkCart['bookID'] === $bookDetail['id']) {
                            $_SESSION['msgCartIsset'] = "Sản phẩm đã tồn tại trong giỏ hàng của bạn!";
                        } else {
                            $result = $this->cart->store($data['bookName'], $data['clientID'], $data['bookID'], $data['image'], $data['price'], $data['quantity']);
                            if ($result) {
                                _redirectLo(URL . "Home/getCartByClientID");
                            }
                        }
                    }
                }
                // Bình luận
                if(isset($_POST['btn-comment'])) {

                    if (!isset($_SESSION['userID'])) {
                        $_SESSION['msgCmtEmpty'] = "Bạn phải đăng nhập để sử dụng chức năng!";
                    } else {
                        $cmtAdded = $this->cmt->addedCmt($data['note'], $bookDetail['id'], $data['clientID'], $data['timeAdded']);
                        if ($cmtAdded) {
                            _redirectLo($_SERVER['HTTP_REFERER']);
                        } else {
                            die("STUPID");
                        }
                    }
                }
            }
        } else {
            $data = [
                'bookName' => '',
                'clientID' => '',
                'bookID' => '',
                'image' => '',
                'price' => '',
                'quantity' => '',
                'note' => '',
            ];
        }

        $this->view(
            "client.layout.Pages.Components.bookDetail",
            [
                'cates' => $cates,
                'similarBook' => $this->book->similarBook(id: $id, cateID: $cateID),
                'view' => $this->book->updateView($id),
                'book' => $bookDetail,
                'comments' => $this->cmt->loadCmt($id),
            ]
        );
    }

    // load sp theo view
    function loadBookView()
    {
        $this->view(
            "client.layout.Pages.Components.topView",
            [
                'cates' => $this->cate->all(),
                'viewBook' => $this->book->bookView()
            ]
        );
    }
    // lấy sản phẩm theo cateID
    function bookFollowCategories($cateID)
    {
        $this->view(
            "client.layout.Pages.Components.followCate",
            [
                'cates' => $this->cate->all(),
                'cate' => $this->cate->getOne($cateID),
                'book' => $this->book->bookFollowCategories($cateID)
            ]
        );
    }
    // tạo session khi login thành công
    function createUserSession($user)
    {
        // $_SESSION['client'] = $user;

        $_SESSION['userID'] = $user['clientID'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['accountName'] = $user['accountName'];
        $_SESSION['avatarUser'] = $user['avatar'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        _redirectRe(URL . "Home");
    }
    //Login
    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'email' => trim($_POST['email'] ?? ''),
                'password' => trim($_POST['password'] ?? ''),
                'user' => '',
                'cates' => $this->cate->all(),

                'email_err' => "",
                'password_err' => "",
                'msgErr' => ""
            ];
            // validate email
            if (empty($data['email'])) {
                $data['email_err'] = "Please enter your email";
            } else {
                if (!$this->user->login($data['email'])) {
                    $data['email_err'] = "Email is not founded";
                }
            }
            //validate password
            if (empty($data['password'])) {
                $data['password_err'] = "Please enter your password";
            }
            // k có lỗi 
            if (empty($data['email_err']) && empty($data['password_err'])) {
                $user = $this->user->login($data['email']);
                if (!$user || !password_verify($data['password'], $user['password'])) {
                    $data['msgErr'] = "Thông tin tài khoản hoặc mật khẩu không chính xác";
                } else {
                    $this->createUserSession($user);
                }
            }
        } else {
            $data = [
                'email' => "",
                'password' => "",
                'cates' => $this->cate->all(),

                'email_err' => "",
                'password_err' => "",
            ];
        }
        $this->view("client.layout.Pages.Components.login", $data);
    }

    //đăng xuất
    function destroy()
    {
        session_destroy();
        _redirectRe(URL . "Home/login");
    }
    //Đăng ký
    function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // làm sạch input
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'email' => trim($_POST['email'] ?? ''),
                'username' => trim($_POST['username'] ?? ''),
                'accountName' => trim($_POST['accountName'] ?? ''),
                'password' => trim($_POST['password'] ?? ''),
                'passwordRepeat' => trim($_POST['passwordRepeat'] ?? ''),
                'address' => trim($_POST['address'] ?? ''),
                'phoneNumber' => trim($_POST['phoneNumber'] ?? ''),
                'cates' => $this->cate->all(),
                //
                'email_err' => "",
                'username_err' => "",
                'accountName_err' => "",
                'password_err' => "",
                'passwordRepeat_err' => "",
                'address_err' => "",
                'phoneNumber_err' => "",
                'msgSuccess' => "",
            ];
            // Validate email
            if (empty($data['email'])) {
                $data['email_err'] = "Please enter your email address";
            } else {
                if ($this->user->login($data['email'])) {
                    $data['email_err'] = "Email is already";
                }
            }
            // Validate fullname
            if (empty($data['username'])) {
                $data['username_err'] = "Please enter your username";
            }
            if (empty($data['accountName'])) {
                $data['accountName_err'] = "Please enter your account name";
            }
            // validate password
            if (empty($data['password'])) {
                $data['password_err'] = "Please enter your password";
            } elseif (empty($data['passwordRepeat'])) {
                $data['passwordRepeat_err'] = "Please enter your password";
            } else {
                if ($data['password'] !== $data['passwordRepeat']) {
                    $data['passwordRepeat_err'] = "Passwords are not matching";
                }
            }
            //validate address
            if (empty($data['address'])) {
                $data['address_err'] = "Please enter your address";
            }
            //validate phone
            if (empty($data['phoneNumber'])) {
                $data['phoneNumber_err'] = "Please enter your phone number";
            }
            // kiểm tra k có lỗi thì tiến hành đăng ký
            if (empty($data['email_err']) && empty($data['username_err']) && empty($data['accountName_err']) && empty($data['password_err']) && empty($data['passwordRepeat_err']) && empty($data['address_err']) && empty($data['phoneNumber_err'])) {
                // mã hóa
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $result = $this->user->register($data['username'], $data['accountName'], $data['email'], $data['password'], $data['address'], $data['phoneNumber']);
                if ($result) {
                    $data['msgSuccess'] = "Chúc mừng bạn đã đăng ký thành công! Hãy đăng nhập để mua sắm";
                    // _redirectRe(URL."Home/login");
                } else {
                    return false;
                }
            } else { // load lỗi
                $this->view("client.layout.Pages.Components.register", $data);
            }
        } else {
            // data chứa các giá trị rỗng nếu k tồn tại thì khi in lỗi bên form sẽ k hiện undefine 
            $data = [
                'email' => '',
                'username' => '',
                'accountName' => '',
                'password' => '',
                'passwordRepeat' => '',
                'address' => '',
                'phoneNumber' => '',
                'cates' => $this->cate->all(),


                'email_err' => "",
                'username_err' => "",
                'accountName_err' => "",
                'password_err' => "",
                'passwordRepeat_err' => "",
                'address_err' => "",
                'phoneNumber_err' => "",
                'msgSuccess' => "",
            ];
        }
        $this->view("client.layout.Pages.Components.register", $data);
    }
    //lấy sản phẩm theo clientID
    function getCartByClientID()
    {   

        $this->view(
            "client.layout.Pages.Components.cart",
            [
                'cates' => $this->cate->all(),
                'carts' => $this->cart->getCartByClientID($_SESSION['userID'] ?? ''),
            ]
        );
    }
    // load comment
    function loadBookSearch(){
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'bookName' => trim($_POST['bookName'] ?? ''),
            ];
            if ($data['bookName']) {
                $bookSearch = $this->book->searchBook($data['bookName']);
            }
        } else {
            $data = [
                'bookName' => '',
            ];
        }
        $this->view("client.layout.Pages.Components.searchBook" ,
            [
            // 'cate' => $this->cate->getOne(),
            'bookSearch' => $bookSearch ?? '',
            ]
            );

    }
}
