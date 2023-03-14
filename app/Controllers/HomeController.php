<?php

class HomeController
{

    use Controller;
    private $cate;
    private $book;
    private $user;
    function __construct()
    {
        $this->cate = $this->model("CateModel");
        $this->book = $this->model("BookModel");
        $this->user = $this->model("UserModel");
        // session_start();
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
                'children' => $this->book->bookFollowCategories(12)
            ]
        );
    }
    // chi tiết sản phẩm
    function bookDetail($id,$cateID)
    {
        $this->view(
            "client.layout.Pages.Components.bookDetail",
            [
                'cates' => $this->cate->all(),
                'similarBook' => $this->book->similarBook(id:$id,cateID:$cateID),
                'view' => $this->book->updateView($id),
                'book' => $this->book->bookDetail($id),
            ]
        );
    }

    // load sp theo view
    function loadBookView() {
        $this->view("client.layout.Pages.Components.topView",
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
    function createUserSession($user) {
        // $_SESSION['client'] = $user;

        $_SESSION['userID'] = $user['clientID'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['accountName'] = $user['accountName'];
        $_SESSION['avatarUser'] = $user['avatar'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];
        _redirectRe(URL."Home");

        
    }
    //Login
    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'user' => '',
                'cates' => $this->cate->all(),
                
                'email_err' => "",
                'password_err' => "",
                'msgErr' => ""
            ];
            // validate email
            if(empty($data['email'])) {
                $data['email_err'] = "Please enter your email";
            }else {
                if(!$this->user->login($data['email'])) {
                    $data['email_err'] = "Email is not founded";
                }
            }
            //validate password
            if(empty($data['password'])) {
                $data['password_err'] = "Please enter your password";
            }
            // k có lỗi 
            if (empty($data['email_err']) && empty($data['password_err'])) {
                $user = $this->user->login($data['email']);
                if (!$user || !password_verify($data['password'], $user['password'])) {
                    $data['msgErr'] = "Thông tin tài khoản hoặc mật khẩu không chính xác";
                }else {
                    $this->createUserSession($user);
                }
            }
        } else {
            $data = [
                'email' => "",
                'password' => "",


                'email_err' => "",
                'password_err' => "",
            ];
        }
        $this->view("client.layout.Pages.Components.login", $data);
    }

    //đăng xuất
    function destroy() {
        session_destroy();
        _redirectRe(URL."Home/login");
    }
    //Đăng ký
    function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // làm sạch input
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'email' => trim($_POST['email']),
                'username' => trim($_POST['username']),
                'accountName' => trim($_POST['accountName']),
                'password' => trim($_POST['password']),
                'passwordRepeat' => trim($_POST['passwordRepeat']),
                'address' => trim($_POST['address']),
                'phoneNumber' => trim($_POST['phoneNumber']),
                //
                'email_err' => "",
                'username_err' => "",
                'accountName_err' => "",
                'password_err' => "",
                'passwordRepeat_err' => "",
                'address_err' => "",
                'phoneNumber_err' => "",
                'msgSuccess' => "",
                'cates' => $this->cate->all(),
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
            if (empty($data['email_err']) && empty($data['username_err']) && empty($data['accountName_err'])&& empty($data['password_err']) && empty($data['passwordRepeat_err']) && empty($data['address_err']) && empty($data['phoneNumber_err'])) {
                // mã hóa
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $result = $this->user->register($data['username'],$data['accountName'], $data['email'], $data['password'], $data['address'], $data['phoneNumber']);
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

    
}
