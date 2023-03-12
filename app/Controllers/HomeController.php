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
    function bookDetail($id)
    {
        $this->view(
            "client.layout.Pages.Components.bookDetail",
            [
                'cates' => $this->cate->all(),
                'book' => $this->book->bookDetail($id)
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
                'book' => $this->book->bookFollowCategories($cateID)
            ]
        );
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
                // _dump($user);
                // _dump($data['password']);
                // die;
                if (!$user || !password_verify($data['password'], $user['password'])) {
                    $data['msgErr'] = "Thông tin tài khoản hoặc mật khẩu không chính xác";
                }else {
                    // $data['user'] = $_SESSION[$user['email']];
                    header("refresh:1;url=" . URL . "Home");
                    $this->view("client.layout.Pages.header", $data);
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
        if(isset($_GET['action']) && $_GET['action'] === 'logout') {
            die("alo");
            session_destroy();
            header("Location:".URL."Home");
        }
    }
    //Đăng ký
    function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // làm sạch input
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'email' => trim($_POST['email']),
                'fullname' => trim($_POST['fullname']),
                'password' => trim($_POST['password']),
                'passwordRepeat' => trim($_POST['passwordRepeat']),
                'address' => trim($_POST['address']),
                'phoneNumber' => trim($_POST['phoneNumber']),
                //
                'email_err' => "",
                'fullname_err' => "",
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
            if (empty($data['fullname'])) {
                $data['fullname_err'] = "Please enter your fullname";
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
            if (empty($data['email_err']) && empty($data['fullname_err']) && empty($data['password_err']) && empty($data['passwordRepeat_err']) && empty($data['address_err']) && empty($data['phoneNumber_err'])) {
                // mã hóa
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                $result = $this->user->register($data['fullname'], $data['email'], $data['password'], $data['address'], $data['phoneNumber']);
                if ($result) {
                    $data['msgSuccess'] = "Chúc mừng bạn đã đăng ký thành công! Hãy đăng nhập để mua sắm";
                    header("refresh:2;url=" . URL . "Home/login");
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
                'fullname' => '',
                'password' => '',
                'passwordRepeat' => '',
                'address' => '',
                'phoneNumber' => '',

                'email_err' => "",
                'fullname_err' => "",
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
