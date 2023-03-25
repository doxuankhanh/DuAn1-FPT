<?php

class HomeController
{

    use Controller;
    private $cate;
    private $book;
    private $user;
    private $cart;
    private $cmt;
    private $mail;
    private $order;
    function __construct()
    {
        $this->cate = $this->model("CateModel");
        $this->book = $this->model("BookModel");
        $this->user = $this->model("UserModel");
        $this->cart = $this->model("CartModel");
        $this->cmt = $this->model("CmtModel");
        $this->mail = new Mailer();
        $this->order = $this->model("OrderModel");
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
                'note_err' => '',
                'quantity_err' => '',
            ];
            //$bookName,$clientID,$bookID,$image,$price,$quantity
            if (isset($_POST['btn-add-cart'])) {
                if (!isset($_SESSION['userID'])) {
                    _redirectLo(URL . "Home/login");
                } else {
                    if ($checkCart['bookID'] === $bookDetail['id']) {
                        $_SESSION['msgCartIsset'] = "Sản phẩm đã tồn tại trong giỏ hàng của bạn!";
                    } else {
                        if (empty($data['quantity']) || $data['quantity'] <= 0) {
                            $_SESSION['quantity_err'] = "Bạn phải nhập đúng số lượng!";
                        } else {
                            if (empty($_SESSION['quantity_err'])) {
                                $result = $this->cart->store($data['bookName'], $data['clientID'], $data['bookID'], $data['image'], $data['price'], $data['quantity']);
                                if ($result) {
                                    _redirectLo(URL . "Home/getCartByClientID");
                                }
                            }
                        }
                    }
                }
            }
            // Bình luận
            if (isset($_POST['btn-comment'])) {
                if (!isset($_SESSION['userID'])) {
                    // $_SESSION['msgCmtEmpty'] = "Bạn phải đăng nhập để sử dụng chức năng!";
                    _redirectLo(URL . "Home/login");
                } else {
                    if (empty($data['note'])) {
                        $data['note_err'] = "Không được để trống thông tin bình luận";
                    } else {
                        if (empty($data['note_err'])) {
                            $cmtAdded = $this->cmt->addedCmt($data['note'], $bookDetail['id'], $data['clientID'], $data['timeAdded']);
                            if ($cmtAdded) {
                                _redirectLo($_SERVER['HTTP_REFERER']);
                            } else {
                                die("STUPID");
                            }
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
                'note_err' => '',
                'quantity_err' => '',

            ];
        }

        $this->view(
            "client.layout.Pages.Components.bookDetail",
            [
                $data,
                'cates' => $cates,
                'similarBook' => $this->book->similarBook(id: $id, cateID: $cateID),
                'view' => $this->book->updateView($id),
                'book' => $bookDetail,
                'comments' => $this->cmt->loadCmt($id),
            ]
        );
    }

    //Update User
    function updateUser($userId)
    {
        $user = $this->user->getOneUser($userId);

        $data = [
            'email' => isset($_POST['email']) ? trim($_POST['email']) : '',
            'username' => isset($_POST['username']) ? trim($_POST['username']) : '',
            'accountName' => isset($_POST['accountName']) ? trim($_POST['accountName']) : '',
            'address' => isset($_POST['address']) ? trim($_POST['address']) : '',
            'phoneNumber' => isset($_POST['phoneNumber']) ? trim($_POST['phoneNumber']) : '',
            'avatar' => isset($_FILES['avatar']) ? $_FILES['avatar'] : '',
            'success' => '',
            'error' => '',
        ];

        if (isset($_POST['btn-update'])) {

            $imgF = pathinfo($data['avatar']['name'], PATHINFO_EXTENSION);
            $img = $user['avatar'];

            if (!empty($data['avatar']['name'])) {
                if (in_array($imgF, ['png', 'jpg'])) {
                    $img = $_FILES['avatar']['name'];
                    move_uploaded_file($_FILES['avatar']['tmp_name'], 'Public/upload/' . basename($img));
                } else {
                    $data['error'] = 'Sai định dạng ảnh';
                }
            }

            if(empty($data['error'])){
                $this->user->updateUser($data['email'], $data['username'], $data['accountName'], $data['address'], $data['phoneNumber'], $img, $userId);
                $data['success'] = "Đã cập nhật";

                _redirectLo($_SERVER['HTTP_REFERER']);
            }
        }

        $this->view(
            "client.layout.Pages.Components.updateUser",
            [
                $data,
                'user' => $user,
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
        $_SESSION['address'] = $user['address'];
        $_SESSION['phone'] = $user['phoneNumber'];
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
    function loadBookSearch()
    {
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
        $this->view(
            "client.layout.Pages.Components.searchBook",
            [
                'cates' => $this->cate->all(),
                'bookSearch' => $bookSearch ?? '',
            ]
        );
    }

    // remove giỏ hàng
    function delCart($id)
    {
        $result = $this->cart->removeCart($id);
        if ($result) {
            $_SESSION['msgDelSuccessCart'] = "Bạn đã xóa thành công sản phẩm , hãy mua sắm thêm nhé!";
            _redirectLo(URL . "Home/getCartByClientID");
        }
        // $this->view("client.layout.Pages.Components.cart");
    }
    // update cart 
    // update delete cart ~~~~~~~~~~~
    function updateCart($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            if (isset($_POST['btn-updateCart'])) {
                $_POST = filter_input_array(INPUT_POST);
                $data = [
                    'quantity' => trim($_POST['quantity'] ?? ''),
                ];
                if ($data) {
                    if ($data['quantity'] <= 0) {
                        $result = $this->cart->removeCart($id);
                        if ($result) {
                            _redirectLo(URL . "Home/getCartByClientID");
                        }
                    } else {
                        if ($data['quantity'] > 0) {
                            $result = $this->cart->updateCart(cartID: $id, quantity: $data['quantity']);
                            if ($result) {
                                $_SESSION['msgUpdateCartSuccess'] = "Cập nhật giỏ hàng thành công!";
                                _redirectLo(URL . "Home/getCartByClientID");
                            } else {
                                die("STUPID");
                            }
                        }
                    }
                }
            } else {
                $data = [
                    'quantity' => '',
                ];
            }
        }
    }
    // remove bình luận
    function removeCmt($id)
    {
        $result = $this->cmt->delete($id);
        if ($result) {
            _redirectLo($_SERVER['HTTP_REFERER']);
        }
    }
    //Quên mật khẩu
    function forgetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $code = substr(rand(0, 999999), 0, 6);
            $data = [
                'email' => trim($_POST['email'] ?? ''),
                'title' => "Quên Mật Khẩu",
                'content' => "Mã xác nhận của bạn là: " . $code,
            ];
            //validate email
            if (empty($data['email'])) {
                $_SESSION['email_err'] = "Vui lòng điển đầy đủ thông tin";
            } else {
                if ($data['email'] !== $_SESSION['email']) {
                    $_SESSION['email_err'] = "Email not found";
                }
            }
            if (empty($_SESSION['email_err'])) {
                $this->mail->sendMail(title: $data['title'], content: $data['content'], mailAddress: $data['email']);
                $_SESSION['emailPass'] = $data['email'];
                $_SESSION['code'] = $code;
                // die("OK");
                _redirectLo(URL . "Home/virifiCation");
            }
        } else {
            $data = [
                'email' => '',
            ];
        }
        $this->view(
            "client.layout.Pages.Components.forgetPassword",
            [
                'cates' => $this->cate->all(),
            ]
        );
    }
    // Nhâp mã xác nhận để đổi mk
    function virifiCation()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'code' => trim($_POST['code'] ?? ''),
            ];
            if ($data) {
                if (empty($data['code'])) {
                    $_SESSION['codeErr'] = "Vui lòng điền đầy đủ thông tin";
                } else {
                    if (empty($_SESSION['codeErr'])) {
                        if ($data['code'] !== $_SESSION['code']) {
                            $_SESSION['codeErr'] = "Vui lòng nhập đúng mà xác nhận mà chúng tôi đã gửi về Mail cho bạn!";
                        } else {
                            _redirectLo(URL . "Home/resetPassword");
                        }
                    }
                }
            }
        } else {
            $data = [
                'code' => '',
            ];
        }
        $this->view(
            "client.layout.Pages.Components.virification",
            [
                'cates' => $this->cate->all(),
            ]
        );
    }
    // đổi mật khẩu
    function resetPassword()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST);
            $data = [
                'passwordNew' => trim($_POST['passwordNew'] ?? ''),
                'passwordRepeat' => trim($_POST['passwordRepeat'] ?? ''),
            ];
            if (empty($data['passwordNew'])) {
                $_SESSION['password_err'] = "Vui lòng điền đầy đủ thông tin";
            }
            if (empty($data['passwordRepeat'])) {
                $_SESSION['password_err'] = "Vui lòng điền đầy đủ thông tin";
            } else {
                if ($data['passwordNew'] !== $data['passwordRepeat']) {
                    $_SESSION['password_err'] = "Mật khẩu không khớp ,vui lòng thử lại!";
                }
            }
            if (empty($_SESSION['password_err'])) {
                $data['password'] = password_hash($data['passwordNew'], PASSWORD_DEFAULT);
                $result = $this->user->getPassByEmail(password: $data['password'], email: $_SESSION['emailPass']);
                if ($result) {
                    die("OK");
                } else {
                    die("STUPID");
                }
            }
        }
        $this->view(
            "client.layout.Pages.Components.resetPassword",
            [
                'cates' => $this->cate->all(),
            ]
        );
    }
    function checkOut()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $result = $this->order->store(clientID: $_SESSION['userID'], dateBuy: date("Y/m/d H:i:a"), clientName: $_SESSION['username'], address: $_SESSION['address'], phone: $_SESSION['phone']);
            if ($result) {
                $_SESSION['msgOrderSuccess'] = "Cảm ơn bạn đã mua sắm!";
            }
        }
        $this->view(
            "client.layout.Pages.Components.checkOut",
            [
                'cates' => $this->cate->all(),
                'carts' => $this->cart->getCartByClientID($_SESSION['userID'] ?? ''),
            ]
        );
    }
}
